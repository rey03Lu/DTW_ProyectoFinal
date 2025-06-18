<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'descripcion', 'estado', 'fecha_vencimiento'
    ];

    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con usuarios
            $table->timestamps();
        });
    }
}
