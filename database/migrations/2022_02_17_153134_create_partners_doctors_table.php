<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersDoctorsTable extends Migration

{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partner_id');
            $table->string('name', 100);
            $table->string('cpf', 14)->nullable();
            $table->enum('type_document', ['CREMEB', 'CROBA', 'CREFITO'])->nullable();
            $table->string('number_document', 14)->nullable();
            $table->tinyInteger('active')->default(0);
            $table->unique(["partner_id", "cpf"], 'partner_doctor_unique');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('doctor_speciality', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('speciality_id');
            $table->tinyInteger('active')->default(0);
            $table->unique(["doctor_id", "speciality_id"], 'doctor_speciality_unique');
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
        //Schema::dropUnique('partner_doctor_unique');
        //Schema::dropUnique('doctor_speciality_unique');
        Schema::dropIfExists('doctor');
        Schema::dropIfExists('doctor_speciality');
    }
}
