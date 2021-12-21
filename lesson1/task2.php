<?php

include("task1.php");

class Post{
    function createPackage($type) {
        $package = new Package($type, rand(1000,5000));
        return $package;
    }
}
