<?php
/**
 * Created by PhpStorm.
 * User: dramd
 * Date: 1/8/2017
 * Time: 10:50 PM
 */
namespace Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        // when facebook call us a with token
    }
}