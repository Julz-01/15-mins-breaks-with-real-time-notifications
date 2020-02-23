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
        Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('email')->unique();
          $table->string('password');
          $table->string('department')->nullable();
          $table->string('team_leader')->nullable();
          $table->string('employee_type')->nullable();
          $table->string('number')->nullable();
          $table->string('personal_email')->nullable();
          $table->string('birthdate')->nullable();
          $table->string('birthplace')->nullable();
          $table->string('nationality')->nullable();
          $table->string('religion')->nullable();
          $table->string('tin')->nullable();
          $table->string('sss')->nullable();
          $table->string('philhealth')->nullable();
          $table->string('hdmf')->nullable();
          $table->string('mother_name')->nullable();
          $table->string('father_name')->nullable();
          $table->string('civil_status')->nullable();
          $table->string('training_date')->nullable();
          $table->string('employment_date')->nullable();
          $table->string('linkserve_email')->nullable();
          $table->string('linkserve_skype')->nullable();
          $table->string('img')->nullable();
          $table->rememberToken();
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
