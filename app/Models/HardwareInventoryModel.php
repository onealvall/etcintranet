<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HardwareInventoryModel extends Model
{
    use HasFactory;

    protected $table = 'hardware_inventories';

    protected $dates = [
        'purchase_date',
    ];

    protected $fillable =  [
                            'item_id', 
                            'brand' , 
                            'model' , 
                            'serial_number', 
                            'asset_number', 
                            'purchase_date', 
                            'purchase_price',
                            'department_id',
                            'location',
                            'disposition',
                            'status',
                        ];

    public function department()
    {
        return $this->belongsTo(DepartmentModel::class);
    }

    public function item ()
    {
        return $this->belongsTo(ItemModel::class);
    }



}
