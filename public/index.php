<?php

require 'bootstrap.php';

try {
    router();

    require VIEWS.'master.php';
} catch (Exception $e) {
var_dump($e->getMessage());
}
