<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable =  ['item_name', 'status'];

    public function hardware()
    {
        return $this->hasOne(HardwareInventoryModel::class);
    }

}
