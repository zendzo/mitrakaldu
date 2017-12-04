<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Perumahan;

class PerumahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Data Perumahan";

        $perumahan = Perumahan::all();

        return view('perumahan.index',compact(['page_title','perumahan']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Tambah Daftar Perumahan";

        return view('perumahan.create',compact(['page_title']));
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

        try {

            Perumahan::create([
                'nama' => $input['nama'],
                'alamat' => $input['alamat'],
            ]);

            return redirect()->route('admin.master.perumahan.index')
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
}
