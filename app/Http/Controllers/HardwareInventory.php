<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View ;
use App\Models\HardwareInventoryModel;
use App\Models\DepartmentModel;
use App\Models\ItemModel;

class HardwareInventory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $hardware_inventory = HardwareInventoryModel::where('status', '!=', '0')
                             ->paginate(10);
        return view('hardware-inventory.index', [
              'inventory' => $hardware_inventory
        ]);

    }


    public function create()
    {
        $departments = DepartmentModel::where('status', '!=', '0') ->get();
        $Item = ItemModel::where('status', '!=', '0')->get();

        return view('hardware-inventory.create',[
            'item' => $Item,
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
        $hardware = HardwareInventoryModel::create([
            'item_id' => $request->input('item'),
            'brand' => $request->input('brand_name'),
            'model' => $request->input('model_name'),
            'serial_number' => $request->input('serial_number'),
            'asset_number' => $request->input('asset_number'),
            'purchase_date' => $request->input('purchase_date'),
            'purchase_price' => $request->input('purchase_price'),
            'department_id' => $request->input('department'),
            'location' => $request->input('location'),
            'disposition' => $request->input('disposition'),
            'status' => $request->input('status'),
        ]);

        $hardware_id =  $hardware->id;


        $hardwares = HardwareInventoryModel::find($hardware_id);


        $audit = ([
            'details' => 'Create new Hardware Inventory with name '.$hardwares->item->item_name,
            'module' => 'Create Hardware Inventory',
            'action_type' => 'Create',
        ]);

        app('App\Http\Controllers\AudittrailController')->audit($audit);


        return redirect('/hardware')
                        ->with('success','Hardware Inventory created successfully.');
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
        $Item = ItemModel::where('status', '!=', '0')->get();
        $hardware = HardwareInventoryModel::find($id);

        return view('hardware-inventory.edit',[
            'item' => $Item,
            'department' => $departments,
            'hardware' =>  $hardware
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
           $department = HardwareInventoryModel::where('id',$id)
           ->update([
            'item_id' => $request->input('item'),
            'brand' => $request->input('brand_name'),
            'model' => $request->input('model_name'),
            'serial_number' => $request->input('serial_number'),
            'asset_number' => $request->input('asset_number'),
            'purchase_date' => $request->input('purchase_date'),
            'purchase_price' => $request->input('purchase_price'),
            'department_id' => $request->input('department'),
            'location' => $request->input('location'),
            'disposition' => $request->input('disposition'),
            'status' => $request->input('status'),
        ]);

        

        $hardwares = HardwareInventoryModel::find($id);


        $audit = ([
            'details' => 'Update new Hardware Inventory with name '.$hardwares->item->item_name,
            'module' => 'Update Hardware Inventory',
            'action_type' => 'Update',
        ]);

        app('App\Http\Controllers\AudittrailController')->audit($audit);

        return redirect('/hardware')
                 ->with('success','Hardware Inventory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $hardware = HardwareInventoryModel::where('id',$id)
            ->update([
                'status' => '0'
            ]);


            $hardwares = HardwareInventoryModel::find( $id);

            $audit = ([
                'details' => 'Delete Hardware Iventory with name '.$$hardwares->item->item_name,
                'module' => 'Delete Hardware Inventory',
                'action_type' => 'Delete',
            ]);

    
            app('App\Http\Controllers\AudittrailController')->audit($audit);

        return redirect('/hardware')
                       ->with('delete','Hardware Inventory deleted successfully.');
    }
}
