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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',40);
            $table->string('email',40)->unique();
            $table->string('phone',15)->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->char('password');
            $table->unsignedBigInteger('role_id');

            $table->unsignedBigInteger('designation_id')->nullable();
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('cascade')->change();

            $table->string('avatar')->nullable();
            $table->string('language')->default('en');
            $table->integer('status')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        // DB::table('users')->insert([
        //     [
        //         'name'=> 'admin',
        //         'email'=> 'admin@admin.com',
        //         'password'=> Crypt::encryptString('admin12345678'.env('APP_SECRET','secrat')),
        //         'role_id'=> 1,
        //     ]
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
