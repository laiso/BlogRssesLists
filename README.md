= CakePHP 1 っぽいソースコードを書き直してみる
[2012-10-16 16:17]

nakano_neko, 画像の右側が外注さんに頼んだソースコード。左側が僕が書きなおしたソースコード。... 
http://ac7.tumblr.com/post/33569124174


DB自体の設定、テンプレートは変更しない

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

