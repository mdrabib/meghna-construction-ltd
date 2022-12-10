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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role')->unique()->index();
            $table->string('identify')->index();
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('roles')->insert([
            [
                'role'=>'Admin',
                'identify'=>'admin',
                'created_at'=>Carbon::now(),
            ],
            [
                'role'=>'Moderator',
                'identify'=>'moderator',
                'created_at'=>Carbon::now(),
            ],
            [
                'role'=>'Employee',
                'identify'=>'employee',
                'created_at'=>Carbon::now(),
            ],
            [
                'role'=>'LandOwner',
                'identify'=>'landowner',
                'created_at'=>Carbon::now(),
            ],
            [
                'role'=>'Client',
                'identify'=>'client',
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
        Schema::dropIfExists('roles');
    }
};
