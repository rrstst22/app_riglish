<template>
<div>
    {{words[question_number].en}}
    <form v-on:submit.prevent>
        <div v-for="(word, index) in words" v-bind:key="index">
            <label><input type="radio" name="option" v-bind:value=index v-model="selected_index">{{ word.jp }}、{{word.en}}</label>
        </div>  
        <button type='submit' v-on:click="check">OK</button>
    </form>
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
                selected_index: "",
                question_number: 0,
                words: "",
                result: "",
                count: 0,
                score: 0,
            }
        },
        created() {
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
                var self = this;
                axios.get('vue/get-words')
                    .then(function(response){
                        self.words = response.data,
                        self.question_number = Math.floor( Math.random() * 3 )
                    }).catch(function(error){
                        alert(error);
                });             
            },
            check: function () {
                console.log(this.count)
                var self = this;
                
                if(this.question_number===this.selected_index){
                    this.result=true;
                    this.score++
                    console.log('OK');
                }else{
                    this.result=false;
                    console.log('NG');
                }
                console.log(this.score)
                axios.post('vue/save-result', {
                    word_id: this.words[this.question_number].id,
                    record_id: this.record_id,
                    result: this.result
                })
                    .then(function(response){                          
                    }).catch(function(error){
                });
                if(this.count<1){
                    this.count++ 
                    this.getWords()
                }else{
                    var self = this;
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
        }
    }
</script>
