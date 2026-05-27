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
        Schema::create('medicions', function (Blueprint $table) {
    $table->id();
    $table->date('fecha');
    $table->string('turno');
    $table->string('sector');
    $table->string('parametro');
    $table->decimal('valor', 10, 2);
    $table->string('unidad');
    $table->string('responsable');
    $table->text('observaciones')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicions');
    }
};
