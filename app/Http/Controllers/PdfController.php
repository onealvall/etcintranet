<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManagePdf;
use App\Models\DepartmentModel;
use App\Models\AuditTrail;
use Illuminate\Support\Facades\Storage;
class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pdf = ManagePdf::where('status', '!=', '0')
                     ->paginate(10);
         return view('pdf.index',[
               'pdf' => $pdf
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = DepartmentModel::where('status', '!=', '0') ->get();
            return view('pdf.create',[
                'department' => $departments
            ]);
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
            'pdf_name' => 'required',
            'pdf_file' => 'required|mimetypes:application/pdf|max:5000',
            'pdf_arrangement' => 'required',
            'pdf_status' => 'required ',
            'department' => 'required'
        ]);

    
        $get_department_name = DepartmentModel::find($request->department);
        $path_folders = public_path('images/pdf/department/'.$get_department_name->department_name);
        
        if(!Storage::exists($path_folders)){
            Storage::makeDirectory($path_folders);
        }

        $newImageName = time(). '-' . trim($request->pdf_name) . '.' . $request->pdf_file->extension();
        $request->pdf_file->move($path_folders, $newImageName);

        $department = ManagePdf::create([
            'pdf_name' => trim($request->input('pdf_name')),
            'file_path' => $newImageName,
            'arrangement' => $request->input('pdf_arrangement'),
            'status' => $request->input('pdf_status'),
            'department_id' => $request->input('department'),
        ]);

        $audit = ([
            'details' => 'Uploaded new PDF with name '.$newImageName,
            'module' => 'Create PDF',
            'action_type' => 'Upload',
        ]);

        app('App\Http\Controllers\AudittrailController')->audit($audit);


        return redirect('/pdf')
                          ->with('success','PDF created successfully');
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
        $departments = DepartmentModel::where('status', '!=', '0') ->get();
        $pdf = ManagePdf::find($id);
        return view('pdf.edit',[
            'department' => $departments,
            'pdf' => $pdf
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
                'pdf_name' => 'required',
                'pdf_file' => 'required|mimetypes:application/pdf|max:5000',
                'pdf_arrangement' => 'required',
                'pdf_status' => 'required ',
                'department' => 'required'
            ]);

            $get_department_name = DepartmentModel::find($request->department);
            $path_folders = public_path('images/pdf/department/'.$get_department_name->department_name);
            
            if(!Storage::exists($path_folders)){
                Storage::makeDirectory($path_folders);
            }

            $newImageName = time(). '-' . trim($request->pdf_name) . '.' . $request->pdf_file->extension();
            $request->pdf_file->move($path_folders, $newImageName);

            $department = ManagePdf::where('id',$id)
                 ->update([
                'pdf_name' => trim($request->input('pdf_name')),
                'file_path' => $newImageName,
                'arrangement' => $request->input('pdf_arrangement'),
                'status' => $request->input('pdf_status'),
                'department_id' => $request->input('department'),
            ]);

            $audit = ([
                'details' => 'Edit PDF with name '.$newImageName,
                'module' => 'Edit PDF',
                'action_type' => 'Edit',
            ]);
    
            app('App\Http\Controllers\AudittrailController')->audit($audit);

            return redirect('/pdf')
                       ->with('success','PDF updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pdf = ManagePdf::where('id', $id)
            ->update([
                'status' => '0'
        ]);

        $pdfs = ManagePdf::find( $id);

        $pdfName = $pdfs->file_path;
        $path_folders = public_path('images/pdf/department/');
        $file =  $path_folders.$pdfName;

          if(file_exists($file)){
             unlink($file);
          }

          $audit = ([
            'details' => 'Deleted PDF with name '.$pdfName,
            'module' => 'Delete PDF',
            'action_type' => 'Delete',
        ]);

        app('App\Http\Controllers\AudittrailController')->audit($audit);

       
       return redirect('/pdf')
                       ->with('delete','PDF deleted successfully');
    }
}
