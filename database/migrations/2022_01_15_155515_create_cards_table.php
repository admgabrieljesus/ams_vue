<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('cards', function (Blueprint $table) {
                $table->id();
                $table->foreignId('associate_id')->default(0);
                $table->foreignId('dependent_id')->default(0);
                $table->date('issue'); // data de emissão
                $table->date('expiration'); // data de validade
                $table->tinyInteger('active')->default(0);
                $table->string('comment' , 2000 );;
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
        Schema::dropIfExists('cards');
    }
}
