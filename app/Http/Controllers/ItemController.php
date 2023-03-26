<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemModel;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Item = ItemModel::where('status', '!=', '0')
                     ->paginate(10);

        return view('Item.index', [
        'Item' => $Item
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $department = ItemModel::create([
            'item_name' => $request->input('item_name'),
            'status' => $request->input('item_status'),
        ]);

        $audit = ([
            'details' => 'Creted new Item with name '.$request->input('item_name'),
            'module' => 'Create Item',
            'action_type' => 'Create',
        ]);

        app('App\Http\Controllers\AudittrailController')->audit($audit);

        return redirect('/Item')
                          ->with('success','Item created successfully');
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
        $item = ItemModel::find($id);
        return view('item.edit')->with('item', $item);
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
        $item = ItemModel::where('id',$id)
        ->update([
            'item_name' => $request->input('item_name'),
            'status' => $request->input('item_status'),
         ]);


         $audit = ([
            'details' => 'Updated  Item with name '.$request->input('item_name'),
            'module' => 'Edit Item',
            'action_type' => 'Update',
         ]);

        app('App\Http\Controllers\AudittrailController')->audit($audit);

        return redirect('/Item')
                           ->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $department = ItemModel::where('id',$id)
            ->update([
                'status' => '0'
           ]);

           $item = ItemModel::find($id);

           $audit = ([
            'details' => 'Deleted  Item with name '.$item['item_name'],
            'module' => 'Delete Item',
            'action_type' => 'Delete',
         ]);
         
         app('App\Http\Controllers\AudittrailController')->audit($audit);

           return redirect('/Item')
                    ->with('delete','Item deleted successfully');
    }
}
