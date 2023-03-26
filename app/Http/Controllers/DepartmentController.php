<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepartmentModel;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = DepartmentModel::where('status', '!=', '0')
                       ->paginate(10);
        
        return view('department.index', [
              'departments' => $departments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
        $department = DepartmentModel::create([
            'department_name' => $request->input('department_name'),
            'status' => $request->input('department_status'),
        ]);


        $audit = ([
            'details' => 'Create new Department with name '.$request->input('department_name'),
            'module' => 'Create Deparment',
            'action_type' => 'Create',
        ]);

        app('App\Http\Controllers\AudittrailController')->audit($audit);

        return redirect('/department')
                    ->with('success','Deparment created successfully.');
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
        $department = DepartmentModel::find($id);
        return view('department.edit')->with('department', $department);
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
        
        $department = DepartmentModel::where('id',$id)
            ->update([
                'department_name' => $request->input('department_name'),
                'status' => $request->input('department_status'),
        ]);

        $audit = ([
            'details' => 'Update new Department with name '.$request->input('department_name'),
            'module' => 'Update Department',
            'action_type' => 'Update',
        ]);

        app('App\Http\Controllers\AudittrailController')->audit($audit);

        return redirect('/department')
                          ->with('success','Deparment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

            $department = DepartmentModel::where('id',$id)
            ->update([
                'status' => '0'
           ]);

           
            $departments = DepartmentModel::find( $id);

           $audit = ([
                'details' => 'Delete Department with name '.$departments->department_name,
                'module' => 'Delete Department',
                'action_type' => 'Delete',
            ]);

            app('App\Http\Controllers\AudittrailController')->audit($audit);

           return redirect('/department')
                        ->with('delete','Deparment deleted successfully.');
    }
}
