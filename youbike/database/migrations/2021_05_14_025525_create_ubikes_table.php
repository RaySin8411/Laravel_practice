<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUbikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubikes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('sno')->comment('站點代號');
            $table->string('sna')->comment('中文場站名稱');
            $table->unsignedInteger('tot')->comment('場站總停車格');
            $table->unsignedInteger('sbi')->comment('可借車位數');
            $table->string('sarea')->comment('中文場站區域');
            $table->date('mday')->comment('資料更新時間');
            $table->double('lat')->comment('緯度');
            $table->double('lng')->comment('經度');
            $table->string('ar')->comment('中文地址');
            $table->string('snaen')->comment('英文場站名稱');
            $table->string('sareaen')->comment('英文場站區域');
            $table->unsignedInteger('bemp')->comment('可還空位數');
            $table->boolean('act')->default(false)->comment('是否暫停營運');
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
        Schema::dropIfExists('ubikes');
    }
}
