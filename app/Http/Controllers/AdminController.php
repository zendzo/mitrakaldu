<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rumah;
use App\Angsuran;

class AdminController extends Controller
{
    public function index()
    {
    	$page_title = "Halaman utama";

        $user = User::where('role_id','!=',1)->count();

        $unitrumah = Rumah::count();

        $angsuran_berjalan = Angsuran::where('completed',false)->count();

        $angsuran_selesai = Angsuran::where('completed',true)->count();

    	return view('admin.home',compact(['page_title','user','unitrumah','angsuran_berjalan','angsuran_selesai'])); 
    }
}
