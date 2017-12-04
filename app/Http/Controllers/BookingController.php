<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rumah;

class BookingController extends Controller
{
   public function booking($id)
   {
   		$rumah = Rumah::findOrFail($id);

   		try {
   			$rumah->booked_by = Auth::id();

   			$rumah->save();

   			return redirect()->back()
                ->with('message', 'Data Telah Tersimpan!')
                ->with('status','success')
                ->with('type','success');

   		} catch (\Exception $e) {
   			return redirect()->back()
                ->with('message', $e->getMessage())
                ->with('status','Something Wrong!')
                ->with('type','error');
   		}
   }
}
