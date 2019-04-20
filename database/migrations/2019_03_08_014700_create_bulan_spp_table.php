<?php(

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBulanSppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulan_spp', function (Blueprint $table) {
            $table->integer('id_bulan');
            $table->string('nama_bulan');
            $table->string('thn_ajaran');
            $table->double('sppSMA');
            $table->double('sppSMP');
            $table->double('sppIDADY');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bulan_spp');
    }
}
