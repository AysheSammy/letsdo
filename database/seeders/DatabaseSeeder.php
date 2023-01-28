<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
        ]);

        User::factory(10)->create();

        for ($i = 0; $i < 50; $i++) {
            $user = User::inRandomOrder()->first();
            $category = Category::inRandomOrder()->first();
            $task = Task::factory()->create([
                'user_id' => $user->id,
                'category_id' => $category->id,
            ]);
            if ($task->status) {
                Task::factory(rand(4, 10))
                    ->create([
                        'category_id' => $task->category_id,
                        'user_id' => $task->user_id,
                        'parent_id' => $task->id,
                    ]);
            }
        }

    }
}
