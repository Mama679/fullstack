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
       Schema::table('alumnos',function(Blueprint $table){
            $table->string('nombres',80)->unique()->change();
            $table->after('nombres',function($table){
                $table->foreignId('nivel_id')
                ->constrained('niveles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            });
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign('alumnos_nivel_id_foreign');
    }
};
