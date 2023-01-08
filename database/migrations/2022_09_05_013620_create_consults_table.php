<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consults', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->foreignId('client_id')->constrained();
            $table->string("modalidad")->nullable();
            $table->string("numeroConsulta");
            $table->string("tipo_pago")->nullable();
            $table->string("voucher")->nullable();
            $table->boolean("pagado")->nullable();
            $table->string("precio")->nullable();
            $table->string("origen")->nullable();
            $table->boolean("consultado")->nullable();
            $table->string("id_transaccion")->nullable();
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
        Schema::dropIfExists('consults');
    }
}
