<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('sdate');
            $table->date('edate');
            $table->enum('category_type', ['1 month', '3 month', '6 month', 'year']);
            $table->float('amt');
            $table->float('bamt');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id', 'foreign_user')
            ->references('id')
            ->on('customers')
            ->onDelete('cascade');
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
        Schema::dropIfExists('subscriptions');
    }
}
