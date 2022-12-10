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
        Schema::create('designs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('designer_id')->nullable()->comment('Designer id');
            $table->foreign('designer_id')->references('id')->on('users')->onDelete('cascade')->change();
            

            $table->unsignedBigInteger('project_id')->nullable()->comment('Project id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade')->change();

            $table->string('document');
            $table->integer('building_squire_feet')->nullable();
            $table->integer('total_floor_number')->nullable();
            $table->string('design_details')->nullable();

            //default
            $table->integer('status')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
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
        Schema::dropIfExists('designs');
    }
};
