<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deudas', function (Blueprint $table) {
            $table->id(); // id INT AUTO_INCREMENT PRIMARY KEY
            $table->string('nombre_colegio'); // nombre_colegio VARCHAR(255) NOT NULL
            $table->decimal('cantidad_deuda', 10, 2); // cantidad_deuda DECIMAL(10, 2) NOT NULL
            $table->string('producto_entregado'); // producto_entregado VARCHAR(255) NOT NULL
            $table->date('fecha_entrega'); // fecha_entrega DATE NOT NULL
            $table->string('email_contacto'); // email_contacto VARCHAR(255) NOT NULL
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deudas');
    }
};
