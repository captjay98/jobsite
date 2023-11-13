<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('seekers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('phone')->unique()->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('dateofbirth')->date()->nullable();
            $table->string('ethnicity')->nullable();
            $table->string('cv')->nullable();
            $table->string('passport')->nullable();
            $table->string('visa')->nullable();
            // $table->foreignId('qualifications')->nullable();
            //   $table->foreign('user_id')
            //    ->references('id')
            //    ->on('users')
            //    ->onDelete('cascade');

            // $table->foreign('seeker_id')->references('id')->on('seekers')->onDelete('cascade');
            $table->string('skills')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seekers');
    }
};
