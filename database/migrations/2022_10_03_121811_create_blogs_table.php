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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('heading')->nullable();
            $table->longtext('description')->nullable();
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('blogs')->insert(
            array(
                'image' => 'aboutscreen.png',
                'heading' => 'Let goodness grow',                
                'description' => "We all want to change the world...so let's do something about it. mygoodness helps generosity grow—one donation at a time. In three simple steps you'll inspire a chain reaction of donations to trusted charities that you and your community care about most."
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};
