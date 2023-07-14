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
        Schema::create('newsreports', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable()->unique();
            $table->datetime('date_inform');
            $table->string('base_id', 30);
            $table->string('lot_id', 3);
            $table->string('split_id', 3);
            $table->string('sub_id', 3);
            // $table->integer('sequence_no');
            // $table->string('resource_id', 15);
            $table->string('part_id', 30);
            $table->string('mfg_name', 30);
            $table->string('product_code', 15);
            $table->boolean('base_id_ok');
            $table->boolean('base_id_nc');
            $table->text('motivo_nc', 200);
            $table->string('turno', 30);
            $table->string('estado', 30);
            $table->integer('sort');
            $table->text('observacion', 150);
            $table->timestamps();

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newsreports');
    }
};
