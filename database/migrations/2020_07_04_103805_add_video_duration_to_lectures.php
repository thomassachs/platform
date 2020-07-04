<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVideoDurationToLectures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::table('lectures', function (Blueprint $table) {
             $table->time('video_duration',0);
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::table('lectures', function (Blueprint $table) {
              $table->dropColumn('video_duration');
         });
     }
}
