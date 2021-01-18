<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('trailer_id');
            $table->string('name');
            $table->string('source_city');
            $table->string('destination_city');
            $table->string('source_company');
            $table->string('destination_company');
            $table->integer('distance_come')->default(0);
            $table->integer('estimed_distance')->default(0);
            $table->integer('mass');
            $table->float('income');
            $table->datetime('deadline_time');
            $table->string('status');
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
        Schema::dropIfExists('trains');
    }
}
