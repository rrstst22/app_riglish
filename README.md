# Riglish

画像

## :globe_with_meridians:URL
http://test

<br>
<br>

## :pencil2:本アプリについて

### 使い方
1. 難易度を選択し、テスト開始
2. 上部に表示される英単語の日本語訳を下の選択肢から選択
3. 5問回答後、結果画面にて成績を確認

### 機能

- 難易度によって出題単語を変更
- ランダムな問題の組み合わせ
- カウントダウン機能
- 単語CSV登録（管理者のみ）
- CSV出力

### 特徴

- Vue Router を使用したスピーディーな画面遷移
- CSVにて問題の追加可能

<br>
<br>

## :page_facing_up:技術仕様

### 基本情報
- 言語フレームワーク
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
- 親子コンポーネント間の受け渡し（Vue.js）
- テーブル作成、挿入、更新、結合（Laravel）
- ファイル入出力（Laravel）
- カウントダウン（CSS, Vue.js）

### ER図

![Riglish](https://user-images.githubusercontent.com/92190851/141145733-79b2cec0-49d5-4010-bf5c-e694d73f3a5f.png)
