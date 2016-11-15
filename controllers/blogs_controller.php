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

      case 'add':
        $controller->add();
        break;

      case 'create':
        if (!empty($post['title']) && !empty($post['body'])) {
            $controller->create($post);
        } else {
            $controller->add();
        }
        break;

      case 'edit':
        $controller->edit($id);
        break;

      case 'update':
        $controller->update($post);
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
            $this->viewOptions = $this->blog->show($id); // 戻り値 $rtnを受け取る
            // special_var_dump($this->viewOptions);
            $this->action = 'show';
            $this->display();
        }

        function add() {
            special_echo('Controllerのadd()が呼び出されました。');
            $this->action = 'add';
            $this->display();
        }

        function create($post) {
            special_echo('Controllerのcreate()が呼び出されました。');
            $this->blog->create($post);
            header('Location: index');
        }

        function edit($id) {
            special_echo('Controllerのedit()が呼び出されました。');

            // model処理
            $this->viewOptions = $this->blog->edit($id);

            $this->action = 'edit';
            $this->display();
        }

        function update($post) {
            $this->blog->update($post);
            header('Location: index');
        }

        // Viewを表示するメソッド
        function display() {
            require('views/layouts/application.php');
        }
    }
 ?>





