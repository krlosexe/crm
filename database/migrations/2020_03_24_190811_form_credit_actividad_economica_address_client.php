<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FormCreditActividadEconomicaAddressClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_credit_actividad_economica_address_client', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('adress_client');
            $table->string('city_client');
            $table->string('phone_client');
            $table->string('mobil_client');
            $table->string('email_client');
            $table->enum('mailing', ["Recidencia", "E-Mail", "Trabajo", "Otra"]);
            $table->string('number_document_spouse');
            $table->string('address_mailing');
            $table->string('city_mailing');
            $table->string('phone_mailing');
            $table->enum('type_activity_client', ["Empleado", "Ama de Casa", "Empresario(a)", "Estudiante", "Pensionado", "Rentista de Capital", "Trabajador(a)", "Administrador(a)", "Independiente", "Otra"]);
            $table->string('oter_activity_client');
            $table->string('name_company_client');
            $table->string('addres_worck_client');
            $table->string('city_worck_clirnt');

            $table->string('phone_worck_client');
            $table->string('ext_phone_worck_client');
            $table->string('fax_phone_worck_client');
            $table->string('dependency_area');
            $table->string('charge_company');

            $table->enum('type_contrato', ["Empleado", "Independiente", "Ama de Casa", "Termino Fijo", "Obra o labor", "Por Servicios"]);
            $table->date('date_vinculacion');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_credit_actividad_economica_address_client');
    }
}
