<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->integer('total_days')->nullable();
            $table->integer('worked_days')->nullable();
            $table->bigInteger('pf_uan_number')->nullable();
            $table->bigInteger('account_number')->nullable();
            $table->integer('gross_salary')->nullable();
            $table->integer('basic_salary')->nullable();
            $table->integer('hra')->nullable();
            $table->integer('fix_conveyance')->nullable();
            $table->integer('medical_alloawnce')->nullable();
            $table->integer('internet_alloawnce')->nullable();
            $table->integer('telephone')->nullable();
            $table->integer('professional_development')->nullable();
            $table->integer('special_allowance')->nullable();
            $table->integer('employee_pf')->nullable();
            $table->integer('employer_pf')->nullable();
            $table->integer('tds')->nullable();
            $table->integer('professional_tax')->nullable();
            $table->integer('other')->nullable();
            $table->integer('total_deduction')->nullable();
            $table->integer('take_home_pay')->nullable();
            $table->timestamps();
        });

        Schema::table('payrolls', function($table) {
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('payrolls');
    }

}
