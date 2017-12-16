<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rumah;

class UserWelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rumah = Rumah::whereNull('booked_by')->get();

        return view('user.index',compact(['rumah']));
    }
}