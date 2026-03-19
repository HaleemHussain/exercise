<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            1 => ['example-product-1.jpg', 'example-product-2.jpg', 'example-product-3.jpg'],
            2 => ['example-product-2.jpg', 'example-product-3.jpg', 'example-product-4.jpg'],
            3 => ['example-product-3.jpg', 'example-product-4.jpg', 'example-product-1.jpg'],
            4 => ['example-product-4.jpg', 'example-product-1.jpg', 'example-product-2.jpg'],
        ];

        foreach ($images as $productId => $files) {
            foreach ($files as $file) {
                ProductImage::firstOrCreate([
                    'product_id' => $productId,
                    'path' => $file,
                ]);
            }
        }
    }
}
