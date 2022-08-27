<?php

namespace Alex\LaravelDocSchema\Controllers;

use Illuminate\Routing\Controller;

class WelcomeController extends Controller
{
    /**
     * Display the installer welcome page.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $server = $_SERVER['SERVER_NAME'];
        $server = appServerUrl($server);
        return view('pdo::welcome',compact('server'));
    }
}
