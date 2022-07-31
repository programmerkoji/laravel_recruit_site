<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')
            ->constrained();
            $table->string('title');
            $table->tinyInteger('employment_status');
            $table->string('salary');
            $table->time('opening_time');
            $table->time('closing_time');
            $table->string('welfare');
            $table->text('job_content');
            $table->string('holiday');
            $table->string('qualification')->nullable();
            $table->tinyInteger('recruitment_count');
            $table->boolean('is_publish');
            $table->text('free_text')->nullable();
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
        Schema::dropIfExists('job_offers');
    }
}
