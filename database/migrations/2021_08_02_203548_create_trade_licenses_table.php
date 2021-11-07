<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradeLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_licenses', function (Blueprint $table) {
            $table->id();
            $table->string('owner_type');
            $table->string('business_type_id');
            $table->string('fee');
            $table->string('vat');
            $table->string('signboard_tax');
            $table->string('business_tax');
            $table->string('others');
            $table->string('online_charge');
            $table->string('total');
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
        Schema::dropIfExists('trade_licenses');
    }
}
