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
            $table->string('post_code');
            $table->string('address');
            $table->string('tel');
            $table->string('email');
            $table->string('ceo_name')->nullable();
            $table->string('stuff_name')->nullable();
            $table->date('foundation')->nullable();
            $table->unsignedInteger('capital')->nullable();
            $table->unsignedTinyInteger('employee_number')->nullable();
            $table->text('note')->nullable();
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
