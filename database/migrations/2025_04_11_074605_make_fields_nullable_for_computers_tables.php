<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeFieldsNullableForComputersTables extends Migration
{
    public function up()
    {
        $tables = ['p1adminBldg', 'p1BldgA', 'p1prod', 'p1whBldg', 'p2', 'p3', 'p5', 'p6'];

        foreach ($tables as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->string('department')->nullable()->change();
                $table->string('username')->nullable()->change();
                $table->string('computer_name')->nullable()->change();
                $table->string('model')->nullable()->change();
                $table->string('pc_grade')->nullable()->change();
                $table->string('processor')->nullable()->change();
                $table->string('ram')->nullable()->change();
                $table->string('storage')->nullable()->change();
                $table->string('ip_address')->nullable()->change();
                $table->string('os')->nullable()->change();
            });
        }
    }

    public function down()
    {
        // Optional: you could revert them back to NOT NULL if needed.
    }
}
