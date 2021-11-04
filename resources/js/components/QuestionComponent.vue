<template>
<div class="question">
    <div class="count">
        <span id="sec"></span>
    </div>
    <div class="text-center my-4">
        <h2>{{words[question_number].en}}</h2>
    </div>
    <div class="row question-box">
        <div v-for="(word, index) in words" v-bind:key="index" class="col-md-4 hover text-center py-4 border" v-on:click="check(index); getWords()">
            <div>{{ word.jp }}</div>
            <div>{{word.en}}</div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        props: {
            level: {
                type: String,
                default: "novice",
            },
        },
        data () {
            return {
                record_id: 0,
                question_number: 0,
                words: {
                    0: {en: "　"}
                },
                result: "",
                count: 0,
                score: 0,
                timer: 5,
                update_timer: null,
            }
        },
        mounted() {
            window.addEventListener("beforeunload", this.handler);
            this.getWords();
            this.createRecord();
        },
        methods: {
            createRecord: function () {
                var self = this;
                axios.get('vue/create-record')
                    .then(function(response){
                        self.record_id = response.data
                    }).catch(function(error){
                        alert(error);
                });             
            },
            getWords: function () {   
                this.timer = 5
                if(this.count<3){
                    var self = this;
                    axios.get('vue/get-words', {
                        params:{level: this.level}
                    })
                        .then(function(response){
                            self.words = response.data,
                            self.question_number = Math.floor( Math.random() * 3 )
                            window.setTimeout(self.countDown, 1);
                        }).catch(function(error){
                            alert(error);
                    });
                }else{
                    axios.post('vue/update-record', {
                        id: this.record_id,
                        score: this.score
                    })
                        .then(function(response){
                        }).catch(function(error){
                            alert(error);
                    });    
                    alert("end");
                    this.$router.replace({name: "result", params: {record_id: this.record_id}});
                }
            },
            check: function (index) {
                clearTimeout(this.update_timer);
                this.count++
                var self = this;
                if(this.question_number===index){
                    this.result="○";
                    this.score++
                }else{
                    this.result="×";
                }
                axios.post('vue/save-result', {
                    word_id: this.words[this.question_number].id,
                    record_id: this.record_id,
                    result: this.result
                })
                    .then(function(response){         
                    }).catch(function(error){
                });
            },
            countDown: function () {
                if(this.timer>0){
                    document.getElementById("sec").textContent=String(this.timer);
                    this.timer--;
                    this.update_timer = window.setTimeout(this.countDown, 1000);
                }else{
                    this.check();
                    this.getWords();
                }
            },
            handler (event) {
                event.returnValue = "Data you've inputted won't be synced"
            }
        },
        destroyed() {
            clearTimeout(this.update_timer);
            window.removeEventListener("beforeunload", this.handler)     
        },
        beforeRouteLeave (to, from, next) {
            if(this.count<3){
                const answer = window.confirm("現在のテストは無効となりますが、よろしいですか？")
                if (answer) {
                    clearTimeout(this.update_timer); 
                    next()
                } else {
                    next(false)
                }
            }else {
                next()
            }
        },
    }
</script>
<style scoped>
.question {
    position: relative;
}
.hover:hover {
	box-shadow: 0 15px 30px -5px rgba(0,0,0,.15), 0 0 5px rgba(0,0,0,.1);
	transform: translateY(-4px);
    background: #fff;
}
.question-box {
    background: #fff;
    height: 350px;
    padding: 10px;
}
.count {
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
</style>