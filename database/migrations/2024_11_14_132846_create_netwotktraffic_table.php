<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNetwotktrafficTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('network_traffic', function (Blueprint $table) {
            $table->id();
            $table->foreignId('network_id')->constrained()->onDelete('cascade');
            $table->string('mac_origin');
            $table->string('mac_destination');
            $table->string('protocol_version');
            $table->string('ip_origin');
            $table->string('ip_destination');
            $table->string('protocol');
            $table->string('payload');
            $table->string('ttl');
            $table->string('origin_port');
            $table->string('destination_port');
            $table->string('flag');
            $table->string('application_protocol');
            $table->boolean('is_danger')->default(false);
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
        Schema::dropIfExists('network_traffic');
    }
}
