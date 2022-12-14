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
        Schema::create('checklist_part', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cp_id')->nullable();
            $table->foreignIdFor(\App\Models\Checklist::class, 'c_id');
            $table->foreignIdFor(\App\Models\Part::class, 'p_id');
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
        Schema::dropIfExists('checklist_part');
    }
};
