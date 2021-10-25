<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersinfoToUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('users', function (Blueprint $table) {
      $table->string('mobile')->nullable()->after('name');
      $table->string('address')->nullable()->after('mobile');
      $table->string('gender')->nullable()->after('address');
      $table->string('images')->nullable()->after('gender');
      $table->string('status')->nullable()->after('provider_id');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('users', function (Blueprint $table) {
      //
    });
  }
}
