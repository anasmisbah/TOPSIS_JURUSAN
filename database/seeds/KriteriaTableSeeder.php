<?php

use Illuminate\Database\Seeder;

class KriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kriteria')->insert([
            [
                'nama'=>'nilai rata-rata IPA',
                'bobot'=>4,
                'kategori'=>'benefit',
            ],
            [
                'nama'=>'nilai rata-rata IPS',
                'bobot'=>4,
                'kategori'=>'benefit',
            ],
            [
                'nama'=>'nilai rata-rata BAHASA',
                'bobot'=>4,
                'kategori'=>'benefit'
            ],
            [
                'nama'=>'nilai test bakat IPA',
                'bobot'=>3,
                'kategori'=>'benefit'
            ],
            [
                'nama'=>'nilai test bakat IPS',
                'bobot'=>3,
                'kategori'=>'benefit'
            ],
            [
                'nama'=>'nilai test bakat BAHASA',
                'bobot'=>3,
                'kategori'=>'benefit'
            ],
        ]);
    }
}
