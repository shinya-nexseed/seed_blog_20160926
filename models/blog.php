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

        function show($option) {
            special_echo('モデルのshowメソッド呼び出し');
            special_echo('$idは' . $option . 'です(モデル内)');

            // パラメータから取得した$idを元に記事データ一件取得
                // WHERE `option` = $option ← この条件でデータを取得します
            $sql = 'SELECT * FROM `blogs` WHERE `delete_flag` = 0 AND `id` = ' . $option;
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

            $rtn = mysqli_fetch_assoc($results);
            return $rtn;
        }

        function create($post) {
            $sql = sprintf('INSERT INTO `blogs` SET `title` = "%s",
                                                    `body` = "%s",
                                                    `delete_flag` = 0,
                                                    `created` = NOW()',
                        mysqli_real_escape_string($this->dbconnect,$post['title']),
                        mysqli_real_escape_string($this->dbconnect,$post['body'])
                    );
            mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        }

        function edit($option) {
            $sql = 'SELECT * FROM `blogs` WHERE `delete_flag` = 0 AND `id` = ' . $option;
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

            $rtn = mysqli_fetch_assoc($results);
            return $rtn;
        }

        function update($post) {
            $sql = sprintf('UPDATE `blogs` SET `title` = "%s", `body` = "%s"
                                           WHERE `id` = %d',
                        mysqli_real_escape_string($this->dbconnect,$post['title']),
                        mysqli_real_escape_string($this->dbconnect,$post['body']),
                        $post['id']
                    );
            mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        }

        function delete($option) {
            special_echo('モデルのdeleteメソッド呼び出し');
            // 物理削除
            // $sql = 'DELETE FROM `blogs` WHERE `id` =' . $option;

            // 論理削除
            $sql = 'UPDATE `blogs` SET `delete_flag` = 1 WHERE `id` =' . $option;

            mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        }
    }
 ?>














