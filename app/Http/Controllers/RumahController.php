<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Rumah;

class RumahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Unit Rumah";

        $unitrumah = Rumah::all();

        return view('rumah.index',compact(['page_title','unitrumah']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Tambah Unit";

        return view('rumah.create',compact(['page_title']));
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

        // $rumah = new Rumah;

        // $harga = $input['harga'];
        // $deposit = $harga * 0.1;
        // $angsuran = $deposit / 10;

        try {

           if ($request->hasFile('location')) {
                $fileName = md5(rand(0,2000)).'.'.$request->file('location')->getClientOriginalExtension();

                $folderImage = config('settings.folder_upload_location').Carbon::now(new \DateTimeZone('Asia/Jakarta'))
                            ->toDateString()."-".Auth::user()->fullName()."/";

                $file = $request->file('location');

                $file->move(public_path($folderImage), $fileName);
            }

            Rumah::create([
                'rumah_type_id' => $input['rumah_type_id'],
                'perumahan_id'  =>  $input['perumahan_id'],
                'block' => $input['block'],
                'no' => $input['no'],
                'subsidi' => $input['subsidi'],
                'harga' => $input['harga'],
                'location' => $folderImage.$fileName,
            ]);

            return redirect()->route('admin.rumah.index')
                            ->with('message','Data Telah Tersimpan')
                            ->with('status','success')
                            ->with('type','success');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()
                            ->with('message',$e->getMessage())
                            ->with('status','Something Wrong!')
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
        $rumah = Rumah::findOrFail($id);

        $page_title = "Detail Rumah ".$rumah->type->type." Block ".$rumah->block;

        return view('rumah.show',compact(['page_title','rumah']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = "Edit Unit";

        try {

            $rumah = Rumah::findOrFail($id);

            return view('rumah.edit',compact(['rumah','page_title']));

        } catch (\Exception $e) {
            return redirect()->back()
                            ->with('message',$e->getMessage())
                            ->with('status','Something Wrong!')
                            ->with('type','error');
        }
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
        $input = $request->all();

        $rumah = Rumah::findOrFail($id);

        try {
            $rumah->update($input);

            return redirect()->route('admin.rumah.index')
                            ->with('message','Data Berhasil Diupdate!')
                            ->with('status','success')
                            ->with('type','success');
        } catch (Exception $e) {
            return redirect()->back()
                            ->with('message',$e->getMessage())
                            ->with('status','Something Wrong!')
                            ->with('type','error');
        }
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
}
