<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EtcItMemberModel;
use Illuminate\Support\Facades\Storage;

class EtcITMember extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etc = EtcItMemberModel::where('status', '!=', '0')
                    ->paginate(10);
        return view('etcitmember.index',[
                                'etc' => $etc
                                ]);
                    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('etcitmember.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file_path' => ['file', 'mimes:jpg,jpeg,png', 'max:10048'],
            'name' => 'required',
            'position' => 'required',
            'details' => 'required ',
            'arrangement' => 'required',
            'status' => 'required',
        ]);

        $path_folders = public_path('images/ETC-IT-ORG-CHART/');

        if(!Storage::exists($path_folders)){
            Storage::makeDirectory($path_folders);
        }

        $newImageName = time(). '-' . trim($request->name) . '.' . $request->file_path->extension();
        $request->file_path->move($path_folders, $newImageName);

        $department = EtcItMemberModel::create([
            'name' =>   $request->input('name'),
            'image_path' => $newImageName,
            'position' => $request->input('position'),
            'details' => $request->input('details'),
            'arrangement' => $request->input('arrangement'),
            'status' => $request->input('status'),
        ]);


        $audit = ([
            'details' => 'Uploaded new IT with name '.$request->input('name'),
            'module' => 'Upload IT',
            'action_type' => 'Upload',
        ]);

        app('App\Http\Controllers\AudittrailController')->audit($audit);

        return redirect('/etcit')
                ->with('success','Upload new IT successfully');


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
       
        $etc = EtcItMemberModel::find($id);
        return view('etcitmember.edit',[
            'etc' => $etc
        ]);
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
        $request->validate([
            'file_path' => ['file', 'mimes:jpg,jpeg,png', 'max:10048'],
            'name' => 'required',
            'position' => 'required',
            'details' => 'required ',
            'arrangement' => 'required',
            'status' => 'required',
        ]);


        
        $path_folders = public_path('images/ETC-IT-ORG-CHART/');
        
        if(!Storage::exists($path_folders)){
            Storage::makeDirectory($path_folders);
        }

        $newImageName = time(). '-' . trim($request->name) . '.' . $request->file_path->extension();
        $request->file_path->move($path_folders, $newImageName);

        $department =  EtcItMemberModel::where('id',$id)
                    ->update([
                    'name' =>   $request->input('name'),
                    'image_path' => $newImageName,
                    'position' => $request->input('position'),
                    'details' => $request->input('details'),
                    'arrangement' => $request->input('arrangement'),
                    'status' => $request->input('status'),
          ]);


          $audit = ([
            'details' => 'Edit It  with name '.$newImageName,
            'module' => 'Edit It',
            'action_type' => 'Edit',
        ]);
        app('App\Http\Controllers\AudittrailController')->audit($audit);

        return redirect('/etcit')
                ->with('success','Updated IT successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pdf = EtcItMemberModel::where('id', $id)
        ->update([
            'status' => '0'
            ]);

            $pdfs = EtcItMemberModel::find( $id);

            $audit = ([
                'details' => 'Deleted IT with name '.$pdfs->name,
                'module' => 'Delete IT',
                'action_type' => 'Delete',
            ]);

            app('App\Http\Controllers\AudittrailController')->audit($audit);

        
              return redirect('/etcit')
                   ->with('delete','IT deleted successfully');
    }
}
