<h2>Login</h2>
<?php echo getFlash('message'); ?>

<form action="/login" method="post" id="box-login">
    <input type="text" name="email" placeholder="Seu email" value="maegan.steuber@bruen.net">
    <input type="password" name="password" placeholder="Sua senha" value="123">
    <button type="submit">Login</button>
</form>