<?php

use Illuminate\Database\Seeder;
use App\Wardobe;
use App\Cell;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        for($i = 1; $i < 5;$i++){
            //Создаем 4 яшика
            $wardob = new Wardobe;
            $wardob->save();

            //Для каждого яшика 4 ячейки
            for($y = 0; $y < 4;$y++){
                $cell = new Cell;
                $cell->wardobe_id = $i;
                $cell->save();
            }
        }
    }
}
