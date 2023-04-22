<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersSpecialitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('partner_speciality', function (Blueprint $table) {
                $table->id();
                $table->foreignId('partner_id');
                $table->foreignId('speciality_id');
                $table->tinyInteger('active')->default(1);
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
        Schema::dropIfExists('partner_speciality');
    }
}
