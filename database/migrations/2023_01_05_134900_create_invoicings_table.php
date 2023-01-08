<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateInvoicingsTable.
 */
class CreateInvoicingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('invoicings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('amount');
            $table->date('billing_date');
            $table->bigInteger('sale_id')->unsigned();
            $table->timestamps();

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
        Schema::drop('invoicings');
    }
}
