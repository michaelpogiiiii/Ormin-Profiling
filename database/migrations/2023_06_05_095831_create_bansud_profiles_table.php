<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bansud_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->string('suffix')->nullable();
            $table->string('region')->nullable();
            $table->string('province')->nullable();
            $table->string('municipality')->nullable();
            $table->string('barangay')->nullable();
            $table->string('purok')->nullable();
            $table->string('sex')->nullable();
            $table->string('age')->nullable();
            $table->string('bday')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('status')->nullable();
            $table->string('youthclass')->nullable();
            $table->string('workstat')->nullable();
            $table->string('educback')->nullable();
            $table->string('skvoter')->nullable();
            $table->string('skvoterlast')->nullable();
            $table->string('nationalvoter')->nullable();
            $table->string('assembly')->nullable();
            $table->string('assembly_attend')->nullable();
            $table->string('assembly_noattend')->nullable();
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
        Schema::dropIfExists('bansud_profiles');
    }
};
