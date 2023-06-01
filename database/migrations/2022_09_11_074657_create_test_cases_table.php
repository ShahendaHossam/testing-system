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
        Schema::create('test_cases', function (Blueprint $table) {
            $table->id();
            $table->string('title',255)->nullable();
            $table->string('module_name',255)->nullable();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->string('description',255)->nullable();
            $table->unsignedBigInteger('dependency_id')->nullable();
            $table->unsignedBigInteger('priority_id')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->string('test_browser',255)->nullable();
            $table->string('pre_condition',255)->nullable();
            $table->string('post_condition',255)->nullable();
            $table->unsignedBigInteger('designer_id')->nullable();
            $table->string('designer_comment',255)->nullable();
            $table->unsignedBigInteger('reviewer_id')->nullable();
            $table->string('reviewer_comment',255)->nullable();
            $table->string('reviewed_at')->nullable();
            $table->unsignedBigInteger('executor_id')->nullable();
            $table->string('executor_comment',255)->nullable();
            $table->string('executed_at')->nullable();
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
        Schema::dropIfExists('test_cases');
    }
};
