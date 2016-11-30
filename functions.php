<?php
    define('DEBUG', true);

    function special_echo($val) {
        if (DEBUG) {
            echo $val;
            echo '<br>';
        }
    }

    function special_var_dump($val) {
        if (DEBUG) {
            echo '<pre>';
            var_dump($val);
            echo '</pre>';
        }
    }

    function get_last_referer() {
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null; // 遷移元のURLが存在すれば取得
        $referer = explode('/', $referer);
        $referer_action = array_pop($referer); // 配列の最後を取得
        return $referer_action;
    }
 ?>
