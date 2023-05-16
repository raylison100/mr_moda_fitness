<?php

namespace Database\Seeders;

use App\Entities\Product;
use App\Enuns\ProductTypeEnum;
use App\Enuns\SizeEnum;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/load-data/products.csv"), "r");
        $firstLine = true;

        while (($data = fgetcsv($csvFile, 0)) !== false) {
            if (!$firstLine) {
                try {
                    DB::beginTransaction();
                    $productID = Product::query()->insertGetId([
                        'name' => $data[1],
                        'purchase_price' => floatval(str_replace('R$ ', '', $data[5])),
                        'percentage_on_sale' => intval($data[6]),
                        'final_value' => floatval(str_replace('R$ ', '', $data[7])),
                        'sub_category_id' => 1,
                        'product_type' => ProductTypeEnum::F->name,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);

                    DB::table('stocks')->insertOrIgnore([
                        'size' => SizeEnum::M->name,
                        'product_id' => $productID,
                        'qtd' => intval($data[3]),
                        'code' => $data[0],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);

                    DB::table('stocks')->insertOrIgnore([
                        'size' => SizeEnum::PP->name,
                        'product_id' => $productID,
                        'qtd' => 0,
                        'code' => uniqid(),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);

                    DB::table('stocks')->insertOrIgnore([
                        'size' => SizeEnum::P->name,
                        'product_id' => $productID,
                        'qtd' => 0,
                        'code' => uniqid(),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);

                    DB::table('stocks')->insertOrIgnore([
                        'size' => SizeEnum::G->name,
                        'product_id' => $productID,
                        'qtd' => 0,
                        'code' => uniqid(),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);

                    DB::table('stocks')->insertOrIgnore([
                        'size' => SizeEnum::GG->name,
                        'product_id' => $productID,
                        'qtd' => 0,
                        'code' => uniqid(),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                    Db::commit();
                } catch (\Exception $exception) {
                    DB::rollBack();
                    dd($exception->getMessage(), $exception->getTraceAsString());
                }
            }
            $firstLine = false;
        }

        fclose($csvFile);
    }
}
