<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('course')->nullable();
            $table->string('specialite')->nullable();
            $table->date('date');
            $table->time('hour')->nullable();
            $table->foreignId('teacher_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('school_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->text('observation')->nullable();
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
        Schema::dropIfExists('complaints');
    }
}
