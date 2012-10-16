= CakePHP 1 っぽいソースコードを書き直してみる
[2012-10-16 16:17]

nakano_neko, 画像の右側が外注さんに頼んだソースコード。左側が僕が書きなおしたソースコード。... 
http://ac7.tumblr.com/post/33569124174

をがんばってエスパーしてリファクタリングするプロジェクト。


# 要件

- RssListsContorollerクラスのリライトを対象にする
- CakePHP 1.3 を使用し、PHP4に対応する
- SimpleTestを使い、CakeTestCaseでモデル層のテストを、CakeWebTestCaseでコントローラーのテストを書く
- テンプレート部分は詳細が不明なのでアサインする変数名などは変更しないようにする
- DBのスキーマはコードから予測できる範囲を定義しそれ以外を勝手に追加しない


# 登場人物紹介

## RssListsController

[BlogRssesLists/controllers/rsslists_controller.php](https://github.com/laiso/BlogRssesLists/blob/master/controllers/rsslists_controller.php "BlogRssesLists/controllers/rsslists_controller.php")

原作に登場する唯一の人物。
モデルにRSSフィードを要求しクロールして何かを抽出する謎の存在

## モデル層

[BlogRssesLists/models](https://github.com/laiso/BlogRssesLists/tree/master/models "BlogRssesLists/models")

Rss 「くくく……」
RssList 「我々が揃ったからには……」
BlogRssList 「決っして」
RssFetcher 「生きては帰さぬ」


## コントローラーテスト 

[BlogRssesLists/tests/cases/controllers/RSSListsController.test.php](https://github.com/laiso/BlogRssesLists/blob/master/tests/cases/controllers/RSSListsController.test.php "BlogRssesLists/tests/cases/controllers/RSSListsController.test.php")


## モデル層テスト (未登場)

[BlogRssesLists/tests/cases](https://github.com/laiso/BlogRssesLists/tree/master/tests/cases "BlogRssesLists/tests/cases")

以下へ登場予定


# 環境構成

CakePHP(1.3系)のセットアップ

```
git clone https://github.com/cakephp/cakephp.git
cd cakephp
git checkout origin/1.3
php ./cake/console/cake.php bake project ~/path-to-cakeapp
cd ~/path-to-cakeapp
cp config/{database.php.default,database.php} 
```

DBはSQLiteにする

```
# diff -u config/{database.php.default,database.php}

--- config/database.php.default 2012-10-16 14:30:19.000000000 +0900
+++ config/database.php 2012-10-16 14:59:56.000000000 +0900
@@ -74,7 +74,7 @@
 class DATABASE_CONFIG {
 
        var $default = array(
-               'driver' => 'mysql',
+               'driver' => 'sqlite',
                'persistent' => false,
                'host' => 'localhost',
                'login' => 'user',
```

SimpleTest(1.0系)のセットアップ

```
cd vendors
curl -LO http://downloads.sourceforge.net/project/simpletest/simpletest/simpletest_1.0.1/simpletest_1.0.1.tar.gz
tar zxfv simpletest_1.0.1.tar.gz
```

