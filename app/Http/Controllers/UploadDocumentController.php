<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\RequirementDocument;
use App\DocumentType;
use Carbon\Carbon;

use \Input as Input;

class UploadDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Upload Document Persyaratan";

        $documentType = DocumentType::all();

        return view('documents.upload_form',compact(['documentType','page_title']));
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
        $input = $request->all();                    

        try {

            if ($request->hasFile('location')) {
                $fileName = md5(rand(0,2000)).'.'.$request->file('location')->getClientOriginalExtension();

                $folderImage = config('settings.folder_upload_location').Carbon::now(new \DateTimeZone('Asia/Jakarta'))
                            ->toDateString()."-".Auth::user()->fullName()."/";

                $file = $request->file('location');

                $file->move(public_path($folderImage), $fileName);
            }

            RequirementDocument::create([
                'user_id'   =>  Auth::id(),
                'document_type_id'  =>  $input['document_type_id'],
                'location'  =>  $folderImage.$fileName,
                'keterangan'  =>  $input['keterangan'],
            ]);

            return redirect()->route('home')
                            ->with('message','Data Berhasil Dismpan')
                            ->with('status','success')
                            ->with('type','success');
        } catch (\Exception $e) {
            return redirect()->back()
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
}
