<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = null;
        return view('welcome', compact('user'));
    }


    /**
     * Handle calls to missing methods on the controller.
     *
     * @param  array   $parameters
     * @return redirect
     */
    public function missingMethod($parameters = array())
    {
        return redirect('/');
    }
}
