<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) { 
            $table->integer('ci')->unique();
            $table->string('nombre',255); 
            $table->string('email',255)->unique();
            $table->string('telefono',8);
            $table->string('genero',1); 
            $table->string('password',255); 
        });

        DB::table('users')->insert(array('ci' => '753159','nombre'=>'stephani','email'=>'stephani.hc@gmail.com','telefono'=>'75647167','genero'=>'1','password' => '$2y$10$x4rfS1iYXv65UxifZKuqHu38X/h5/2uYYZfQg833IIp1IfIxjJwZS'));
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
