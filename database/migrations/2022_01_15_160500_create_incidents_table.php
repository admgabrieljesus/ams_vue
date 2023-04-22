<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('incidents', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->default(0);
                $table->unsignedBigInteger('incidentable_id');
                $table->string('incidentable_type', 100);
                $table->date('date', 12);
                $table->text('comment');
                $table->softDeletes();
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
        Schema::dropIfExists('incidents');
    }
}
