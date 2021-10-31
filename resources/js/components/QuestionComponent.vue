<template>
<div>
    {{words[question].en}}
    <form v-on:submit.prevent>
        <div v-for="(word, index) in words" v-bind:key="index">
            <label><input type="radio" name="option" v-bind:value=word.id v-model="selected_word_id">{{ word.jp }}、{{word.en}}</label>
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
                selected_word_id: "",
                question: "",
                words: "",
                result: "",
            }
        },
        created() {
            console.log('Component mounted.');
            this.getWords();
        },
        methods: {
            getWords: function () {
                var self = this
                axios.get('vue/get-words')
                    .then(function(response){
                        console.log(response.data);
                        self.words = response.data;
                        self.question = Math.floor( Math.random() * 9 );
                    }).catch(function(error){
                        alert(error);
                });             
            },
            check: function () {
                alert(this.selected_word_id);
                //this.getWords()
                if(this.question=this.selected_word_id){
                    this.result=true;
                }else{
                    this.result=false;
                }
                axios.post('vue/save-result', {
                    result: this.result
                })
                    .then(function(response){
                  
                    }).catch(function(error){
                        alert(error);
                });
            },
        }
    }
</script>
