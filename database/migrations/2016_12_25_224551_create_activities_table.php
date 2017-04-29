<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('activity_unique_id');
            $table->integer('project_id');
            $table->integer('modified_by');
            $table->string('assigned_to');
            $table->string('activity_title');
            $table->integer('priority_id');
            $table->boolean('status_id');
            $table->string('description');
            $table->dateTime('due_date');
            $table->integer('progress');
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
        Schema::drop('activities');
    }
}
