<?php

function getExtension(string $name)
{
    return pathinfo($name, PATHINFO_EXTENSION);
}
