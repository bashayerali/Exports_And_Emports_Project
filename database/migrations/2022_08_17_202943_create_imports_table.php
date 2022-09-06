<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imports', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('Export_num');
            $table->foreign('Export_num')->references('num')->on('Exports');
            $table->date('received_date')->nullable();
            $table->enum('im_status',['معلقة','تم الإستلام'])->default('معلقة');
            $table->string('receiver_name')->nullable();;

            $table->string('comment')->nullable();

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
        Schema::dropIfExists('imports');

    }
}
