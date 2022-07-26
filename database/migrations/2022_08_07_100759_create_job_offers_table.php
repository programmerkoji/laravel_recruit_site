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
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('job_category_id')
            ->constrained();
            $table->foreignId('job_area_id')
            ->constrained();
            $table->date('posting_start');
            $table->date('posting_end');
            $table->string('title');
            $table->string('employment_status');
            $table->string('salary');
            $table->string('job_time');
            $table->text('job_content');
            $table->string('welfare');
            $table->string('holiday');
            $table->string('qualification')->nullable();
            $table->tinyInteger('recruitment_count')->nullable();
            $table->text('free_text')->nullable();
            $table->boolean('is_publish')->default(true);
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
