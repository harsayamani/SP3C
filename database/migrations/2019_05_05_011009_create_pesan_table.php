<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesan', function (Blueprint $table) {
            $table->increments('id');
     
            // contact information
            $table->integer('contact_id');
            $table->string('contact_number', 30);
            $table->string('contact_name', 100);
     
            // message information
            $table->string('device_id', 30);
            $table->text('message');
            $table->enum('type', ['inbox', 'outbox', 'draft'])->default('outbox');
            $table->dateTime('expired_at');
            $table->timestamps();
     
            $table->index(['contact_name', 'contact_number']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesan');
    }
}
