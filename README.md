# Riglish

英語の単語テストが可能です。

## :globe_with_meridians:URL
http://riupad-dev.com:8081

<br>
<br>

## :pencil2:本アプリについて

### 使い方
1. 難易度を選択し、テスト開始
<img src="https://user-images.githubusercontent.com/92190851/141678581-ee241131-cd86-47c4-9de6-985b2b2d31ba.png" width="700px">

2. 上部に表示される英単語の日本語訳を下の選択肢から選択
<img src="https://user-images.githubusercontent.com/92190851/141678599-14948d7a-5374-44ac-955f-a3160914b26b.png" width="700px">

3. 回答後、結果画面にて成績を確認
<img src="https://user-images.githubusercontent.com/92190851/141678612-d6b8a0d7-d91c-40f6-b198-8c3bb855db83.png" width="700px">

### 機能
- 難易度選択
- CSV入力
- PDF出力

### 特徴

- Vue Router を使用したスピーディーな画面遷移
- CSVにて問題の追加可能
- テスト結果のPDF出力可能

<br>
<br>

## :page_facing_up:技術仕様

### 基本情報
- 言語、フレームワーク
    - HTML, CSS, JavaScript, PHP
    - Vue.js 2.6.14, Laravel 8.68.1

- 開発環境
    - Windows 10 Home
    - docker (Apache 2.4.51, PHP 8.0.12, Mariadb 10.6.4)

- デプロイ環境
    - CentOS 7
    - Apache 2.4.6, PHP 8.0.12, Mariadb 10.6.4

- テスト
    - Chromeデベロッパーツール
    - PHPUnit

### 使用技術

- 非同期通信Ajax（Vue.js）
- Vue Router (Vue.js)
- データ取得、作成、更新、削除、結合（Laravel）
- ファイル入出力（SplFileObject, Laravel-dompdf）
- カウントダウン（CSS, Vue.js）

### ER図

<img src="https://user-images.githubusercontent.com/92190851/141318324-0a397457-3b48-4255-9689-2a6151ebf8b1.png" width="700px">
