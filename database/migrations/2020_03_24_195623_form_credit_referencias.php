<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FormCreditReferencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_credit_referencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_form');
            $table->string('name_last_name1');
            $table->string('parentezco1');
            $table->string('phone_recidencia1');
            $table->string('phone_oficcina1');
            $table->string('celular1');

            $table->string('name_last_name2');
            $table->string('parentezco2');
            $table->string('phone_recidencia2');
            $table->string('phone_oficcina2');
            $table->string('celular2');

            $table->string('refer_2_name_last_name1');
            $table->string('refer_2_parentezco1');
            $table->string('refer_2_phone_recidencia1');
            $table->string('refer_2_phone_oficcina1');
            $table->string('refer_2_celular1');


            $table->string('refer_2_name_last_name2');
            $table->string('refer_2_parentezco2');
            $table->string('refer_2_phone_recidencia2');
            $table->string('refer_2_phone_oficcina2');
            $table->string('refer_2_celular2');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_credit_referencias');
    }
}
