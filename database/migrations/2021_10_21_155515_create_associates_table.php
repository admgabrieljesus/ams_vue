<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssociatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('associates', function (Blueprint $table) {
                $table->id();
                $table->string('code' , 5 )->unique();
                $table->string('name' , 80 );
                $table->string('cpf' , 14);
                $table->string('rg' , 20 )->nullable();;
                $table->date('birth');
                $table->foreignId('level_id')->default(1);
                $table->string('comment' , 2000 )->nullable();;;
                $table->tinyInteger('active')->default(0);
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
        Schema::dropIfExists('persons');
    }
}
