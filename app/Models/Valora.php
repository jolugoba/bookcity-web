<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valora extends Model
{
    use HasFactory;


    public function libros(){
        return $this->belongsTo(Libro::class,    'libro_id');
    }

    
    public function users(){
        return $this->belongsTo(User::class,    'user_id');
    }
}
