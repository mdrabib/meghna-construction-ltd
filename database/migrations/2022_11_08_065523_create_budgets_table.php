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
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('project_id')->nullable()->comment('name');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade')->change();
            
            $table->unsignedBigInteger('floor_id')->nullable()->comment('floor no');
            $table->foreign('floor_id')->references('id')->on('floor_details')->onDelete('cascade')->change();
            
            $table->unsignedBigInteger('foundation_id')->nullable();
            $table->foreign('foundation_id')->references('id')->on('foundations')->onDelete('cascade')->change();

            $table->integer('total_working_day');
            $table->integer('total_worker');
            $table->dateTime('issus_date');

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
        Schema::dropIfExists('budgets');
    }
};
