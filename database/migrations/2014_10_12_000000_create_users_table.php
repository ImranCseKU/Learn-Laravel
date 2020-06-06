<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // if ( !Schema::hasTable('users')) {
        //     Schema::create('users', function (Blueprint $table) {
        //         $table->bigIncrements('id');
        //         $table->string('name');
        //         $table->string('email')->unique();
        //         $table->string('password');
        //         $table->timestamp('email_verified_at')->nullable();
        //         $table->tinyInteger('email_verified')->default(0);
        //         $table->string('email_verification_token');
        //         $table->rememberToken();
        //         $table->timestamps();
        //         $table->softDeletes();
        //     });
        // }
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('email_verified')->default(0);
            $table->string('email_verification_token');
            $table->rememberToken();
            $table->timestamps();
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
        Schema::dropIfExists('users');
    }
}
