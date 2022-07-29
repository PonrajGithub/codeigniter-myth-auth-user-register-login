<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function home()
    {
        return view('dashboard');
    }
}
