<?php

function controller($matchedUri)
{
    [$controller, $method] = explode('@',array_values($matchedUri)[0]);

    if(class_exists(CONTROLLER_PATH.$controller)){
        var_dump('existe');
        die();
    }
}