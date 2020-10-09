<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FormCreditDatosGenerales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_credit_datos_generales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('second_name');
            $table->string('first_last_name');
            $table->string('second_last_name');
            $table->enum('type_document', ["C.C", "C.E"]);
            $table->string('number_document');
            $table->string('location_expedition_document');
            $table->date('date_expedition_document');
            $table->date('birthdate');
            $table->string('birthplace');
            $table->enum('sexo', ["M", "F"]);
            $table->enum('state_civil', ["Casado(a)", "Soltero(a)", "Viudo(a)", "Union Libre", "Divorciado(a)"]);
            $table->enum('level_education', ["Primaria", "Bachillerato", "Tecnologia", "Post-Grado", "Universitario"]);
            $table->string('profession');
            $table->string('number_person_in_charge');
            $table->string('number_children');
            $table->enum('housing_type', ["Propia", "Familiar", "Arrebdada"]);
            $table->string('name_lessor');
            $table->string('phone_lessor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_credit_datos_generales');
    }
}
