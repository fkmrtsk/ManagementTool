<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category_id')->comment('カテゴリID');
            $table->string('pay_bill')->comment('支払い額');
            $table->string('pay_date')->comment('支払い年月');
            $table->tinyInteger('del_flg')->comment('削除フラグ')->default(0);
            $table->dateTime('created_at')->comment('作成日時');
            $table->dateTime('updated_at')->comment('更新日時')->nullable();
            $table->dateTime('deleted_at')->comment('削除日時')->nullable();
            $table->charset = 'utf8';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('managements');
    }
}
