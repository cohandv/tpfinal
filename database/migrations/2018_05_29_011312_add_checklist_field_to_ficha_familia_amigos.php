<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChecklistFieldToFichaFamiliaAmigos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fichasFamiliaAmigos', function (Blueprint $table) {
            $table->integer('checklistContactos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fichasFamiliaAmigos', function (Blueprint $table) {
            //
        });
    }
}
