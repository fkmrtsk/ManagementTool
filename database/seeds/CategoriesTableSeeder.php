<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['category' => "rent", 'category_name' => "家賃", 'created_at' => new DateTime(),],
            ['category' => "mobile_fee", 'category_name' => "携帯料金", 'created_at' => new DateTime(),],
            ['category' => "net", 'category_name' => "ネット", 'created_at' => new DateTime(),],
            ['category' => "gym", 'category_name' => "ジム", 'created_at' => new DateTime(),],
            ['category' => "utility_costs", 'category_name' => "光熱費", 'created_at' => new DateTime(),],
            ['category' => "food_expenses", 'category_name' => "食費", 'created_at' => new DateTime(),],
            ['category' => "scholarship", 'category_name' => "奨学金", 'created_at' => new DateTime(),],
            ['category' => "pass_price", 'category_name' => "定期代", 'created_at' => new DateTime(),],
            ['category' => "entertainment_expenses", 'category_name' => "交際費", 'created_at' => new DateTime(),],
            ['category' => "credit", 'category_name' => "クレジット", 'created_at' => new DateTime(),],
            ['category' => "total", 'category_name' => "支払い合計", 'created_at' => new DateTime(),],
            ['category' => "salary", 'category_name' => "給料", 'created_at' => new DateTime(),],
            ['category' => "withdrawal_amount", 'category_name' => "引き出し額", 'created_at' => new DateTime(),],
            ['category' => "savings", 'category_name' => "貯金", 'created_at' => new DateTime(),],
            ['category' => "balance1", 'category_name' => "残高", 'created_at' => new DateTime(),],
            ['category' => "balance2", 'category_name' => "残高(-貯金)", 'created_at' => new DateTime(),]
        ]);
    }
}
