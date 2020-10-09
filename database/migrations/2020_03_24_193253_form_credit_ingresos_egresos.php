<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FormCreditIngresosEgresos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_credit_ingresos_egresos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('salary_basic');
            $table->string('comisiones');
            $table->string('arrendamientos');
            $table->string('otros');
            $table->string('cuales');
            $table->string('total_ingresos');

            $table->string('prestamos_vivienda');
            $table->string('prestamo_vehiculo_otros');
            $table->string('credit_card');
            $table->string('arriendo');
            $table->string('gastos_familiaros_otros');
            $table->string('total_egresos');

            $table->string('valor_cotizado');
            $table->string('numero_cuotas');
            $table->string('valor_financiar');
            $table->string('fecha_cirugia');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_credit_ingresos_egresos');
    }
}
