<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('cpf', 14)->nullable()->unique();
            $table->string('cnpj', 18)->nullable()->unique();
            $table->enum('type_document', ['CREMEB', 'CROBA', 'CREFITO'])->nullable();
            $table->string('number_document', 14)->nullable();
            $table->string('fantasy', 100)->nullable();
            $table->enum('type', ['DOCTORS', 'COMPANIES', 'LABORATORIES', 'RADIOLOGIES'])->nullable();
            $table->string('website', 80)->nullable();
            $table->string('comment', 1000)->nullable();
            $table->date('admission')->nullable();
            $table->tinyInteger('active')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('responsibles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partner_id');
            $table->string('name', 100);
            $table->string('cpf', 14)->nullable();
            $table->enum('type_document', ['CREMEB', 'CROBA', 'CREFITO'])->nullable();
            $table->string('number_document', 14)->nullable();
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
        Schema::dropIfExists('doctors');
    }
}
