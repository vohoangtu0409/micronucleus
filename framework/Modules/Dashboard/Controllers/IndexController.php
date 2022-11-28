<?php

namespace Module\Dashboard\Controllers;

use Module\Core\BaseController;

class IndexController extends BaseController{
    public function __construct()
    {
        $this->middleware(['auth:admin'])->except('blank');
    }

    public function index(){
        return view('dashboard::pages.index');
    }
    public function blank(){
        return view('dashboard::pages.index');
    }
}
