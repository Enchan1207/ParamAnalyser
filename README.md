# ParamAnalyser

## Overview

HTTPリクエストの情報を抽出・保存する**デバッグ用の**Webページです。  
動作イメージ:  
<img src="https://user-images.githubusercontent.com/51850597/111733377-253dc880-88bb-11eb-9065-aea66ce62970.png" width="400">  

## Usage

### Installation

 1. このリポジトリをクローンします。
 1. `composer install` を実行します。
 1. `log/`に書き込み権限を付与します。これによりログファイルが適切に保存されるようになります。

**注意**: このページはlocalhostに配置しデバッグを行うことを想定して開発しています。セキュリティ上の理由から、公開サーバーにこのページを配置することはおすすめしません。

