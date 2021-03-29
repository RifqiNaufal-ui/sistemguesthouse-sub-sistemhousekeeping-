<?php

use Illuminate\Database\Seeder;
use App\Models\Controloflinen;


class ControloflinenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
   {
         $controloflinen = [
        	[
                'id' => '1',
                'articles' => 'Bed cover (Dbl)',
                'dirty' => '',
                'clean' => '',
                'description' => '',
            ],
            [
                'id' => '2',
                'articles' => 'Bed cover (Sgl)',
                'dirty' => '',
                'clean' => '',
                'description' => '',
            ],
            [
                'id' => '3',
                'articles' => 'Bed pad (Dbl)',
                'dirty' => '',
                'clean' => '',
                'description' => '',
            ],
            [
                'id' => '4',
                'articles' => 'Bed pad (Sgl)',
                'dirty' => '',
                'clean' => '',
                'description' => '',
            ],
            [
                'id' => '5',
                'articles' => 'Sheets (Dbl)',
                'dirty' => '',
                'clean' => '',
                'description' => '',
            ],
            [
                'id' => '6',
                'articles' => 'Sheets (Sgl)',
                'dirty' => '',
                'clean' => '',
                'description' => '',
            ],
            [
                'id' => '7',
                'articles' => 'Blankets (Dbl)',
                'dirty' => '',
                'clean' => '',
                'description' => '',
            ],
            [
                'id' => '8',
                'articles' => 'Blankets (Sgl)',
                'dirty' => '',
                'clean' => '',
                'description' => '',
            ],
            [
                'id' => '9',
                'articles' => 'Pillow case',
                'dirty' => '',
                'clean' => '',
                'description' => '',
            ],
            [
                'id' => '10',
                'articles' => 'Bath towels',
                'dirty' => '',
                'clean' => '',
                'description' => '',
            ],
            [
                'id' => '11',
                'articles' => 'Hand towels',
                'dirty' => '',
                'clean' => '',
                'description' => '',
            ],
            [
                'id' => '12',
                'articles' => 'Face towels',
                'dirty' => '',
                'clean' => '',
                'description' => '',
            ]          
        ];
        Controloflinen::insert($controloflinen);
    }
}

