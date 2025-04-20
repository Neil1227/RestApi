<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->string('superl_philippines_inc'); // Superl Philippines Inc.
            $table->string('siglo_leatherware');      // Siglo Leatherware
            $table->string('angeles_alliance_leatherware'); // Angeles Alliance Leatherware
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('computers');
    }
};
