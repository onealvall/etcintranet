<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComputerInventoryModel extends Model
{
    use HasFactory;

    protected $table = 'computer_inventories';

    protected $dates = [
        'purchase_date',
    ];

    protected $fillable =  [
                            'computer_name', 
                            'computer_type' , 
                            'asset_number' , 
                            'domain', 
                            'system_type', 
                            'department_id', 
                            'location',
                            'disposition',
                            'status'
                        ];

    public function department()
    {
        return $this->belongsTo(DepartmentModel::class);
    }



}
