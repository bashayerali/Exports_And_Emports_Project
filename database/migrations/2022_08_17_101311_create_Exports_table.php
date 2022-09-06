<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Exports', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedInteger('num')->unique();
            $table->string('notes');
            $table->enum('status',['معلقه','تم التسليم'])->default('معلقه');
            $table->date('date');
            $table->string('sender_name');
            $table->foreignId('sender_department')->constrained('departments');
            $table->foreignId('receiver_department')->constrained('departments');
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
        Schema::dropIfExists('Exports');
    }
}
