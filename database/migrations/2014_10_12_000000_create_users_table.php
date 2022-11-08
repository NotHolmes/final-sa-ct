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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // primary key 'id' int auto_increment
            $table->foreignIdFor(\App\Models\Resident::class, 'r_id')->nullable(); // `r_id`
            $table->string('name'); // varchar(255)
            $table->string('username')->unique(); // varchar(255)
            $table->string('password'); // varchar(60)
            $table->rememberToken(); // 'remember_token'
            $table->timestamps(); // DATETIME 'created_at' , 'updated_at'
        });
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
};
