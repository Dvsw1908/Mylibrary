<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBorrowersTable extends Migration
{
    public function up()
    {
        Schema::table('borrowers', function (Blueprint $table) {
            // Hapus UUID primary key
            $table->dropColumn('id');
        });

        Schema::table('borrowers', function (Blueprint $table) {
            // Tambahkan auto-increment integer sebagai primary key
            $table->increments('id');
        });
    }

    public function down()
    {
        Schema::table('borrowers', function (Blueprint $table) {
            // Hapus auto-increment integer
            $table->dropColumn('id');
        });

        Schema::table('borrowers', function (Blueprint $table) {
            // Tambahkan UUID primary key kembali
            $table->uuid('id')->primary();
        });
    }
}
