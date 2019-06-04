<?php

function loadClass($classe)
{
    require $_SERVER['DOCUMENT_ROOT'] . '/partials/classes/' . $classe . '.php';
}

spl_autoload_register('loadClass');
