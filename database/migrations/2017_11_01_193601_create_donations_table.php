<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();

            $table->integer('donor_id')->unsigned();
            $table->foreign('donor_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->integer('donee_id')->unsigned();
            $table->foreign('donee_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')
                ->references('id')->on('courses')
                ->onDelete('cascade');

            $table->decimal('gross_amount');
            $table->decimal('reduction_rate', 8, 4);
            $table->decimal('amount_reduced');
            $table->decimal('net_amount');

            $table->text('comment')->nullable();
            $table->boolean('private')->default(false);
            $table->boolean('active')->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
}
