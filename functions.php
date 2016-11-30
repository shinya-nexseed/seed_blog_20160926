<?php
    define('DEBUG', false);

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

    // ログイン判定
    function is_login() {
        require('dbconnect.php');
        if (isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
            // ログインしていると判定し、idを元にログインユーザーの情報を取得
            $_SESSION['time'] = time();

            $sql = sprintf('SELECT * FROM `users` WHERE `id`=%d',
                           mysqli_real_escape_string($db, $_SESSION['id'])
                           );
            $record = mysqli_query($db, $sql) or die(mysqli_error($db));
            $user = mysqli_fetch_assoc($record);
            return $user;
        } else {
            // ログインしていないと判定し、強制的に別ページへ遷移
            header('Location: /seed_blog/users/login');
            exit();
        }
    }

    // ログインユーザー情報取得
    function current_user() {
        require('dbconnect.php');
        if (isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
            // ログインしていると判定し、idを元にログインユーザーの情報を取得
            $_SESSION['time'] = time();

            $sql = sprintf('SELECT * FROM `users` WHERE `id`=%d',
                           mysqli_real_escape_string($db, $_SESSION['id'])
                           );
            $record = mysqli_query($db, $sql) or die(mysqli_error($db));
            $user = mysqli_fetch_assoc($record);
            return $user;
        } else {
            // nullを返す
            return null;
        }
    }

    function get_last_referer() {
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null; // 遷移元のURLが存在すれば取得
        $referer = explode('/', $referer);
        $referer_action = array_pop($referer); // 配列の最後を取得
        return $referer_action;
    }
 ?>
