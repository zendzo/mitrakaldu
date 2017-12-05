<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\RequirementDocument;
use App\Rumah;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // redirect to admin page is user is ad administrator
        if (Auth::user()->role_id === 1) {
            return redirect('/admin');
        }
        
        $page_title = "Home";

        $RD = Auth::user()->requirementDocuments;

        $booked_item = Auth::user()->rumah;

        $rumah = Rumah::whereNull('booked_by')->get();

        $KK = RequirementDocument::whereUserId(Auth::id())->where('document_type_id',1)->get();

        $KTP = RequirementDocument::whereUserId(Auth::id())->where('document_type_id',2)->get();


        if (!is_null(Auth::user()->rumah)) {
            return view('home',compact(['page_title','RD','booked_item','KTP','KK']));
        }else{
            return view('user.index',compact(['page_title','rumah']));
        }
    }
}
