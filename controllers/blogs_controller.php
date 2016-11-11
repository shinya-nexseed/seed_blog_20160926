<?php
    require('models/blog.php');

    echo 'blogs_controller.phpが呼び出されました。';

    // インスタンス化
    $controller = new BlogsController();

    // アクションによって呼び出すメソッドを変える
    switch ($action) {
      case 'index':
        $controller->index();
        break;

      default:
        # code...
        break;
    }

    // コントローラのクラス
    class BlogsController {

        // プロパティ
        private $blog;

        function __construct() {
            $this->blog = new blog();
        }

        //  一覧ページ表示アクション
        function index() {
            echo 'Controllerのindex()が呼び出されました。';
            // モデルを呼び出してデータを返り値として取得
            $this->blog->index();

            // データをViewに送る
            require('views/blogs/index.php');
        }

        // 詳細ページ表示アクション
        function show() {
            echo 'Controllerのshow()が呼び出されました。';
        }
    }
 ?>
