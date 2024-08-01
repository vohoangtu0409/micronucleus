<?php
use Illuminate\Http\Request;

require "vendor/autoload.php";

(require_once __DIR__.'/Resources/bootstrap/app.php')
    ->handleRequest(Request::capture());