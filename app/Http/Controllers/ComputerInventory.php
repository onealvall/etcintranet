<?php

namespace App\Http\Controllers;
use App\Models\ComputerInventoryModel;
use App\Models\DepartmentModel;
use Illuminate\Http\Request;

class ComputerInventory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $computer_inventory = ComputerInventoryModel::where('status', '!=', '0')
                              ->paginate(10);
             return view('computer-inventory.index ',[
            'inventory' => $computer_inventory
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
        return view('computer-inventory.create',[
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
        $department = ComputerInventoryModel::create([
            'computer_name' => $request->input('computer_name'),
            'computer_type' => $request->input('computer_type'),
            'asset_number' => $request->input('asset_number'),
            'domain' => $request->input('domain'),
            'system_type' => $request->input('system_type'),
            'department_id' => $request->input('department'),
            'location' => $request->input('location'),
            'disposition' => $request->input('disposition'),
            'status' => $request->input('status'),
        ]);

        $audit = ([
            'details' => 'Create new Computer Inventory with name '.$request->input('computer_name'),
            'module' => 'Create Computer Inventory',
            'action_type' => 'Create',
        ]);

        app('App\Http\Controllers\AudittrailController')->audit($audit);

        return redirect('/computer')
                        ->with('success','Computer Inventory created successfully.');
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
        $computer = ComputerInventoryModel::find($id);

        return view('computer-inventory.edit',[
            'department' => $departments,
            'computer' =>  $computer
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
        $department = ComputerInventoryModel::where('id',$id)
            ->update([
            'computer_name' => $request->input('computer_name'),
            'computer_type' => $request->input('computer_type'),
            'asset_number' => $request->input('asset_number'),
            'domain' => $request->input('domain'),
            'system_type' => $request->input('system_type'),
            'department_id' => $request->input('department'),
            'location' => $request->input('location'),
            'disposition' => $request->input('disposition'),
            'status' => $request->input('status'),
     ]);


        $audit = ([
            'details' => 'Update Computer Inventory with name '.$request->input('computer_name'),
            'module' => 'Update Computer Inventory',
            'action_type' => 'Update',
        ]);

      app('App\Http\Controllers\AudittrailController')->audit($audit);

     return redirect('/computer')
                      ->with('success','Computer Inventory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $computer = ComputerInventoryModel::where('id',$id)
            ->update([
                'status' => '0'
            ]);

        $computers = ComputerInventoryModel::find( $id);

            $audit = ([
                'details' => 'Delete Computer Inventory with name '.$computers->computer_name,
                'module' => 'Delete Computer Inventory',
                'action_type' => 'Delete',
            ]);
    
          app('App\Http\Controllers\AudittrailController')->audit($audit);

        return redirect('/computer')
                               ->with('delete','Computer Inventory deleted successfully.');
    }
    
}
