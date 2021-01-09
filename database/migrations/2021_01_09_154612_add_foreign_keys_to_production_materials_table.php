<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProductionMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('production_materials', function (Blueprint $table) {
            $table->foreign('material_id', 'production_materials_ibfk_1')->references('id')->on('materials')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('production_id', 'production_materials_ibfk_2')->references('id')->on('productions')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('production_materials', function (Blueprint $table) {
            $table->dropForeign('production_materials_ibfk_1');
            $table->dropForeign('production_materials_ibfk_2');
        });
    }
}
