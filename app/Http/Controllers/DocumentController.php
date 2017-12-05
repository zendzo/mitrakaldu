<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RequirementDocument;

use App\Notifications\DocumentApprovedNotification;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Daftar Document Persyaratan";

        $RD = RequirementDocument::all();

        return view('documents.index',compact(['page_title','RD']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $document = RequirementDocument::findOrFail($id);

        try {
            $document->approved = true;

            $document->user->notify(new DocumentApprovedNotification($document));
            
            $document->save();

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
