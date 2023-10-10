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
        Schema::create('applications', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer("seeker_id");
            $table->integer('job_id');
            $table->foreign('seeker_id')
                ->references('id')
                ->on('seekers');
            $table->foreign('job_id')
                ->references('id')
                ->on('jobs');
            $table->string('status')->enum(
                'applied',
                'interviewed',
                'declined',
                'hired'
            )->default('applied');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
