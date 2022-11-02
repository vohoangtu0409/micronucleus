<?php
namespace App\Dashboard\Controllers;

use Tuezy\Controller;

class IndexController extends Controller{
    public function index(){
        return view("dashboard::index" , [ 'title' => 'Dashboard']);
    }
}