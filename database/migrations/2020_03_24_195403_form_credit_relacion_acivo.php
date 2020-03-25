<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FormCreditRelacionAcivo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('form_credit_relacion_activo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_form');
            $table->enum('type_apartamento', ["Local", "Casa", "Lote", "Finca"]);
            $table->string('address_bien');
            $table->string('barrio');
            $table->string('city');
            $table->string('valor_comercail');
            $table->string('hipoteca');
            $table->enum('afectacion_familiar', ["Si", "No"]);
            $table->enum('type_vehicule', ["Particular", "Publico", "Moto"]);

            $table->string('placa');
            $table->string('transito');
            $table->string('marca');
            $table->string('modelo');
            $table->string('valor_comercial');
            $table->string('prenda_valor');
            $table->string('otro_activos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_credit_relacion_activo');
    }
}
