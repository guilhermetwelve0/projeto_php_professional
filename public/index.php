<?php

require 'bootstrap.php';

try {
    router();
    require '';
} catch (Exception $e) {
    var_dump($e->getMessage());
}


