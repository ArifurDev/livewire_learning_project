<?php

namespace Database\Seeders;

use App\Models\routes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class routeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create routes list
        routes::create(['name' => 'Dashboard','url' => 'dashboard', ]);
        routes::create(['name' => 'Category Create','url' => 'category.create', ]);
        routes::create(['name' => 'Category List','url' => 'category.list', ]);

        routes::create(['name' => 'Attribute','url' => 'attribute', ]);
        routes::create(['name' => 'Product Index','url' => 'product.index', ]);
        routes::create(['name' => 'Product Create','url' => 'product.create', ]);

        routes::create(['name' => 'Stock Management','url' => 'store.management.index', ]);
        routes::create(['name' => 'Routes Setup','url' => 'routes.setup', ]);
        routes::create(['name' => 'Order Management','url' => 'order.management.index', ]);
        // routes::create(['name' => '','url' => '', ]);
    }
}
