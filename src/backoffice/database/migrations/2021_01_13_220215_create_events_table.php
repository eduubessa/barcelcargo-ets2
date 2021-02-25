<?php

use App\Utils\Constants\StatusInterface;
use App\Utils\Constants\TypeInterface;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('train_id')->nullable();
            $table->string('photo');
            $table->string('title');
            $table->string('description');
            $table->string('body');
            $table->string('event_at');
            $table->string('slug')->unique();
            $table->string('type')->default(TypeInterface::Types_Event_Normal);
            $table->string('status')->default(StatusInterface::Status_Event_Pending);
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
        Schema::dropIfExists('events');
    }
}
