<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('question_code')->comment('specify a questiontype');
            $table->string('set')->nullable();
            $table->text('question');
            $table->tinyInteger('status')->comment('active:1,deactive:2')->default(1);
            $table->text('description')->nullable();
            $table->string('type')->comment('multiple_and,short_ans,long_ans');
            $table->text('option_array')->nullabe();
            $table->integer('required')->comment('1:is_required,0:not_required')->default(0);
            $table->dateTime('time');
            $table->text('correct_ans')->nullable();
            $table->integer('max_length_ans')->nullable();
            $table->dateTime('starting_time')->nullable();
            $table->double('marks')->nullable();
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
        Schema::dropIfExists('questions');
    }
}
