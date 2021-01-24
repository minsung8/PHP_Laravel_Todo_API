<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 할일 30개 만들어 넣기 
        Todo::factory()
            ->count(30)
            ->create();
    }
}
