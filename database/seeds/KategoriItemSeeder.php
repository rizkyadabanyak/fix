<?php

use Illuminate\Database\Seeder;
use App\KategoriItem;
class KategoriItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategories = [
            ['nama' => 'Roti'],
            ['nama' => 'Brownis'],
            ['nama' => 'Tar']

        ];

        foreach ($kategories as $kategori){
            KategoriItem::create($kategori);
        }

    }
}
