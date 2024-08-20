<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use App\Models\Label;
use App\Models\Tag;

use App\Models\Company;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);

        User::factory()->create([
            'name' => 'Sri Abirami',
            'email' => 'sriabirami@gmail.com',
            'password' => Hash::make('sriabirami'),
        ]);

        User::factory()->create([
            'name' => 'Krishna',
            'email' => 'krishna@gmail.com',
            'password' => Hash::make('krishna'),
        ]);

        $labels=[
            [
                'name'=>'Hot',
                'color'=> '#e74c3c'
            ],
            [
                'name'=>'New',
                'color'=> '#2ecc71'
            ],
            [
                'name'=>'Sale',
                'color'=> '#8e44ad'
            ]
        ];

        foreach ($labels as $row){
            Label::create($row);
        }

        $tags = [
            [
                'name' => 'Hand bag'
            ],

            [
                'name' => 'Clothes'
            ],

            [
                'name' => 'Shoes'
            ],
            [
                'name' => 'Bags'
            ],

            [
                'name' => 'Wallet'
            ],
        ];

        foreach ($tags  as $row) {
            Tag::create($row);
        }


        $brands=[
            ['name'=>'layse'],
            ['name'=>'apple'],
            ['name'=>'masaa'],
            ['name'=>'sprite'],
            ['name'=>'msi'],
            ['name'=>'hp']
        ];

        foreach ($brands as $row) {
            Brand::create($row);
        }


        $companies = [
            [
                'name' => 'Sri Abirami Stores',
                'user_id' => 2
            ],
            [
                'name' => 'Krishna Stores',
                'user_id' => 3
            ],
        ];

        foreach ($companies as $row) {
            Company::create($row);
        }



        $categories = [
            ['name' => 'Fresh Produce'],
            ['name' => 'Dairy and Eggs'],
            ['name' => 'Meat and Seafood'],
            ['name' => 'Bakery'],
            ['name' => 'Pantry Staples'],
            ['name' => 'Beverages'],
            ['name' => 'Frozen Foods'],
            ['name' => 'Snacks'],
            ['name' => 'Health and Wellness'],
            ['name' => 'Household Supplies'],
            ['name' => 'Personal Care'],
            ['name' => 'Baby Products'],
            ['name' => 'Pet Supplies'],
            ['name' => 'International Foods'],
        ];

        foreach ($categories as $row) {
            Category::create($row);
        }

        $sub_categories = [
            [
                'name' => 'Fruits',
                'category_id' => 1
            ],
            [
                'name' => 'Vegetables',
                'category_id' => 1
            ],
            [
                'name' => 'Fresh herbs',
                'category_id' => 1
            ],
            [
                'name' => 'Milk',
                'category_id' => 2
            ],
            [
                'name' => 'Cheese',
                'category_id' => 2
            ],
            [
                'name' => 'Yogurt',
                'category_id' => 2
            ],
            [
                'name' => 'Eggs',
                'category_id' => 2
            ],
            [
                'name' => 'Butter and margarine',
                'category_id' => 2
            ],
            [
                'name' => 'Fresh meat (beef, pork, chicken)',
                'category_id' => 3
            ],
            [
                'name' => 'Seafood (fish, shrimp, shellfish)',
                'category_id' => 3
            ],
            [
                'name' => 'Deli meats',
                'category_id' => 3
            ],
            [
                'name' => 'Packaged meat',
                'category_id' => 3
            ],
            [
                'name' => 'Bread',
                'category_id' => 4
            ],
            [
                'name' => 'Pastries',
                'category_id' => 4
            ],
            [
                'name' => 'Cakes and pies',
                'category_id' => 4
            ],
            [
                'name' => 'Cookies and biscuits',
                'category_id' => 4
            ],
            [
                'name' => 'Canned goods',
                'category_id' => 5
            ],
            [
                'name' => 'Dry pasta and grains',
                'category_id' => 5
            ],
            [
                'name' => 'Rice and beans',
                'category_id' => 5
            ],
            [
                'name' => 'Sauces and condiments',
                'category_id' => 5
            ],
            [
                'name' => 'Spices and seasonings',
                'category_id' => 5
            ],
            [
                'name' => 'Baking supplies (flour, sugar, baking powder)',
                'category_id' => 5
            ],
            [
                'name' => 'Water',
                'category_id' => 6
            ],
            [
                'name' => 'Soft drinks',
                'category_id' => 6
            ],
            [
                'name' => 'Juices',
                'category_id' => 6
            ],
            [
                'name' => 'Coffee and tea',
                'category_id' => 6
            ],
            [
                'name' => 'Alcoholic beverages (beer, wine, spirits)',
                'category_id' => 6
            ],
           
            [
                'name' => 'Frozen vegetables and fruits',
                'category_id' => 7
            ],

            [
                'name' => 'Ice cream and desserts',
                'category_id' => 7
            ],
            [
                'name' => 'Frozen meals',
                'category_id' => 7
            ],
            [
                'name' => 'Frozen meat and seafood',
                'category_id' => 7
            ],
            [
                'name' => 'Chips and crisps',
                'category_id' => 8
            ],
            [
                'name' => 'Nuts and seeds',
                'category_id' => 8
            ],
            [
                'name' => 'Popcorn',
                'category_id' => 8
            ],
            [
                'name' => 'Snack bars',
                'category_id' => 8
            ],
            [
                'name' => 'Candy and chocolate',
                'category_id' => 8
            ],
            [
                'name' => 'Vitamins and supplements',
                'category_id' => 9
            ],
            [
                'name' => 'Organic and natural products',
                'category_id' => 9
            ],
            [
                'name' => 'Gluten-free, vegan, and other specialty diet items',
                'category_id' => 9
            ],
            
            [
                'name' => 'Cleaning products',
                'category_id' => 10
            ],
            [
                'name' => 'Paper goods (toilet paper, paper towels)',
                'category_id' => 10
            ],
            [
                'name' => 'Laundry supplies',
                'category_id' => 10
            ],
            [
                'name' => 'Dishwashing supplies',
                'category_id' => 10
            ],
            [
                'name' => 'Shampoo and conditioner',
                'category_id' => 11
            ],
            [
                'name' => 'Soap and body wash',
                'category_id' => 11
            ],
            [
                'name' => 'Toothpaste and oral care',
                'category_id' => 11
            ],
            [
                'name' => 'Deodorants',
                'category_id' => 11
            ],
            [
                'name' => 'Skincare products',
                'category_id' => 11
            ],
            [
                'name' => 'Baby food',
                'category_id' => 12
            ],
            [
                'name' => 'Diapers and wipes',
                'category_id' => 12
            ],
            [
                'name' => 'Baby care products',
                'category_id' => 12
            ],
            [
                'name' => 'Pet food',
                'category_id' => 13
            ],
            [
                'name' => 'Pet toys',
                'category_id' => 13
            ],
            [
                'name' => 'Pet grooming supplies',
                'category_id' => 13
            ],
            [
                'name' => 'Asian cuisine',
                'category_id' => 14
            ],
            [
                'name' => 'Hispanic cuisine',
                'category_id' => 14
            ],
            [
                'name' => 'European cuisine',
                'category_id' => 14
            ],
            [
                'name' => 'Middle Eastern cuisine',
                'category_id' => 14
            ],
        ];

        foreach ($sub_categories as $row) {
            SubCategory::create($row);
        }

    }
}
