<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDependentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('dependents', function (Blueprint $table) {
                $table->id();
                $table->string('code' , 10)->unique();
                $table->string('name' , 80 );
                $table->string('cpf' , 14)->nullable()->unique();
                $table->string('rg' , 20 )->nullable();
                $table->tinyInteger('active')->default(0);
                $table->date('birth');
                $table->foreignId('role_id')->default(6);
                $table->foreignId('associate_id')->default(0);
                $table->foreignId('kindship_id')->default(0);
                $table->string('comment' , 2000 );
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
        Schema::dropIfExists('dependents');
    }
}
