<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_information', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('contract_information');
            $table->string('employee_name');
            $table->string('designation');
            $table->decimal('contract_amount',12,2);
            $table->decimal('total_cost',12,2);
            $table->string('document');
            $table->dateTime('contact_date');
            $table->dateTime('submit_date')->nullable();

            $table->integer('status')->default(1);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade')->change();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade')->change();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_information');
    }
};
