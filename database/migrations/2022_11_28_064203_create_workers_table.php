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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('nid_birth_Cirtificate');
            $table->date('dob');
            $table->string('attachment')->nullable();
            $table->integer('total_working_day')->nullable()->unsigned();
            $table->time('total_working_hour')->nullable();
            $table->decimal('total_sallary',12,2)->nullable()->unsigned();


            
            //   present address
            $table->string('present_address')->nullable();

            $table->unsignedBigInteger('present_country_id')->nullable();
            $table->foreign('present_country_id')->references('id')->on('countries')->onDelete('cascade')->change()->nullable();

            $table->unsignedBigInteger('present_division_id')->nullable();
            $table->foreign('present_division_id')->references('id')->on('divisions')->onDelete('cascade')->change()->nullable();

            $table->unsignedBigInteger('present_district_id')->nullable();
            $table->foreign('present_district_id')->references('id')->on('districts')->onDelete('cascade')->change()->nullable();

            $table->string('permanent_address')->nullable();

            $table->unsignedBigInteger('permanent_country_id')->nullable();
            $table->foreign('permanent_country_id')->references('id')->on('countries')->onDelete('cascade')->change()->nullable();

            $table->unsignedBigInteger('permanent_division_id')->nullable();
            $table->foreign('permanent_division_id')->references('id')->on('divisions')->onDelete('cascade')->change()->nullable();

            $table->unsignedBigInteger('permanent_district_id')->nullable();
            $table->foreign('permanent_district_id')->references('id')->on('districts')->onDelete('cascade')->change()->nullable();
            
             //default
             $table->integer('status')->default(1);
             $table->unsignedBigInteger('created_by');
             $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade')->change();
             $table->unsignedBigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('workers');
    }
};
