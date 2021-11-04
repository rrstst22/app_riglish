<template>
<div class="level-box">
    <div class="text-center py-2">
        <span class="border p-2">難易度選択</span>
    </div>
    <div class="row">
        <div class="col-md-4 hover novice text-center">
            <h2 class="my-4">初級</h2>
            <div class="my-4">
                中高で習う英単語を出題します。
            </div>
            <button type="button" class="my-4 start-button" v-on:click="startQuestions('novice')">選択</button>
        </div>
        <div class="col-md-4 hover intermediate text-center">
            <h2 class="my-4">中級</h2>
            <div class="my-4">
                高校、大学で習う英単語を出題します。
            </div>
            <button type="button" class="my-4 start-button" v-on:click="startQuestions('intermediate')">選択</button>
        </div>
        <div class="col-md-4 hover advanced text-center">
            <h2 class="my-4">上級</h2>
            <div class="my-4">
                専門的な英単語などを出題します。
            </div> 
            <button type="button" class="my-4 start-button" v-on:click="startQuestions('advanced')">選択</button>
        </div>
    </div>

</div>
</template>

<script>
    export default {
        data () {
            return {
            selected_level : "",
            }
        },
        methods: {
            startQuestions: function (selected_level) {
                this.$router.push({name: "countdown", params: {level: selected_level}});
            }
        }
    }
</script>
<style scoped>
.hover {
    border-radius: 20px;
    height: 350px;
    position: relative;
}
.start-button {
    position: absolute;
    bottom: 20px;
    left: 40%;
}
.hover:hover {
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