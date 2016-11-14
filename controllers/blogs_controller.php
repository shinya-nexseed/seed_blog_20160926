<?php
    require('models/blog.php');

    special_echo('blogs_controller.phpが呼び出されました。');

    // インスタンス化
    $controller = new BlogsController();

    // アクションによって呼び出すメソッドを変える
    switch ($action) {
      case 'index':
        $controller->index();
        break;

      case 'show':
        $controller->show($id);
        break;

      default:
        # code...
        break;
    }

    // コントローラのクラス
    class BlogsController {

        // プロパティ
        private $blog;
        private $resource;
        private $action;
        private $viewOptions;

        function __construct() {
            $this->blog = new Blog();
            $this->resource = 'blogs';
            $this->action = 'index';
            $this->viewOptions = array();
        }

        //  一覧ページ表示アクション
        function index() {
            special_echo('Controllerのindex()が呼び出されました。');
            // モデルを呼び出してデータを返り値として取得
            $this->viewOptions = $this->blog->index();

            // データをViewに送る
            $this->display();
        }

        // 詳細ページ表示アクション
        function show($id) {
            special_echo('Controllerのshow()が呼び出されました。');
            special_echo('$idは' . $id . 'です。');
        }

        // Viewを表示するメソッド
        function display() {
            require('views/layouts/application.php');
        }
    }
 ?>
