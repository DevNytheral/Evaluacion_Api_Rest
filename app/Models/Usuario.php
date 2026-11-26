<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    protected $table = "usuarios";
    protected $fillable = [
        "rol_id",
        "name",
        "email",
        "email_verified_at",
        "password",
        "remember_token",
        "created_at",
        "updated_at"
    ];
    public function rol(){
        return $this->belongTo(Rol::class);
    }


    public function productos(){
        return $this->hasMany(Productos::class);
    }
}
