<template>
<div class="q-section">

    <!-- タイマー -->
    <div class="timer">
        <span id="sec"></span>
    </div>

    <!-- 問題 -->
    <div class="text-center my-4">
        <h2>{{ words[question_number].en }}</h2>
    </div>

    <!-- 選択肢 -->
    <div class="row question-box">
        <div v-for="(word, index) in words" v-bind:key="index" class="col-md-4 question" v-on:click="check(index); getWords()">
            <div>{{ word.jp }}</div>
        </div>
    </div>

</div>
</template>
<script>
    export default {
        props: {
            level_id: {
                type: Number,
                default: 1,
            },
        },
        data () {
            return {
                record_id: 0,
                question_number: 0,
                words: {0: {en: "　"}}, //初期表示（警告、CSS崩れ回避）
                result: "",
                step: 0, //何問目？
                total: 5, //問題数
                score: 0,
                timer: 10,
                update_timer: null,
            }
        },
        mounted() {
            //途中退出処理
            window.addEventListener("beforeunload", this.handler);
            //問題取得
            this.getWords();
            //レコード表作成
            this.createRecord();
        },
        methods: {
            //レコード表作成
            createRecord: function () {
                var self = this;
                axios.get('vue/create-record')
                    .then(function(response){
                        self.record_id = response.data;
                    }).catch(function(error){
                        alert(error);
                });             
            },
            //問題を取得
            getWords: function () {   
                //タイマーをセット
                this.timer = 10;
                //問題数分繰り返す、全部答えたら画面遷移
                if(this.step < this.total){
                    var self = this;
                    //新しい問題を取得
                    axios.get('vue/get-words', {
                        params:{level_id: this.level_id}
                    })
                        .then(function(response){
                            self.words = response.data;
                            self.question_number = Math.floor( Math.random() * self.total ); //出題問題をランダムに選択
                            window.setTimeout(self.countDown, 1);　//実行を遅延させないとなぜか動かない（確認ポイント）
                        }).catch(function(error){
                            alert(error);
                    });
                }else{
                    //成績をレコードに反映
                    axios.post('vue/update-record', {
                        id: this.record_id,
                        score: this.score
                    })
                        .then(function(response){
                        }).catch(function(error){
                            alert(error);
                    });    
                    alert("お疲れ様です。\n結果を表示します。");
                    //結果画面へ遷移
                    this.$router.replace({name: "result", params: {record_id: this.record_id}});
                }
            },
            //正誤チェック
            check: function (index) {
                //タイマーリセット（カウントダウン）
                clearTimeout(this.update_timer);
                this.step++;
                var self = this;
                //正誤判定
                if(this.question_number == index){
                    this.result="○";
                    this.score++;
                }else{
                    this.result="×";
                }
                //結果送信
                axios.post('vue/save-result', {
                    word_id: this.words[this.question_number].id,
                    record_id: this.record_id,
                    result: this.result
                })
                    .then(function(response){         
                    }).catch(function(error){
                });
            },
            //カウントダウン
            countDown: function () {
                //タイマーが0以上の時、1ずつ減らしていく
                if(this.timer > 0){
                    document.getElementById("sec").textContent=String(this.timer);
                    this.timer--;
                    this.update_timer = window.setTimeout(this.countDown, 1000);
                }else{
                    //タイムアウト
                    this.check();
                    this.getWords();
                }
            },
            //途中退出処理
            handler (event) {
                event.returnValue = "現在のテストは無効となりますが、よろしいですか？";
            }
        },
        //退出時にタイマー停止&途中退出処理
        destroyed() {
            clearTimeout(this.update_timer);
            window.removeEventListener("beforeunload", this.handler);
        },
        //途中退出処理
        beforeRouteLeave (to, from, next) {
            if(this.step < this.total){
                const answer = window.confirm("現在のテストは無効となりますが、よろしいですか？");
                if (answer) {
                    clearTimeout(this.update_timer); 
                    next();
                } else {
                    next(false);
                }
            }else {
                next();
            }
        },
    }
</script>
<style scoped>
.q-section {
    position: relative;
}
.timer {
    background: #ec4646;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    color: #fff;
    font-size: 30px;
    text-align: center;
    line-height: 50px;
    position: absolute;
    top: -5px;
    right: 30px;
}
.question-box {
    background: #fff;
    padding: 10px;
}
.question {
    text-align: center;
    border: 1px solid #d3d3d3;
    padding: 50px 0px; 
    cursor: pointer;
}
.question:hover {
	box-shadow: 0 15px 30px -5px rgba(0,0,0,.15), 0 0 5px rgba(0,0,0,.1);
	transform: translateY(-4px);
    background: #fff;
}
@media (max-width: 770px) {
    .question {
        padding: 20px 0px; 
    }
}
</style>