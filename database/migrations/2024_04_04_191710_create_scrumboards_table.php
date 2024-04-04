<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scrumboards', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reporter_id');
            $table->bigInteger('assignee_id');
            $table->bigInteger('list_id');
            $table->integer('progress')->default(0);
            $table->longText('content')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scrumboards');
    }
};
