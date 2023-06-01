<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_case_steps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_case_id')->nullable();
            $table->string('title',255)->nullable();
            $table->string('description',255)->nullable();
            $table->string('expected_result',255)->nullable();
            $table->string('actual_result',255)->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->string('designer_comment',255)->nullable();
            $table->string('reviewer_comment',255)->nullable();
            $table->string('executor_comment',255)->nullable();
            $table->timestamps();
            $table->softDeletesTz('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_case_steps');
    }
};
