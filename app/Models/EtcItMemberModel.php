<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtcItMemberModel extends Model
{
    use HasFactory;

    protected $table = 'etc_it_member';

    protected $primaryKey = 'id';
    protected $fillable =  ['name', 'image_path','position','details','arrangement','status'];

}
