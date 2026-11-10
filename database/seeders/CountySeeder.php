<?php

namespace Database\Seeders;

use App\Models\County;
use Illuminate\Database\Seeder;

class CountySeeder extends Seeder
{
    const COUNTIES = [
        'Budapest',
        'Pest',
        'Győr-Moson-Sopron',
        'Borsod-Abaúj-Zemplén',
        'Csongrád-Csanád',
    ];

    public function run(): void
    {
        foreach (self::COUNTIES as $name) {
            County::create([
                'name' => $name,
            ]);
        }
    }
}