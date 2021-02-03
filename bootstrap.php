<?php

if (! function_exists('dump')) {
    function dump($data) {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }
}

require 'connection.php';
