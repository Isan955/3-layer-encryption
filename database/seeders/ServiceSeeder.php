<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        // Layanan Shoes
        $shoesServices = [
            ['service_name' => 'FastClean', 'category' => 'shoes', 'price' => 20000],
            ['service_name' => 'Deep Clean Medium', 'category' => 'shoes', 'price' => 30000],
            ['service_name' => 'Deep Clean Hard', 'category' => 'shoes', 'price' => 40000],
            ['service_name' => 'Leather Care Medium', 'category' => 'shoes', 'price' => 50000],
            ['service_name' => 'Leather Care Hard', 'category' => 'shoes', 'price' => 60000],
            ['service_name' => 'Whitening Medium', 'category' => 'shoes', 'price' => 35000],
            ['service_name' => 'Whitening Hard', 'category' => 'shoes', 'price' => 45000],
            ['service_name' => 'Unyellowing', 'category' => 'shoes', 'price' => 25000],
            ['service_name' => 'Reglue Medium', 'category' => 'shoes', 'price' => 30000],
            ['service_name' => 'Reglue Hard', 'category' => 'shoes', 'price' => 40000],
            ['service_name' => 'Repaint', 'category' => 'shoes', 'price' => 50000],
            ['service_name' => 'Repaint Custom', 'category' => 'shoes', 'price' => 60000],
            ['service_name' => 'Repair Sol', 'category' => 'shoes', 'price' => 55000],
        ];

        // Layanan Bags
        $bagsServices = [
            ['service_name' => 'Deep Clean : Small', 'category' => 'bags', 'price' => 30000],
            ['service_name' => 'Deep Clean : Medium', 'category' => 'bags', 'price' => 40000],
            ['service_name' => 'Deep Clean : Large', 'category' => 'bags', 'price' => 50000],
        ];

        // Layanan Caps
        $capsServices = [
            ['service_name' => 'Fast Clean', 'category' => 'caps', 'price' => 20000],
            ['service_name' => 'Deep Clean', 'category' => 'caps', 'price' => 30000],
        ];

        // Insert ke database
        Service::insert(array_merge($shoesServices, $bagsServices, $capsServices));
    }
}
