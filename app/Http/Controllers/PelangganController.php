<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PelangganController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Daftar pengguna";

        $users = User::where('role_id','>',1)->get();

        return view('pengguna.index',compact(['page_title','users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Tambah pengguna";

        return view('pengguna.create',compact(['page_title']));
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

        $user = new User;

        try {
            $user->create($input);

            return redirect('/admin/pelanggan')
                ->with('message', 'Data Telah Tersimpan!')
                ->with('status','success')
                ->with('type','success');

        } catch (\Exception $e) {
            return redirect('/admin/pelanggan')
                ->with('message', $e->getMessage())
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
