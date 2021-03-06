<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            
            $table->increments('id');

            //Unsigned means the integer must be positive
            $table->integer('user_id')->unsigned();
            
            $table->string('title');
            
            $table->text('body');
            
            $table->timestamp('published_at');
            
            $table->timestamps();

            //Using a constraint where if a user deletes an account.. the articles will delete articles as well
            $table->foreign('user_id')
                
                ->references('id')
                
                ->on('users')
                
                ->onDelete('cascade');
        
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
