<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    use HasFactory;

    protected $table = 'audit_trails';

    protected $primaryKey = 'id';
    protected $fillable =  ['user_id', 'details','module','action_type','department_id'];


    public function users()
    {
        return $this->belongsTo(User::class);
    }


}
