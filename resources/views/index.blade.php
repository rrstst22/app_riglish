@extends('layouts.app')
@section('content')
<h1>英語</h1>
<div>

    <div>
        <p>英語のテストです。</p>
        <p>以下から難易度を選択し、スタートボタンを押してください。</p>
    </div>

    <form>
        <input type='radio' name="level" value='novice'>
        <label for='level'>初級</label>

        <input type='radio' name="level" value='intermediate'>
        <label for='level'>中級</label>

        <input type='radio' name="level" value='advanced'>
        <label for='level'>上級</label>

        <button type='submit' class="btn btn-danger" v-on:click="startQuestions">スタート</button>
    </form>

    <div>
        <question-component v-bind:level="level"></question-component>
    </div>

</div>
@endsection