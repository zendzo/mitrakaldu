<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\AngsuranCompletedNotification;
use App\Notifications\AngsuranLunasNotification;
use App\Notifications\AngsuranRejectedNotification;
use App\Notifications\AngsuranInvoiceNotification;
use App\Notifications\RemainderAngsuranNotification;
use App\Angsuran;
use Carbon\Carbon;

class AngsuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Daftar Angsuran";

        $angsuran = Angsuran::all();

        return view('angsuran.index',compact(['page_title','angsuran']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Upload Bukti Pembayran Angsuran";

        return view('angsuran.create',compact(['page_title']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        if ($input['jumlah'] < Auth::user()->rumah->angsuran) {
            return redirect()->back()->withInput()
                            ->with('message','Jumlah Angsuran Kurang dari Ketentuan! Minimal : '.Auth::user()->rumah->angsuran)
                            ->with('status','Jumlah Pembayaran Kurang')
                            ->with('type','warning');
        }

        $input = $request->all();

         $validator = Validator::make($request->all(), [
            'location' => 'mimes:jpeg,bmp,png|max:2048'
        ]);

         $messages = $validator->errors();

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs()
                            ->with('message',$messages->first('location'))
                            ->with('status','File Maks!')
                            ->with('type','error');
        }
        
        try {

            if ($request->hasFile('location')) {
                $fileName = md5(rand(0,2000)).'.'.$request->file('location')->getClientOriginalExtension();

                $folderImage = config('settings.folder_upload_location').Carbon::now(new \DateTimeZone('Asia/Jakarta'))
                            ->toDateString()."-".Auth::user()->fullName()."/";

                $file = $request->file('location');
            }

            Angsuran::create([
                'user_id'   =>  $input['user_id'],
                'rumah_id'  =>  $input['rumah_id'],
                'kode'  =>  $input['kode'],
                'jumlah'  =>  $input['jumlah'],
                'tanggal_bayar'  =>  $input['tanggal_bayar'],
                'tanggal_tempo'  =>  Carbon::now()->addMonth(),
                'location'  =>  $folderImage.$fileName,
            ]);

            $file->move(public_path($folderImage), $fileName);

            return redirect()->route('home')
                            ->with('message','Data Berhasil Dismpan')
                            ->with('status','success')
                            ->with('type','success');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()
                            ->with('message',$e->getMessage())
                            ->with('status','error')
                            ->with('type','error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function approved($id)
    {
        $angsuran = Angsuran::findOrFail($id);

        // return $angsuran;

        try {
            $angsuran->completed = true;

            $angsuran->user->notify(new AngsuranCompletedNotification($angsuran));

            $angsuran->save();

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

    public function rejected($id)
    {
        $angsuran = Angsuran::findOrFail($id);

        // return $angsuran;

        try {
            $angsuran->completed = false;

            $angsuran->user->notify(new AngsuranRejectedNotification($angsuran));
            
            $angsuran->save();

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

    public function invoice($id)
    {
        $angsuran = Angsuran::findOrFail($id);

        // return $angsuran;

        try {

            $angsuran->user->notify(new AngsuranInvoiceNotification($angsuran));

           return redirect()->back()
                ->with('message', 'SMS Taggihan Telah Dikirim!')
                ->with('status','success')
                ->with('type','success');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', $e->getMessage())
                ->with('status','Something Wrong!')
                ->with('type','error');
        }
    }

    public function jatuhTempo()
    {
        $page_title = "Daftar Angsuran";

        $angsurans = Angsuran::where('remainder_sent',false)->where('tanggal_tempo','<',Carbon::now())->get();

        foreach ($angsurans as $angsuran) {
            try {
                $angsuran->user->notify(new RemainderAngsuranNotification($angsuran));

                $angsuran->remainder_sent = true;

                $angsuran->save();

                \Log::info('sms sent to '.$angsuran->user->first_name.' item kode :'.$angsuran->id);

            } catch (\Exception $e) {
                return redirect()->back()
                            ->with('message',$e->getMessage())
                            ->with('status','Something Wrong!')
                            ->with('type','error');
            }
        }

        return view('angsuran.index_tempo',compact(['page_title','angsurans']));
    }
}
