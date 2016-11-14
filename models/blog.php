<?php
    special_echo('Modelのblog.phpが呼ばれました');

    // Modelのクラス
    class Blog {
        // プロパティ
        private $dbconnect;

        function __construct() {
            //DB接続
            require('dbconnect.php');
            $this->dbconnect = $db;
        }

        function index() {
            special_echo('モデルのindex()が呼び出されました。');

            // 論理削除
            // 0 → 表示, 1 → 削除
            $sql = 'SELECT * FROM `blogs` WHERE `delete_flag` = 0';
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

            // 戻り値 (Controllerへ渡すデータ)
            $rtn = array();
            while ($result = mysqli_fetch_assoc($results)) {
                $rtn[] = $result;
            }

            // var_dump($rtn);
            return $rtn;
        }
    }
 ?>





