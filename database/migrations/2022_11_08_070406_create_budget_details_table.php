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
        Schema::create('budget_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->unsignedBigInteger('project_id')->nullable()->comment('building_name');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade')->change();

            $table->unsignedBigInteger('floor_details_id')->nullable()->comment('floor_no');
            $table->foreign('floor_details_id')->references('id')->on('floor_details')->onDelete('cascade')->change();

            $table->unsignedBigInteger('units_id')->nullable();
            $table->foreign('units_id')->references('id')->on('units')->onDelete('cascade')->change();

            $table->unsignedBigInteger('budget_id')->nullable();
            $table->foreign('budget_id')->references('id')->on('budgets')->onDelete('cascade')->change();

            $table->integer('budget_quantity');
            $table->decimal('market_price',12,2);
            $table->decimal('total_budget',12,2)->nullable();
            // $table->dateTime('issues_date');

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
        Schema::dropIfExists('floor_budget_details');
    }
};
