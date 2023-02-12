# はじめに

現在エンジニアを目指して勉強中です。
ポートフォリオを作成したので、
これまで、開発に使用した技術や
アプリ完成まで道のりなどをまとめました。

# 成果物

Urehitter

https://ureshitter.site/

# 背景

友達が楽しく嬉しそうに話していると、
私もなんだか幸せな気持ちになります。
世の中の人たちも、嬉しい話しを聞けば、
「**みんなの心も、もっと幸せになるのではないか**」と思い、
このアプリを作成する事にしました。

# ユーザーが抱える問題

嬉しいことがあったのに、身近に共有できる人がいない！
文章だけ読んでも、どれくらい嬉しいのかわからない！
という人たちの、問題解決を目指します。

# メインのターゲットユーザー

- 嬉しかったことを共有したい人
- 他人がどんなことに、嬉しかったか知りたい人

# 解決方法

嬉しかったことを書き込める SNS を作成します。
少しだけ嬉しかったのか、すごく嬉しかったのか、
嬉しかった感情表現の度合いも表せます。
このアプリを使えば、嬉しかったことを共有できます。

# アプリ概要

作成したアプリ「Ureshitter」の機能はシンプルです。
機能としてはメッセージ＆感情の投稿と、メッセージ一覧表示、
メッセージ削除とツイート機能です。

なぜ、ログイン機能やリレーションを行っていないかというと、
今まで機能が複雑なアプリを作成しようとしましたが、
何回も途中で挫折してきてしまいました。

今回は機能をできるだけシンプルにして、
**アプリの設計からデプロイまで完成させる**というのが、
このアプリを作成し始めた動機でもあります。

# デプロイ先(さくら VPS)での主な使用技術

- PHP 8.1.2
- Laravel 9.40.1
- Vue 3.2.45
- Node.js 18.12.1 LTS
- npm 8.19.2
- Bootstrap 5.2.2
- Ubuntu 22.04.1 LTS
- Nginx 1.22.1
- MySQL 8.0.32
- GitHub Actions

# ER 図

アプリの機能をシンプルにすることと、
嬉しかったことを、すぐに書き込みできるように、
わざとログイン機能などは実装していません。
なのでテーブルはひとつのみと、シンプルになっています。
![ER図.jpg](https://qiita-image-store.s3.ap-northeast-1.amazonaws.com/0/968572/2f67938d-6f5b-3368-1ead-ac406ca02ec6.jpeg)

# テーブル設計

嬉しかったことテーブル
|カラム論理名 |カラム物理名 |型 |型の意味 |
|---|---|---|---|
|メッセージ ID |id |BIGINT UNSIGNED |連番（自動採番） |
|名前 |name |VARCHAR |文字列 |
|感情の強さ |emotion |INTEGER |数値 |
|メッセージ内容 |message |TEXT |テキスト |

# セキュリティ

セキュリティに関わる事なので、詳しいことは書けないのですが、
Web アプリを公開するにあたって、基本的なセキュリティ対策は施しました。

# アプリ完成までの道のり

2022 年下旬～ 2023 年 2 月上旬の間に、
ラフスケッチからデプロイまで行いました。

## ラフスケッチ、設計

2022 年 11 月下旬
まずはノートにラフスケッチを描きました。
たくさんのページを描いてしまうと、途中で挫折すると思い、
トップページ、メッセージ投稿成功ページなど、
絶対に必要なページのみ描きました。

<img width="250" alt="ラフスケッチ1枚目" src="https://qiita-image-store.s3.ap-northeast-1.amazonaws.com/0/968572/507bfe2c-f5fe-617d-3556-ecb5cad60dc8.jpeg">

<img width="250" alt="ラフスケッチ2枚目" src="https://qiita-image-store.s3.ap-northeast-1.amazonaws.com/0/968572/1f039a02-76ea-f873-69d1-6494a61b4c54.jpeg">

## フレームワーク、プロトタイプの作成

12 月上旬
ラススケッチだけでは作成したいアプリの、
イメージが中途半端なので Figma にて
ワイヤーフレームとプロトタイプを作成しました。
プロトタイプを作成し終わったとき、
「このアプリなら作れそうだな」と思い、
引き続き、実装も進めました。

#### 作成したワイヤーフレーム

<img width="250" alt="ワイヤーフレーム" src="https://qiita-image-store.s3.ap-northeast-1.amazonaws.com/0/968572/bec79342-ad98-3f51-f574-d399f7f96931.jpeg">

#### 作成したプロトタイプ

<img width="250" alt="プロトタイプ" src="https://qiita-image-store.s3.ap-northeast-1.amazonaws.com/0/968572/33f24167-31f0-dda1-0966-de95c3d8c064.jpeg">

## 開発環境構築

12 月中旬

https://qiita.com/ucan-lab/items/5fc1281cd8076c8ac9f4

XAMPP や laradock など色々使ってみました。
その中で@ucan-lab さんが作成された、開発環境がすごく使いやすかったので、
この開発環境を使わせて頂くことにしました。

## 実装

12 月中旬～ 2023 年 1 月下旬
WSL2 から docker を使用して、実装を行いました。

SPA の実装をするため Vue3 を使い、
状態管理には Pinia を使いました。
Pinia はすごく使いやすいです。
Vuex で理解することが難しかったところが、
比較的わかりやすく、実装することができて良かったです。

## インフラ環境構築

1 月下旬～ 2 月中旬
以前、AWS の EC2 や RDS を使用していました。
その経験を活かして、今回はさくら VPS を使うことにしました。

さくら VPS では、どの OS を使えばいいのか迷ったので、
CentOS7、AlmaLinux、RockyLinux、Ubuntu を触ってみました。
最終的に開発環境の WSL2 にも使用している Ubuntu にしました。
開発環境と本番環境が同じ OS なら、学習コストも下がるからです。

## デプロイ

2 月中旬
CI/CD には GitHub Actions を使いました。
GitHub Actions は使いやすいです。
2019 年にリリースされたということで、
まだ情報は少ないですが、
使いこなせばテストとデプロイを
自動で行ってくれるようにできます。

# おわりに

当初の「**アプリの設計からデプロイまで完成させる**」という目標が達成できて良かったです。

実装中、Vue router3 と Vue router4、Vuex と Pinia などの違いには悩まされました。
検索して表示される記事の内容が、自身のバージョンと合うかどうか
見極めることが鍛えられました。

インフラ環境を構築する際、
ひとつひとつのモジュールやディレクティブの扱い方と、
意味を理解するのに苦労しました。

# 今後に向けて

アプリ作成は、今後も引き続き行っていきます。
まずはログイン機能やリレーションを取り入れ、
徐々に機能が複雑なアプリを作成していきます。

以上です。
ここまで読んでいただき、ありがとうございました。
