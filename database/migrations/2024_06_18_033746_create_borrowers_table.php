<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowersTable extends Migration
{
    public function up()
    {
        Schema::create('borrowers', function (Blueprint $table) {
            $table->id();
            $table->string('borrower_id')->unique();
            $table->string('name');
            $table->string('phone_number');
            $table->enum('grade', ['pre-elementary school', 'elementary school', 'junior highschool', 'senior highschool']);
            $table->enum('status', ['meminjam', 'tidak meminjam']);
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('borrowers');
    }
}