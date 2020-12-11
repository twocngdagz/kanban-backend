<?php

use App\Card;
use App\Column;
use Illuminate\Database\Seeder;

class ColumnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Column::class, 3)
        ->create()
        ->each(function ($column) {
            factory(Card::class, 3)->create([
               'column_id' => $column->id,
            ]);
        });
    }
}
