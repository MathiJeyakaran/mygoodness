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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('bannerhead')->nullable();
            $table->longtext('bannerdesc')->nullable();
            $table->string('heading')->nullable();
            $table->longtext('desc1')->nullable();
            $table->longtext('desc2')->nullable();
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('abouts')->insert(
            array(
                'image' => 'aboutscreen.png',
                'bannerhead' => 'Welcome to mygoodness!',
                'bannerdesc' => 'You gave $5 to Everytown for Gun Safety. Start a chain reaction by asking 3 friends to give too.',
                'heading' => 'Let goodness grow.',
                'desc1' => "We all want to change the world...so let's do something about it. mygoodness helps generosity grow—one donation at a time. In three simple steps you'll inspire a chain reaction of donations to trusted charities that you and your community care about most.",
                'desc2' => "We all want to change the world...so let's do something about it. mygoodness helps generosity grow—one donation at a time. In three simple steps you'll inspire a chain reaction of donations to trusted charities that you and your community care about most."
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
        Schema::dropIfExists('abouts');
    }
};
