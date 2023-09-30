<?php

namespace Database\Seeders;

use App\Models\MasterProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $data = [
            [
                "product_code" => "0000-PRD-2023",
                "product_name" => "Product 0 Lorem ipsum dolor sit amet",
                "expired_date" => "2023-09-30",
                "price" => 99,
                "size" => "Medium",
                "category" => "Old",
            ],
            [
                "product_code" => "0001-PRD-2023",
                "product_name" => "Product 1 Lorem ipsum dolor sit amet",
                "expired_date" => "2023-09-30",
                "price" => 99,
                "size" => "Extra Large",
                "category" => "New",
            ],
            [
                "product_code" => "0002-PRD-2023",
                "product_name" => "Product 2 Lorem ipsum dolor sit amet",
                "expired_date" => "2023-09-30",
                "price" => 99,
                "size" => "Extra Large",
                "category" => "New",
            ],
            [
                "product_code" => "0003-PRD-2023",
                "product_name" => "Product 3 Lorem ipsum dolor sit amet",
                "expired_date" => "2023-09-30",
                "price" => 99,
                "size" => "Extra Large",
                "category" => "New",
            ],
            [
                "product_code" => "0004-PRD-2023",
                "product_name" => "Product 4 Lorem ipsum dolor sit amet",
                "expired_date" => "2023-09-30",
                "price" => 99,
                "size" => "Extra Large",
                "category" => "New",
            ],
            [
                "product_code" => "0005-PRD-2023",
                "product_name" => "Product 5 Lorem ipsum dolor sit amet",
                "expired_date" => "2023-09-30",
                "price" => 99,
                "size" => "Extra Large",
                "category" => "New",
            ],
            [
                "product_code" => "0006-PRD-2023",
                "product_name" => "Product 6 Lorem ipsum dolor sit amet",
                "expired_date" => "2023-09-30",
                "price" => 99,
                "size" => "Extra Large",
                "category" => "New",
            ],
            [
                "product_code" => "0007-PRD-2023",
                "product_name" => "Product 7 Lorem ipsum dolor sit amet",
                "expired_date" => "2023-09-30",
                "price" => 99,
                "size" => "Medium",
                "category" => "Old",
            ],
            [
                "product_code" => "0001-PRD-2023",
                "product_name" => "Product 8 Lorem ipsum dolor sit amet",
                "expired_date" => "2023-09-30",
                "price" => 99,
                "size" => "Extra Large",
                "category" => "New",
            ],
            [
                "product_code" => "0001-PRD-2023",
                "product_name" => "Product 9 Lorem ipsum dolor sit amet",
                "expired_date" => "2023-09-30",
                "price" => 99,
                "size" => "Extra Large",
                "category" => "New",
            ],
            [
                "product_code" => "0001-PRD-2023",
                "product_name" => "Product 10 Lorem ipsum dolor sit amet",
                "expired_date" => "2023-09-30",
                "price" => 99,
                "size" => "Extra Large",
                "category" => "New",
            ],
            [
                "product_code" => "0001-PRD-2023",
                "product_name" => "Product 11 Lorem ipsum dolor sit amet",
                "expired_date" => "2023-09-30",
                "price" => 99,
                "size" => "Extra Large",
                "category" => "New",
            ],
            [
                "product_code" => "0001-PRD-2023",
                "product_name" => "Product 12 Lorem ipsum dolor sit amet",
                "expired_date" => "2023-09-30",
                "price" => 99,
                "size" => "Extra Large",
                "category" => "New",
            ],
            [
                "product_code" => "0001-PRD-2023",
                "product_name" => "Product 13 Lorem ipsum dolor sit amet",
                "expired_date" => "2023-09-30",
                "price" => 99,
                "size" => "Extra Large",
                "category" => "New",
            ],
        ];

        foreach ($data as $value) {
            MasterProduct::create([
                "product_code" => $value['product_code'],
                "product_name" => $value['product_name'],
                "expired_date" => $value['expired_date'],
                "price" => $value['price'],
                "size" => $value['size'],
                "category" => $value['category'],
            ]);
        }
    }
}
