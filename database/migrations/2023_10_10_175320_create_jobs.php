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
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('employer_id')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('industry')->nullable();
            $table->string('salary')->nullable();
            $table->string('city')->nullable();
            // $table->string('skills');
            $table->foreign('employer_id')
                    ->references("id")
                    ->on('employers')->nullable();
            $table->timestamps();




        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
