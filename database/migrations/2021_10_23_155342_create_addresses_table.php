<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('zipcode', 12);
            $table->string('state', 100);
            $table->string('city', 100);
            $table->string('district', 100);
            $table->string('address', 100);
            $table->string('complement', 100)->nullable();
            $table->string('number', 12)->nullable();
            $table->unsignedBigInteger('addressable_id');
            $table->string('addressable_type', 100);
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
        Schema::dropIfExists('addresses');
    }
}
