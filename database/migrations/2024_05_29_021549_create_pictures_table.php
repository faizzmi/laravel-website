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
        Schema::create('pictures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->binary('picture');
            $table->string('name_pic');
            $table->string('descPic')->nullable();
            $table->boolean('pin')->default(false);
            $table->string('mime');
            $table->timestamps();

            $table->foreign('project_id')
                ->references('id')
                ->on('project')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pictures');
    }
};
