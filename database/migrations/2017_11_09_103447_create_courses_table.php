<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique()->nullable();

            $table->integer('donee_id')->unsigned();
            $table->foreign('donee_id')
                ->references('id')->on('donees')
                ->onDelete('cascade');


            $table->string('name');
            $table->decimal('fee');
            $table->string('institution_name');
            $table->string('campus');
            $table->string('qualification'); // BA, BCOM, etc
            $table->integer('study_level'); // Year of study
            $table->integer('current_study_level')->default(0); // Current year of study
            $table->date('start_date');
            $table->date('end_date');

            $table->longText('goals'); // Career and Educational Goals

            $table->string('donation_status', 20)->default(\App\Course::DONATION_STATUS_IN_PROGRESS);
            $table->boolean('active')->default(false);
            $table->boolean('approved')->default(false);

            $table->softDeletes();
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
        Schema::dropIfExists('courses');
    }
}
