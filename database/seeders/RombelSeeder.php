<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rombel;

class RombelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rombels = [
            [
                'rombel' => 'X-RPL'
            ],
            [
                'rombel' => 'X-MMD'
            ],
            [
                'rombel' => 'XI-TKJ'
            ],
            [
                'rombel' => 'XII-RPL'
            ],
        ];
        foreach($rombels as $rombel){
            Rombel::create($rombel);
        }
    }
}
