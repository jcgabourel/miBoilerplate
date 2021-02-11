<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
           
            $table->bigIncrements('id');
            $table->smallInteger('Endpoint')->default(1);
            $table->string('title');
            $table->string('icon')->nullable();
            $table->string('href');
            
            $table->unsignedBigInteger('menu_id')->default(0);
           // $table->foreign('menu_id')->references('id')->on('menus');

            $table->smallInteger('level')->default(1);
            $table->boolean('editable')->default(true);            
            $table->smallInteger('orden');

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
        Schema::dropIfExists('menus');
    }
}
