<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->string('identitynum')->unique()->index()->nullable();
            $table->string('lastname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('firstname')->nullable();
            $table->string('email')->unique()->index()->nullable();
            $table->string('phone')->unique()->index()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable()->default(bcrypt('megon'));
            $table->string('userimage')->default('defaultuserimage.jpg');
            $table->bigInteger('branch_id')->index()->unsigned()->nullable();
            $table->tinyInteger('isactive')->default('1');
            $table->tinyInteger('profileupdated')->default('0');
            $table->rememberToken();
            $table->datetime('login_at')->nullable();
            $table->datetime('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->timestamps();
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
