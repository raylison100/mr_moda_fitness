<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateSaleItens]Table.
 */
class CreateSaleItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('sale_itens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('qtd');
            $table->float('amount');
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('sale_id')->unsigned();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('sale_id')->references('id')->on('sales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::drop('sale_itens');
    }
}
