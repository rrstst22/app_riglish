@extends('layouts.app')
@section('content')
        
<h4 class="my-4">CSVファイルを選択してください</h4>

<div class="my-4">
    <p>CSVで単語集を読み込みます。<br>
    一行目は以下の例のようにカラム名とする。</p>

    <p>例：</p>
    <p>en,jp,level,frequency,reputation<br>
    good,よい,1,1,0<br>
    bad,悪い,1,1,0</p>

    <h4>frequencyのテーブル構成</h4>
    <table class="border">
        <tr><th>id</th><th>level</th></tr>
        <tr><td>1</td><td>novice</td></tr>
        <tr><td>2</td><td>intermediate</td></tr>
        <tr><td>3</td><td>advanced</td></tr>
    </table>
</div>

<div class="my-4">

    <form role="form" method="post" action="csv/import" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="csv_file" id="csv_file">
        <div class="form-group my-4">
            <button type="submit" class="btn btn-default btn-success">保存</button>
        </div>
    </form>

    @if (session('flash_message'))
        <div>
            {{ session('flash_message') }}
        </div>
    @endif

</div>


@endsection