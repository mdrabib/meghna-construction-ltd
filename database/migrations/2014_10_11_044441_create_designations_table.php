<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('designation');
            $table->string('identify');
            $table->decimal('basic_sallary',12,2);
            $table->integer('yearly_bonus')->unsigned();
            $table->decimal('percentage_of_bonus',3,2)->comment('%');
             // default
             $table->integer('status')->default(1);
             $table->unsignedBigInteger('updated_by')->nullable();
             $table->softDeletes();
        });

        DB::table('designations')->insert([
            [
                'designation'=>'Architecture',
                'indentify'=>'architecture',
                'basic_sallary'=>30000,
                'yearly_bonus'=>2,
                'percentage_of_bonus'=>0.5,
                'status'=>1,
                'created_at'=>Carbon::now(),
            ],
            [
                'designation'=>'Civil Engineer',
                'indentify'=>'civilengineer',
                'basic_sallary'=>30000,
                'yearly_bonus'=>2,
                'percentage_of_bonus'=>0.5,
                'status'=>1,                
                'created_at'=>Carbon::now(),
            ],
            [
                'designation'=>'Project Manager',                
                'indentify'=>'projectmanager',
                'basic_sallary'=>30000,
                'yearly_bonus'=>2,
                'percentage_of_bonus'=>0.5,
                'status'=>1,
                'created_at'=>Carbon::now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('designatins');
    }
};
