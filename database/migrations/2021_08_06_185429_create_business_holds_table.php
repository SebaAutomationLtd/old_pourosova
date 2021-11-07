<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessHoldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_holds', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('ward_id');
            $table->string('road_moholla');
            $table->string('institute_name');
            $table->string('business_type');
            $table->string('owner_name');
            $table->string('father_name')->nullable();
            $table->string('husband_name')->nullable();
            $table->string('mother_name');
            $table->text('institute_address');
            $table->text('owner_current_address');
            $table->text('owner_permanent_address');
            $table->string('nid')->nullable();
            $table->string('birth_certificate')->nullable();
            $table->string('mobile');
            $table->string('image')->nullable();
            $table->string('last_license_issue_year');
            $table->string('trade_fee');
            $table->string('vat');
            $table->string('singnboard_tax');
            $table->string('business_tax');
            $table->string('other');
            $table->string('trade_total');
            $table->string('service_charge_id');
            $table->string('payment_type');
            $table->string('status')->default('0');
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
        Schema::dropIfExists('business_holds');
    }
}
