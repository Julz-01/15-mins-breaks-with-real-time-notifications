<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminlogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('admin_id');
          $table->string('admin_name');
          $table->string('date')->nullable();
           $table->string('time_in');
           $table->string('time_out')->nullable();
           $table->string('time_total')->nullable();
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
        Schema::dropIfExists('adminlogs');
    }
}
