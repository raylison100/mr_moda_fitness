<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateSalesTable.
 */
class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('amount');
            $table->boolean('installment')->default(false);
            $table->integer('installment_qtd')->nullable();
            $table->float('installment_value')->nullable()->default(0);
            $table->float('cash_value')->nullable()->default(0);
            $table->float('discount_value')->nullable()->default(0);
            $table->enum('status',['PEDDING', 'CONFIRMED', 'CANCELED'])->default('PEDDING');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::drop('sales');
    }
}
