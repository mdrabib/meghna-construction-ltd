<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->string('stage')->unique()->index();
            $table->string('identify')->index();
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('stages')->insert([
            [
                'stage'=>'Pending',
                'identify'=>'pending',
                'created_at'=>Carbon::now(),
            ],
            [
                'stage'=>'Ongoing',
                'identify'=>'ongoing',
                'created_at'=>Carbon::now(),
            ],
            [
                'stage'=>'Finished',
                'identify'=>'finished',
                'created_at'=>Carbon::now(),
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stages');
    }
};
