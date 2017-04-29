<?php
/**
 * Created by PhpStorm.
 * User: dramd
 * Date: 1/12/2017
 * Time: 4:44 PM
 */
namespace Controllers;
class PrivacyController extends MainController
{
    public function index()
    {
        return view('dashboard.templates.privacy');
    }
}