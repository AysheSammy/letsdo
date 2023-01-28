<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $objs = [
          ['Iş', 'Work'],
          ['Mekdep', 'School'],
          ['Şahsy', 'Personal'],
        ];

        foreach ($objs as $obj){
            Category::create([
                'name_tm' => $obj[0],
                'name_en' => $obj[1] ?: null,
            ]);
        }

    }
}
