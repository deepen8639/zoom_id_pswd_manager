<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZoomIdPswdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (Schema::hasTable('zoom_id_pswds')) {
        // テーブルが存在していればリターン
        return;
      }
        Schema::create('zoom_id_pswds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('list_name');
            $table->string('zoom_id');
            $table->string('zoom_pswd')->nullable();
            // $table->date('zoom_date')->nullable();
            $table->string('userid');
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
        Schema::dropIfExists('zoom_id_pswds');
    }
}
