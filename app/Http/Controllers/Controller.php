<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests,    DispatchesJobs, ValidatesRequests;
    function __construct()
    {
      $this->Dangnhap();

    }
    function Dangnhap()
    {
        if(Auth::check())
        {
            view()->share('User_Login',Auth::user());
        }
    }
}
