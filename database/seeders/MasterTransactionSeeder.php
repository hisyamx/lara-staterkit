<?php

namespace Database\Seeders;

use App\Models\MasterTransaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $data = [
                [
                    "order_date" => "2023-09-01",
                    "order_number" => "01-2023/ORD/000",
                    "transaction_name" => "Product 0 Lorem ipsum dolor sit amet",
                    "product_id" => 1,
                    "amount" => 99,
                    "total_price" => 99,
                ],
                [
                    "order_date" => "2023-09-01",
                    "order_number" => "01-2023/ORD/001",
                    "transaction_name" => "Product 1 Lorem ipsum dolor sit amet",
                    "product_id" => 2,
                    "amount" => 99,
                    "total_price" => 99,
                ],
                [
                    "order_date" => "2023-09-01",
                    "order_number" => "01-2023/ORD/002",
                    "transaction_name" => "Product 2 Lorem ipsum dolor sit amet",
                    "product_id" => 3,
                    "amount" => 99,
                    "total_price" => 99,
                ],
                [
                    "order_date" => "2023-09-01",
                    "order_number" => "01-2023/ORD/003",
                    "transaction_name" => "Product 3 Lorem ipsum dolor sit amet",
                    "product_id" => 4,
                    "amount" => 99,
                    "total_price" => 99,
                ],
                [
                    "order_date" => "2023-09-01",
                    "order_number" => "01-2023/ORD/004",
                    "transaction_name" => "Product 4 Lorem ipsum dolor sit amet",
                    "product_id" => 5,
                    "amount" => 99,
                    "total_price" => 99,
                ],
                [
                    "order_date" => "2023-09-01",
                    "order_number" => "01-2023/ORD/005",
                    "transaction_name" => "Product 5 Lorem ipsum dolor sit amet",
                    "product_id" => 6,
                    "amount" => 99,
                    "total_price" => 99,
                ],
                [
                    "order_date" => "2023-09-01",
                    "order_number" => "01-2023/ORD/006",
                    "transaction_name" => "Product 6 Lorem ipsum dolor sit amet",
                    "product_id" => 7,
                    "amount" => 99,
                    "total_price" => 99,
                ],
                [
                    "order_date" => "2023-09-01",
                    "order_number" => "01-2023/ORD/007",
                    "transaction_name" => "Product 7 Lorem ipsum dolor sit amet",
                    "product_id" => 7,
                    "amount" => 99,
                    "total_price" => 99,
                    "size" => "http://placehold.it/940x300/999/CCC",
                    "category" => "http://placehold.it/940x300/999/CCC",
                ],
                [
                    "order_date" => "2023-09-01",
                    "order_number" => "01-2023/ORD/001",
                    "transaction_name" => "Product 8 Lorem ipsum dolor sit amet",
                    "product_id" => 8,
                    "amount" => 99,
                    "total_price" => 99,
                ],
                [
                    "order_date" => "2023-09-01",
                    "order_number" => "01-2023/ORD/001",
                    "transaction_name" => "Product 9 Lorem ipsum dolor sit amet",
                    "product_id" => 9,
                    "amount" => 99,
                    "total_price" => 99,
                ],
                [
                    "order_date" => "2023-09-01",
                    "order_number" => "01-2023/ORD/001",
                    "transaction_name" => "Product 10 Lorem ipsum dolor sit amet",
                    "product_id" => 10,
                    "amount" => 99,
                    "total_price" => 99,
                ],
                [
                    "order_date" => "2023-09-01",
                    "order_number" => "01-2023/ORD/001",
                    "transaction_name" => "Product 11 Lorem ipsum dolor sit amet",
                    "product_id" => 7,
                    "amount" => 99,
                    "total_price" => 99,
                ],
                [
                    "order_date" => "2023-09-01",
                    "order_number" => "01-2023/ORD/001",
                    "transaction_name" => "Product 12 Lorem ipsum dolor sit amet",
                    "product_id" => 1,
                    "amount" => 99,
                    "total_price" => 99,
                ],
                [
                    "order_date" => "2023-09-01",
                    "order_number" => "01-2023/ORD/001",
                    "transaction_name" => "Product 13 Lorem ipsum dolor sit amet",
                    "product_id" => 3,
                    "amount" => 99,
                    "total_price" => 99,
                ],
            ];

        foreach ($data as $value) {
            MasterTransaction::create([
                "order_date" => $value['order_date'],
                "order_number" => $value['order_number'],
                "transaction_name" => $value['transaction_name'],
                "product_id" => $value['product_id'],
                "amount" => $value['amount'],
                "total_price" => $value['total_price'],
            ]);
        }
    }
}
