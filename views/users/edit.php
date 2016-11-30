<div class="msg">
  <form method="post" action="/seed_blog/users/update" class="form-horizontal" role="form">
    <div class="form-group">
      <label for="name" class="col-md-3 control-label">名前</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="name" value="<?php echo $this->viewOptions['name']; ?>">
        <?php if(isset($this->viewErrors['name']) && $this->viewErrors['name'] == 'blank'): ?>
          <p style="color:red;">* 名前を入力してください</p>
        <?php endif; ?>
      </div>
    </div>
    <div class="form-group">
      <label for="email" class="col-md-3 control-label">メールアドレス</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="email" value="<?php echo $this->viewOptions['email']; ?>">
        <?php if(isset($this->viewErrors['email']) && $this->viewErrors['email'] == 'blank'): ?>
          <p style="color:red;">* メールアドレスを入力してください</p>
        <?php endif; ?>
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="col-md-3 control-label">パスワード</label>
      <div class="col-md-9">
        <!-- <input type="password" class="form-control" name="password" value=""> -->
        ●●●●●●●●●●●●
      </div>
    </div>
    <div class="form-group pull-right">
      <p>
        <a href="/seed_blog/blogs/index" class="btn btn-default">トップへ</a>&nbsp;&nbsp;
        <input type="submit" class="btn btn-success" value="更新">
      </p>
    </div>
  </form>
</div>
