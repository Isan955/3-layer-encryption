<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServicePrice;

class ServicePriceSeeder extends Seeder
{
    public function run()
    {
        $prices = [
            ['service_name' => 'FastClean', 'category' => 'shoes', 'price' => 50],
            ['service_name' => 'Deep Clean Medium', 'category' => 'shoes', 'price' => 100],
            ['service_name' => 'Deep Clean Hard', 'category' => 'shoes', 'price' => 150],
            ['service_name' => 'Deep Clean : Small', 'category' => 'bags', 'price' => 30],
            ['service_name' => 'Deep Clean : Medium', 'category' => 'bags', 'price' => 50],
            ['service_name' => 'Deep Clean : Large', 'category' => 'bags', 'price' => 80],
            ['service_name' => 'Deep Clean : Medium', 'category' => 'caps', 'price' => 20],
            ['service_name' => 'Deep Clean : Hard', 'category' => 'caps', 'price' => 40],
        ];

        // Insert the default prices into the service_prices table
        foreach ($prices as $price) {
            ServicePrice::create($price);
        }
    }
}