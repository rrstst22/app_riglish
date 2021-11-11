<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>テスト結果</title>
<style>
@font-face{
    font-family: ipag;
    font-style: normal;
    font-weight: normal;
    src:url('{{ storage_path('fonts/ipag.ttf')}}');
}
@font-face{
    font-family: ipag;
    font-style: bold;
    font-weight: bold;
    src:url('{{ storage_path('fonts/ipag.ttf')}}');
}
body {
font-family: ipag;
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
</style>
</head>
<body>
<div class="score-sheet">
    <table>
        <tr class="heading">
            <th>英単語</th>
            <th>日本語</th>
            <th>正誤</th>
        </tr>
        @foreach ($words as $word)
        <!-- レコード内容出力 -->
        <tr class="score-list">
            <td>{{$word->en}}</td><td>{{$word->jp}}</td><td>{{$word->result}}</td>
        </tr>   
        @endforeach
    </table>
</div>
</body>
</html>