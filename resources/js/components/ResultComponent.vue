<template>
<div>
    <div class="score-sheet">
        <div class="text-center">
            <h1>結果</h1>
        </div>
        <div class="text-right my-2">
            <!-- yyyyMMMdd hhmmのみ表示 -->
            {{words[0].date.substr(0, 16)}}
        </div>
        <table>
            <tr class="heading">
                <th>英単語</th>
                <th>日本語</th>
                <th>正誤</th>
            </tr>
            <!-- レコード内容出力 -->
            <tr v-for="(word, index) in words" v-bind:key="index" class="score-list">
                <td>{{word.en}}</td><td>{{word.jp}}</td><td>{{word.result}}</td>
            </tr>     
        </table>
    </div>
</div>
</template>

<script>
    export default {
        props: {
            record_id: {
                type: Number,
                default: 0
            },
        },
        data () {
            return {
                words: {
                    0: {en: "", jp: "", result: "", score: 0, date: "　"}
                },
            }
        },
        created() {
            this.showResult();
            window.addEventListener("beforeunload", this.confirmSave);
        },
        methods: {
            //結果を取得
            showResult: function () {
                var self = this;
                axios.get("vue/show-record", {
                    params:{record_id: this.record_id}
                })
                    .then(function(response){
                        self.words = response.data;
                    }).catch(function(error){
                        alert(error);
                });    
            },
            //途中退出処理
            confirmSave (event) {
                event.returnValue = "このページを再度見ることはできません。離れますか？";
            },
        },
        //退出処理
        destroyed() {
            window.removeEventListener("beforeunload", this.confirmSave);
        },
        //途中退出処理
        beforeRouteLeave (to, from, next) {
            const answer = window.confirm("このページを再度見ることはできません。離れますか？")
            if (answer) {
                clearTimeout(this.update_timer);
                next();
            } else {
                next(false);
            }
        },
    }
</script>
<style scoped>
ul {
  list-style: none;
  padding-left: 0;
}
.score-sheet {
    background: #fff;
    padding: 50px;
}
.score-list {
    margin: 50px 0px;
    border-bottom: 1px solid black;
}
table {
  border-collapse: collapse;
  width: 100%;
}
th,
td {
  padding: 1rem 2rem;
  text-align: center;
  border-bottom: 1px solid #ddd;
}
th {
  font-weight: normal;
  font-size: .875rem;
  color: #666;
  background: #eee;
}
img {
  width: 80px;
  display: block;
  margin: 0 auto;
  margin-bottom: .5rem;
}
</style>
