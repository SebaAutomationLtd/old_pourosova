<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_id');
            $table->string('father_name')->nullable();
            $table->string('husband_name')->nullable();
            $table->string('mother_name');
            $table->string('gender');
            $table->string('martial_status');
            $table->string('day');
            $table->string('month');
            $table->string('year');
            $table->string('nid')->nullable();
            $table->string('birth_certificate')->nullable();
            $table->string('mobile');
            $table->string('religion_id');
            $table->string('ward_id');
            $table->string('village_id');
            $table->string('holding_no');
            $table->string('post_code_id');
            $table->string('post_office_id');
            $table->string('type_house');
            $table->string('number_room');
            $table->string('monthly_income');
            $table->string('house_year_value');
            $table->string('yearly_vat');
            $table->string('occupation_id');
            $table->string('last_tax_year');
            $table->string('service_charge');
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
        Schema::dropIfExists('general_members');
    }
}
