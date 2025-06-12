# RB Consulting

## node バージョン
v18.16.0

## npm バージョン
9.5.1

## wordpress の開発

1.Docker アプリをインストールする
[Dockerの公式サイト](https://www.docker.com/)

2.wp-env 環境、インストール
```
npm -g i @wordpress/env
```

3.Dockerアプリの起動
```
wp-env start
```

4.http://localhost:8888/ にアクセス

管理画面　http://localhost:8888/wp-admin

ユーザー名： admin

パスワード： password

5.scss、jsの変更をする場合はgulpを立ち上げる  
※初回のみnpm install
```
npm -i
```
```
npm run start
```
  
6.停止
```
wp-env stop
```

### 使用ファイル解説

#### src/css/
basis: サイト全体の設定。ここは基本いじらない  
component: 使い回しのパーツ用のcss  
layout: 共通パーツ等のcss  
library: ライブラリ用のcss。ここは基本いじらない  
mxins: ミックスイン用のcss  
page: **メイン**。ページごとのcss。  
theme: テーマ用のcss。  
utility: 主に使うのは.u-sp-hide、.u-pc-hide。他はあまり使わない。  
variables: colors.scssで色の変数を設定。他はあまり使わない。    
  
#### src/images/  
画像はここ。  
圧縮とテーマへの画像移動は下記コマンド。  
```
npm run build
```  
    
#### src/js/  
jsを使う場合は、機能ごとに新しいファイルを作成する。    
