<form action="/user/profile/update" method="post"></form>

<hr>
<?php echo getFlash('upload_error'); ?>
<form action="/user/image/update" method="post" enctype="multipart/form-data">
  <input type="file" name="file"  >
  <button type="submit">Alterar foto</button>

</form>