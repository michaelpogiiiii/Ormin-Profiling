<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBansudAddOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bansud_add_organizations', function (Blueprint $table) {
            $table->id();
            $table->string('urn')->nullable();
            $table->string('organization_name')->nullable();
            $table->text('complete_address')->nullable();
            $table->string('telephone_number')->nullable();
            $table->string('cellphone_number')->nullable();
            $table->integer('number_members')->nullable();
            $table->date('date_establish')->nullable();
            $table->date('date_approved')->nullable();
            $table->string('major_classification')->nullable();
            $table->string('sub_classification')->nullable();
            $table->string('pydp_center')->nullable();
            $table->string('email_add')->unique()->nullable();
            $table->text('brief_description')->nullable();
            $table->string('head_name')->nullable();
            $table->string('adviser_name')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email_address')->nullable();
            $table->string('registration_file')->nullable();
            $table->string('list_of_members_file')->nullable();
            $table->string('directory_file')->nullable();
            $table->string('constitution_file')->nullable();
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
        Schema::dropIfExists('bansud_add_organizations');
    }
}
