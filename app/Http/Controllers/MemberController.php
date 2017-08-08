<?php
/**
 * Created by PhpStorm.
 * User: 军哥
 * Date: 2017/7/18
 * Time: 17:09
 */

namespace App\Http\Controllers;


class MemberController extends Controller
{
    public function info($id){
        return '111'.$id;
    }
}