<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Creacion de modelo Tareas con: php artisan make:model Tarea -m
class Tarea extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'descripcion', 'estado'];
}
