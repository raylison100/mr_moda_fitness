<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateSpendingsTable.
 */
class CreateSpendingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('spendings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->float('value');
            $table->enum('spending_type', ['EXTRA', 'FIXO']);
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
        Schema::drop('spendings');
    }
}
