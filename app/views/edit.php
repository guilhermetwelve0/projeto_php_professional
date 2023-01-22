<?php $this->layout('master', ['title' => $title]) ?>

<img src="" alt="">

<form action="/user/profile/update" method="post"></form>

<hr>
<?php echo getFlash('upload_error'); ?>
<?php echo getFlash('upload_success', 'color:green'); ?>
<form action="/user/image/update" method="post" enctype="multipart/form-data">
  <input type="file" name="file">
  <button type="submit">Alterar foto</button>

</form>