<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendars', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')
                ->default(1)
                ->nullable(false)
                ->comment('类型');
            $table->char('region', 2)
                ->default('CN')
                ->comment('地区');
            $table->char('name', 10)
                ->nullable(false)
                ->comment('名称');
            $table->integer('year', false, true)
                ->nullable(false)
                ->comment('年份');
            $table->date('date')
                ->nullable(false)
                ->comment('日期');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calendars');
    }
}
