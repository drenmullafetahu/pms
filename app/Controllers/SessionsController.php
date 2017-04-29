<?php

namespace Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AppRequest;
use App\Http\Requests;
use Illuminate\Routing\Route;
use App\ViewShare\Dashboard as ViewShare;
use Facebook\FacebookRequest;
use Facebook\PersistentData\FacebookSessionPersistentDataHandler;
use Facebook\Facebook;
use Facebook\FacebookResponse;
use Facebook\FacebookApp;
use Facebook\Exceptions;

class SessionsController extends MainController
{
    public function create()
    {

    }

    public function store(Request $request)
    {
        $data = $request->only('email', 'password');
        $user = new User();
        if (\Auth::attempt($data)) {
            if (Auth::user()->hasRole('staff')) {
                return redirect(http('/profile'));
            }
            return redirect(http('/dashboard'));
        }
        return back()->withInput();

    }
}
