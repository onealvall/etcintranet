<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagePdf extends Model
{
    use HasFactory;

    protected $table = 'manage_pdfs';

    protected $primaryKey = 'id';
    protected $fillable =  ['pdf_name', 'file_path','arrangement','status','department_id'];



    public function department()
    {
        return $this->belongsTo(DepartmentModel::class);
    }
    
}
