<?php
    echo 'routes.phpを通りました';
    // http://192.168.33.10/seed_blog/ほげ
    // ↓↓↓↓↓
    // http://192.168.33.10/seed_blog/routes.php?url=ほげ
    // .htaccessファイルがURLを書き換える

    echo '<br>';
    echo '<br>';
    // var_dump($_GET['url']);
    echo $_GET['url'];

    // explode()関数 : 第二引数の文字列を、第一引数の文字で分割し配列で返す
    $parameters = explode('/', $_GET['url']);
    // $_GET['url'] = 'blogs/index';
    // $parameters = array('blogs', 'index');

    echo '<br>';
    echo $parameters[0]; // リソース名
    echo '<br>';
    echo $parameters[1]; // アクション名

    // GETパラメータで指定されたリソース名とアクション名を取得
    $resource = $parameters[0];
    $action = $parameters[1];

    // Contollers内のリソース名にふさわしいcontrollerファイルを呼び出し
    require('controllers/' . $resource . '_controller.php');
?>















