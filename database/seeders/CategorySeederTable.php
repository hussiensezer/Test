<?php

namespace Database\Seeders;
use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class CategorySeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
// For Product
        for ($i = 1; $i <= 2; $i++) {
            $category = Category::create([
                'name'        => ['ar' => ucfirst($faker->word), 'en' => ucfirst($faker->word)],
                'description' => ['ar' => ucfirst($faker->word), 'en' => ucfirst($faker->word)],
                'status'    => 1,
                'slug'      => Str::slug($faker->sentence(2)),
                'category_type' => 'product',
                'level'         => 1,
                'image'         => 'default.png'
            ]);



            for ($j = 1; $j <= 2; $j++) {
                $childCategory = $category->childCategories()->create([
                    'name'        =>  ['ar' => ucfirst($faker->word), 'en' => ucfirst($faker->word)],
                    'description' => ['ar' => $faker->sentence(2), 'en' => $faker->sentence(2)],
                    'status'    => 1,
                    'slug'      => Str::slug($faker->sentence(2)),
                    'category_type' => 'product',
                    'level'         => 2,
                    'image'         => 'default.png'
                ]);

                for ($k = 1; $k <= 2; $k++) {
                    $childCategory->childCategories()->create([
                        'name'        => ['ar' => ucfirst($faker->word), 'en' => ucfirst($faker->word)],
                        'description' => ['ar' => $faker->sentence(2), 'en' => $faker->sentence(2)],
                        'status'    => 1,
                        'slug'      => Str::slug($faker->sentence(2)),
                        'category_type' => 'product',
                        'level'         => 3,
                        'image'         => 'default.png'
                    ]);
                }
            }
        }


// For Item Category
        for ($i = 1; $i <= 2; $i++) {
            $category = Category::create([
                'name'        => ['ar' => ucfirst($faker->word), 'en' => ucfirst($faker->word)],
                'description' => ['ar' => $faker->sentence(2), 'en' => $faker->sentence(2)],
                'status'    => 1,
                'slug'      => Str::slug($faker->sentence(2)),
                'category_type' => 'item',
                'level'         => 1,
                'image'         => 'default.png'
            ]);



            for ($j = 1; $j <= 2; $j++) {
                $childCategory = $category->childCategories()->create([
                    'name'        => ['ar' => ucfirst($faker->word), 'en' => ucfirst($faker->word)],
                    'description' => ['ar' => $faker->sentence(2), 'en' => $faker->sentence(2)],
                    'status'    => 1,
                    'slug'      => Str::slug($faker->sentence(2)),
                    'category_type' => 'item',
                    'level'         => 2,
                    'image'         => 'default.png'
                ]);

                for ($k = 1; $k <= 2; $k++) {
                    $childCategory->childCategories()->create([
                        'name'        => ['ar' => ucfirst($faker->word), 'en' => ucfirst($faker->word)],
                        'description' => ['ar' => $faker->sentence(2), 'en' => $faker->sentence(2)],
                        'status'    => 1,
                        'slug'      => Str::slug($faker->sentence(2)),
                        'category_type' => 'item',
                        'level'         => 3,
                        'image'         => 'default.png'
                    ]);
                }
            }
        }
    }
}
