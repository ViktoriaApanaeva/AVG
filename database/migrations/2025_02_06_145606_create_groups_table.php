<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id(); // Индикатор (первичный ключ)
            $table->string('name'); // Название группы
            $table->time('time'); // Время группы
            $table->unsignedBigInteger('teacher_id'); // Внешний ключ на преподавателя
            $table->timestamps(); // Поля created_at и updated_at

            // Определение внешнего ключа
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
