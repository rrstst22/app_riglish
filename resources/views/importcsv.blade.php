@extends('layouts.app')
@section('content')
        
<h4 class="my-4">CSVファイルを選択してください</h4>

<div class="my-4">
    <p>■手順</p>
    <p>1. CSVで保存します。</p>
    <p>2. ファイルを選択し読み込んでください。</p>
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