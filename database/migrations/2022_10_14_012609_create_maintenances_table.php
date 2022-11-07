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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class); // `user_id`
            $table->foreignIdFor(\App\Models\Resident::class); // `resident_id`
            $table->foreignIdFor(\App\Models\Checklist::class)->nullable()->unique(); // checklist_id
            $table->string('m_image')->nullable();
            $table->text('m_detail');
            $table->boolean('is_accepted')->default(false);
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
        Schema::dropIfExists('maintenances');
    }
};
