<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultipleComputersTables extends Migration
{
    public function up()
    {
        // First table: p1adminBldg
        Schema::create('p1adminBldg', function (Blueprint $table) {
            $table->id();
            $table->string('department');
            $table->string('username');
            $table->string('computer_name');
            $table->string('model');
            $table->string('pc_grade');
            $table->string('processor');
            $table->string('ram');
            $table->string('storage');
            $table->string('ip_address');
            $table->string('os');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });

        // Second table: p1BldgA
        Schema::create('p1BldgA', function (Blueprint $table) {
            $table->id();
            $table->string('department');
            $table->string('username');
            $table->string('computer_name');
            $table->string('model');
            $table->string('pc_grade');
            $table->string('processor');
            $table->string('ram');
            $table->string('storage');
            $table->string('ip_address');
            $table->string('os');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });

        // Second table: p1prod
        Schema::create('p1prod', function (Blueprint $table) {
            $table->id();
            $table->string('department');
            $table->string('username');
            $table->string('computer_name');
            $table->string('model');
            $table->string('pc_grade');
            $table->string('processor');
            $table->string('ram');
            $table->string('storage');
            $table->string('ip_address');
            $table->string('os');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
                // Second table: p1whBldg
        Schema::create('p1whBldg', function (Blueprint $table) {
            $table->id();
            $table->string('department');
            $table->string('username');
            $table->string('computer_name');
            $table->string('model');
            $table->string('pc_grade');
            $table->string('processor');
            $table->string('ram');
            $table->string('storage');
            $table->string('ip_address');
            $table->string('os');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
                // Second table: p2
        Schema::create('p2', function (Blueprint $table) {
            $table->id();
            $table->string('department');
            $table->string('username');
            $table->string('computer_name');
            $table->string('model');
            $table->string('pc_grade');
            $table->string('processor');
            $table->string('ram');
            $table->string('storage');
            $table->string('ip_address');
            $table->string('os');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
                // Second table: p3
        Schema::create('p3', function (Blueprint $table) {
            $table->id();
            $table->string('department');
            $table->string('username');
            $table->string('computer_name');
            $table->string('model');
            $table->string('pc_grade');
            $table->string('processor');
            $table->string('ram');
            $table->string('storage');
            $table->string('ip_address');
            $table->string('os');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
                // Second table: p5
        Schema::create('p5', function (Blueprint $table) {
            $table->id();
            $table->string('department');
            $table->string('username');
            $table->string('computer_name');
            $table->string('model');
            $table->string('pc_grade');
            $table->string('processor');
            $table->string('ram');
            $table->string('storage');
            $table->string('ip_address');
            $table->string('os');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
                // Second table: p6
        Schema::create('p6', function (Blueprint $table) {
            $table->id();
            $table->string('department');
            $table->string('username');
            $table->string('computer_name');
            $table->string('model');
            $table->string('pc_grade');
            $table->string('processor');
            $table->string('ram');
            $table->string('storage');
            $table->string('ip_address');
            $table->string('os');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });

    }

    public function down()
    {
        // Drop the tables if rollback is done
        Schema::dropIfExists('p1adminBldg');
        Schema::dropIfExists('p1BldgA');
        Schema::dropIfExists('p1prod');
        Schema::dropIfExists('p1whBldg');
        Schema::dropIfExists('p2');
        Schema::dropIfExists('p3');
        Schema::dropIfExists('p5');
        Schema::dropIfExists('p6');
    }
}
