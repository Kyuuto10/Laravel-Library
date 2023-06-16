<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $siswa = [
            [
                'nis' => '12000699',
                'nama' => 'Dhapin Al-Fath',
                'rombel' => 'XII-RPL',
                'no_telp' => '08298192878',
                'jk' => 'Pria'
            ],
            [
                'nis' => '11000591',
                'nama' => 'Abad',
                'rombel' => 'XI-TKJ',
                'no_telp' => '08898192829',
                'jk' => 'Pria'
            ],
            [
                'nis' => '10000546',
                'nama' => 'Riski Alatas',
                'rombel' => 'X-MMD',
                'no_telp' => '08971928781',
                'jk' => 'Pria'
            ],            
        ];
        foreach($siswa as $s){
            Siswa::create($s);
        }
    }
}
