<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Creacion de modelo Tareas con: php artisan make:model Tarea -m
     */
    public function up(): void
    {
        Schema::create('tareas', function (Blueprint $table) {
            //id (creada por defecto)
            $table->id();
            //Titulo
            $table->string('titulo');
            //Descripcion, puede quedar null porque no uchas veces se usa
            $table->text('descripción')->nullable();
            //Estado (booleana por los estado "Completado", "Por terminar", "Iniciada")
            $table->boolean('estado')->default(false);
            //timestamps (creada por defecto)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * Antes de, ejecutar: php artisan migrate
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
