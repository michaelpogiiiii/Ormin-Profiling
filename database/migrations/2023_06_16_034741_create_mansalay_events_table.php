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
        Schema::create('mansalay_events', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('municipality')->nullable();
            $table->string('about', 3000)->nullable();
            $table->string('location')->nullable();
            $table->string('photo')->nullable();
            $table->string('date')->nullable();
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
        Schema::dropIfExists('mansalay_events');
    }
};
