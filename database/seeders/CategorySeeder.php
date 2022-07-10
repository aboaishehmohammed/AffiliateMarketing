<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $income = ['salary' , 'bonuses' , 'overtime'];
        $expenses = ['food' ,'drinks', 'shopping'];

        foreach ($income as $item) {
            Category::create([
                'name' => $item,
                'type' => 'income',
            ]);
        }

        foreach ($expenses as $item) {
            Category::create([
                'name' => $item,
                'type' => 'expenses',
            ]);
        }

    }
}
