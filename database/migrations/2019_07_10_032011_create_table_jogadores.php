<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableJogadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogadores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_time')->unsigned();
            $table->foreign('id_time')
                ->references('id')
                ->on('times')
                ->onDelete('cascade');
            $table->string('nome',60);
            $table->float('altura');
            $table->float('peso');
            $table->enum('categoria', ['Sub-15', 'Sub-17', 'Sub-20', 'Profissional']);
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
        Schema::dropIfExists('jogadores');
    }
}
