<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolar extends Model
{
    use HasFactory;
    protected $table = 'todolar';
    protected $fillable = ['id','baslik','durum'];
}
