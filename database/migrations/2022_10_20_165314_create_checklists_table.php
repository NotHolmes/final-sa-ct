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
        Schema::create('checklists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('c_id')->nullable();
            $table->foreignIdFor(\App\Models\Maintenance::class, 'm_id')->unique(); // `m_id`
            $table->foreignIdFor(\App\Models\Status::class);// foreign key 'status_id'
            $table->unsignedBigInteger('c_status')->default(1);
            $table->dateTime('c_datetime')->nullable();
            $table->unsignedBigInteger('rewind')->default(0);
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
        Schema::dropIfExists('checklists');
    }
};
