<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type');
            $table->decimal('amount', 8, 2);
            $table->foreignId('grade_id')->constrained('grades')->cascadeOnUpdate();
            $table->foreignId('classroom_id')->constrained('classrooms')->cascadeOnUpdate();
            $table->string('description')->nullable();
            $table->string('year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fees');
    }
};