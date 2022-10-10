<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collection = collect(Property::pluck('property_type'));
        foreach ($collection->unique() as $collect) {
            PropertyType::create([
                "id" => json_decode($collect)->id,
                "title" => json_decode($collect)->title,
                "description" => json_decode($collect)->description,
            ]);
        }
    }
}
