<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Mobile Phones & Accessories',
                'children' => [
                    ['name' => 'Smartphones'],
                    ['name' => 'Tablets'],
                    ['name' => 'Smartwatches & Wearables'],
                    ['name' => 'Power Banks'],
                    ['name' => 'Chargers & Cables'],
                    ['name' => 'Cases & Covers'],
                    ['name' => 'Screen Protectors'],
                    ['name' => 'Wireless Earbuds & Headphones'],
                ],
            ],
            [
                'name' => 'Laptops, Computers & Accessories',
                'children' => [
                    ['name' => 'Laptops'],
                    ['name' => 'Desktops & All-in-Ones'],
                    ['name' => 'Monitors'],
                    ['name' => 'Tablets with Keyboards'],
                    ['name' => 'External Hard Drives & SSDs'],
                    ['name' => 'USB Flash Drives'],
                    ['name' => 'Keyboards & Mice'],
                    ['name' => 'Laptop Bags & Stands'],
                    ['name' => 'Printers & Scanners'],
                    ['name' => 'Networking (Routers, Wi-Fi Extenders)'],
                ],
            ],
            [
                'name' => 'TVs & Home Entertainment',
                'children' => [
                    ['name' => 'LED TVs'],
                    ['name' => 'Smart TVs'],
                    ['name' => '4K & 8K TVs'],
                    ['name' => 'TV Stands & Wall Mounts'],
                    ['name' => 'Home Theaters & Sound Systems'],
                    ['name' => 'Streaming Devices (Chromecast, Fire Stick, Apple TV)'],
                ],
            ],
            [
                'name' => 'Home Appliances',
                'children' => [
                    ['name' => 'Refrigerators'],
                    ['name' => 'Freezers'],
                    ['name' => 'Washing Machines'],
                    ['name' => 'Dryers'],
                    ['name' => 'Dishwashers'],
                    ['name' => 'Ovens & Cookers'],
                    ['name' => 'Microwaves'],
                    ['name' => 'Water Heaters'],
                    ['name' => 'Air Fryers'],
                    ['name' => 'Coffee Machines'],
                    ['name' => 'Blenders & Juicers'],
                    ['name' => 'Vacuum Cleaners'],
                    ['name' => 'Irons & Steamers'],
                    ['name' => 'Fans & Heaters'],
                    ['name' => 'Hair Dryers & Personal Grooming Appliances'],
                ],
            ],
            [
                'name' => 'Air Conditioners & Cooling',
                'children' => [
                    ['name' => 'Split ACs'],
                    ['name' => 'Window ACs'],
                    ['name' => 'Portable ACs'],
                    ['name' => 'Air Purifiers'],
                    ['name' => 'Air Coolers'],
                ],
            ],
            [
                'name' => 'Gaming',
                'children' => [
                    ['name' => 'Gaming Consoles (PlayStation, Xbox, Nintendo)'],
                    ['name' => 'Gaming Laptops'],
                    ['name' => 'Gaming Accessories (Controllers, Headsets)'],
                    ['name' => 'Gaming Chairs & Desks'],
                    ['name' => 'PC Gaming Components (GPUs, RAM, Power Supplies)'],
                ],
            ],
            [
                'name' => 'Audio & Headphones',
                'children' => [
                    ['name' => 'Bluetooth Speakers'],
                    ['name' => 'Home Speakers'],
                    ['name' => 'Wired & Wireless Headphones'],
                    ['name' => 'Microphones'],
                    ['name' => 'Professional Audio Equipment'],
                ],
            ],
            [
                'name' => 'Smart Devices & IoT',
                'children' => [
                    ['name' => 'Smart Home Hubs'],
                    ['name' => 'Smart Bulbs & Lighting'],
                    ['name' => 'Smart Security Cameras'],
                    ['name' => 'Smart Locks & Doorbells'],
                    ['name' => 'Robot Vacuums'],
                    ['name' => 'Fitness Trackers'],
                ],
            ],
            [
                'name' => 'Office & Business Equipment',
                'children' => [
                    ['name' => 'Projectors'],
                    ['name' => 'Telephones (Landline, IP Phones)'],
                    ['name' => 'Office Printers'],
                    ['name' => 'UPS & Power Solutions'],
                ],
            ],
            [
                'name' => 'Accessories & Peripherals',
                'children' => [
                    ['name' => 'Batteries & Power Solutions'],
                    ['name' => 'Memory Cards'],
                    ['name' => 'HDMI Cables'],
                    ['name' => 'Laptop Cooling Pads'],
                    ['name' => 'Stylus Pens'],
                    ['name' => 'Tripods & Mounts'],
                ],
            ],
            [
                'name' => 'Personal Care & Health Tech',
                'children' => [
                    ['name' => 'Electric Shavers & Trimmers'],
                    ['name' => 'Hair Styling Tools'],
                    ['name' => 'Smart Scales'],
                    ['name' => 'Health Monitoring Devices (Blood Pressure, Oximeters)'],
                ],
            ],
        ];

        foreach ($categories as $parentSortOrder => $category) {
            $slug = Str::slug($category['name']);

            // Insert Parent Category
            $parentId = Category::insertGetId([
                'name' => $category['name'],
                'slug' => $slug,
                'description' => "Explore a wide range of {$category['name']} from top brands.",
                'image' => "categories/{$slug}.jpg",
                'sort_order' => $parentSortOrder + 1,
                'meta_title' => "{$category['name']}",
                'meta_description' => "Find the best deals on {$category['name']}. Shop now for great prices and fast delivery.",
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Prepare Children for Bulk Insert
            if (! empty($category['children'])) {
                $childrenToInsert = [];
                foreach ($category['children'] as $childSortOrder => $child) {
                    $childSlug = Str::slug($child['name']);
                    $childrenToInsert[] = [
                        'name' => $child['name'],
                        'slug' => $childSlug,
                        'description' => "Browse our selection of high-quality {$child['name']}.",
                        'image' => "categories/{$childSlug}.jpg",
                        'sort_order' => $childSortOrder + 1,
                        'meta_title' => "{$child['name']} - {$category['name']}",
                        'meta_description' => "Get the best {$child['name']} from the {$category['name']} category. Quality guaranteed.",
                        'parent_id' => $parentId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
                Category::insert($childrenToInsert);
            }
        }
    }
}
