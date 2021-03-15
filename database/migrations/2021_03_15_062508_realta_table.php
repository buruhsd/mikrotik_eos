<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RealtaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realtas', function (Blueprint $table) {
            $table->id();
            $table->string('key')->nullable();
            $table->string('mode')->nullable();
            $table->string('room')->nullable();
            $table->string('rsvno')->nullable();
            $table->string('fnm')->nullable();
            $table->string('lnm')->nullable();
            $table->string('ci')->nullable();
            $table->string('co')->nullable();
            $table->string('citm')->nullable();
            $table->string('cotm')->nullable();
            $table->string('coid')->nullable();
            $table->string('gsph')->nullable();
            $table->string('rate')->nullable();
            $table->string('vip')->nullable();
            $table->string('lnm1')->nullable();
            $table->string('fnm1')->nullable();
            $table->string('profid1')->nullable();
            $table->string('lnm2')->nullable();
            $table->string('fnm2')->nullable();
            $table->string('profid2')->nullable();
            $table->string('lnm3')->nullable();
            $table->string('fnm3')->nullable();
            $table->string('profid3')->nullable();
            
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
        Schema::dropIfExists('realtas');
    }
}
