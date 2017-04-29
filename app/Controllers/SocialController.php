<?php
/**
 * Created by PhpStorm.
 * User: dramd
 * Date: 1/8/2017
 * Time: 10:50 PM
 */
namespace Controllers;
class SocialController extends MainController
{
    public function index()
    {
        return view('dashboard.templates.social');
    }
}