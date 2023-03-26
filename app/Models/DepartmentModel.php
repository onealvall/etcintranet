<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentModel extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $primaryKey = 'id';
    protected $fillable =  ['department_name', 'status'];

    public function hardware()
    {
        return $this->hasOne(HardwareInventoryModel::class);
    }

    public function hardware_computer()
    {
        return $this->hasOne(ComputerInventoryModel::class);
    }

    public function pdf()
    {
        return $this->hasOne(ManagePdf::class);
    }


}
