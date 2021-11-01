<template>
<div>
    <h1>結果</h1>
    {{record_id}}
    <div v-for="(word, index) in words" v-bind:key="index">
        {{word.en}}：{{word.result}}
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
        record_id: function() {
        },
        data () {
            return {
                words: null,
            }
        },
        created() {
            this.showResult()
            console.log(this.record_id)
        },
        methods: {
            showResult: function () {
                var self = this;
                axios.get('vue/show-result', {
                    params:{record_id: this.record_id}
                })
                    .then(function(response){
                        self.words = response.data;
                        console.log(response.data);
                    }).catch(function(error){
                        alert(error);
                });    
            }
        }
    }
</script>
