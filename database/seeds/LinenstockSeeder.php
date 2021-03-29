<?php

use Illuminate\Database\Seeder;
use App\Models\Linenstock;

class LinenstockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $linenstock = [
        	[
                'id' => '1',
                'items' => 'Sheets (Dbl)',
                'stock' => '',
                'new' => '',
                'total1' => '',
                'less' => '',
                'total2' => '',
                'actual' => '',
                'discrepancies' => '',
            ],
            [
                'id' => '2',
                'items' => 'Sheets (Sgl)',
                'stock' => '',
                'new' => '',
                'total1' => '',
                'less' => '',
                'total2' => '',
                'actual' => '',
                'discrepancies' => '',
            ],
            [
                'id' => '3',
                'items' => 'Pillow case',
                'stock' => '',
                'new' => '',
                'total1' => '',
                'less' => '',
                'total2' => '',
                'actual' => '',
                'discrepancies' => '',
            ],
            [
                'id' => '4',
                'items' => 'Bath towels',
                'stock' => '',
                'new' => '',
                'total1' => '',
                'less' => '',
                'total2' => '',
                'actual' => '',
                'discrepancies' => '',
            ],
            [
                'id' => '5',
                'items' => 'Hand towels',
                'stock' => '',
                'new' => '',
                'total1' => '',
                'less' => '',
                'total2' => '',
                'actual' => '',
                'discrepancies' => '',
            ],
            [
                'id' => '6',
                'items' => 'Face towels',
                'stock' => '',
                'new' => '',
                'total1' => '',
                'less' => '',
                'total2' => '',
                'actual' => '',
                'discrepancies' => '',
            ],
            [
                'id' => '7',
                'items' => 'Bath mat',
                'stock' => '',
                'new' => '',
                'total1' => '',
                'less' => '',
                'total2' => '',
                'actual' => '',
                'discrepancies' => '',
            ],
            [
                'id' => '8',
                'items' => 'Blankets (Dbl)',
                'stock' => '',
                'new' => '',
                'total1' => '',
                'less' => '',
                'total2' => '',
                'actual' => '',
                'discrepancies' => '',
            ],
            [
                'id' => '9',
                'items' => 'Blankets (Sgl)',
                'stock' => '',
                'new' => '',
                'total1' => '',
                'less' => '',
                'total2' => '',
                'actual' => '',
                'discrepancies' => '',
            ],
            [
                'id' => '10',
                'items' => 'Bed cover (Dbl)',
                'stock' => '',
                'new' => '',
                'total1' => '',
                'less' => '',
                'total2' => '',
                'actual' => '',
                'discrepancies' => '',
            ],
            [
                'id' => '11',
                'items' => 'Bed cover(Sgl)',
                'stock' => '',
                'new' => '',
                'total1' => '',
                'less' => '',
                'total2' => '',
                'actual' => '',
                'discrepancies' => '',
            ]     
        ];
        Linenstock::insert($linenstock);
    }
}
