<template>
<div>
    <div>
        <p>英語のテストです。</p>
        <p>以下から難易度を選択し、スタートボタンを押してください。</p>
    </div>

    <form v-on:submit.prevent>
        <input type='radio' name="level" value='novice'>
        <label for='level'>初級</label>

        <input type='radio' name="level" value='intermediate'>
        <label for='level'>中級</label>

        <input type='radio' name="level" value='advanced'>
        <label for='level'>上級</label>

        <button type='submit' class="btn btn-danger" v-on:click="startQuestions">スタート</button>
    </form>
</div>
</template>

<script>
    export default {
        data () {
            return {
            level : "novice",
            }
        },
        methods: {
            startQuestions: function () {
                this.$router.push({name: "question"});
            }
        }
    }
</script>