<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserController extends Controller
{
    public function showUserName(){

        return 'Ahmad Emam';
    }

    public function getIndex(){

    /*$data=[];
    $data['id']=5;
    $data['name']='Ali Kazan';

    $obj = new \stdClass();

    $obj -> name ='ahmad';
    $obj -> id =5;
    $obj -> gendor ='male';
    */
$data=[];
    return view('welcome',compact('data'));
    }
    
}

