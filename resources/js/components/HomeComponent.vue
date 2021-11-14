<template>
<div class="level-box">
    <div class="text-center my-3">
        <span>難易度選択</span>
    </div>
    <div class="row">
        <div class="col-md-4 level novice text-center">
            <h2 class="my-4">初級</h2>
            <div class="my-4">
                中、高で習う英単語を出題します。<br>
                ※全3問です。
            </div>
            <button type="button" class="start-button" v-on:click="startQuestions(1)">選択</button>
        </div>
        <div class="col-md-4 level intermediate text-center">
            <h2 class="my-4">中級</h2>
            <div class="my-4">
                高、大で習う英単語を出題します。<br>
                ※全3問です。
            </div>
            <button type="button" class="start-button" v-on:click="startQuestions(2)">選択</button>
        </div>
        <div class="col-md-4 level advanced text-center">
            <h2 class="my-4">上級</h2>
            <div class="my-4">
                専門的な英単語などを出題します。<br>
                ※全3問です。
            </div> 
            <button type="button" class="start-button" v-on:click="startQuestions(3)">選択</button>
        </div>
    </div>

</div>
</template>
<script>
    export default {
        data () {
            return {
                selected_level : 0,
            }
        },
        methods: {
            //カウントダウン画面へ遷移
            startQuestions: function (selected_level) {
                this.$router.push({name: "countdown", params: {level_id: selected_level}});
            }
        }
    }
</script>
<style scoped>
.level {
    border-radius: 20px;
    position: relative;
}
.start-button {
    margin: 40px 0px;
}
.level:hover {
	box-shadow: 0 15px 30px -5px rgba(0,0,0,.15), 0 0 5px rgba(0,0,0,.1);
	transform: translateY(-4px);
}
.novice {
    background: #eafff4;
    border: 1px solid #7fffbf;
}
.intermediate {
    background: #fff4ea;
    border: 1px solid #ffbf7f;
}
.advanced {
    background: #ffeaf4;
    border: 1px solid #ff7fbf;
}
.level-box {
    background: #fff;
    padding: 30px;
}
</style>