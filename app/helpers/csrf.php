<?php

function getCsrf()
{
    $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(8));
    return "<input name='csrf' type='hidden' value=" . $_SESSION["csrf"] . ">";
}

function checkCsrf()
{
}
