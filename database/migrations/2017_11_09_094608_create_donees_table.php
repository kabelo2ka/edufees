<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donees', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unique()->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->string('id_number', 20);
            $table->date('dob');
            $table->enum('gender', ['m','f']); // m  or f
            $table->string('phone_number', 20);
            $table->string('address');
            $table->string('city');
            $table->string('postal_code', 20);
            $table->integer('province'); // Model has Mappings ID => Value
            $table->string('id_filename')->nullable();
            $table->string('matric_results_filename', 100)->nullable();
            $table->string('about')->nullable();

            $table->boolean('active')->default(false);
            $table->boolean('verified')->default(false);

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
        Schema::dropIfExists('donees');
    }
}
