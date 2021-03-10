<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackerMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracker_movements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tracker_id');
            $table->double('latitude');
            $table->double('longitude');
            $table->double('altitude');
            $table->unsignedTinyInteger('battery')->nullable()->default(null);
            $table->double('bearing')->nullable()->default(null);
            $table->double('speed')->nullable()->default(null);
            $table->timestamp('generated_at');
            $table->timestamps();

            $table->foreign('tracker_id')
                ->references('id')
                ->on('trackers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tracker_movements');
    }
}
