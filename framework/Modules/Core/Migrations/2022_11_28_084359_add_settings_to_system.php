<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSettingsToSystem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('value');
            $table->string('code');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('setting_history', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('value');
            $table->string('code');
            $table->text('description');
            $table->timestamps();
            $table->foreignId('setting_id')
                  ->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('setting_history', function (Blueprint $table) {
            $table->dropForeign(['setting_id']);
        });
        Schema::dropIfExists('setting_history');
        Schema::dropIfExists('settings');
    }
}
