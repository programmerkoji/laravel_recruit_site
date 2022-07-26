<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('post_code', 12);
            $table->string('address');
            $table->string('tel', 16);
            $table->string('email');
            $table->date('foundation');
            $table->string('ceo_name');
            $table->string('stuff_name');
            $table->unsignedInteger('capital');
            $table->unsignedTinyInteger('employee_number');
            $table->boolean('is_publish');
            $table->text('note');
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
        Schema::dropIfExists('companies');
    }
}
