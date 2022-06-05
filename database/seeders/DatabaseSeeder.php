<?php

namespace Database\Seeders;

use App\Models\{Category, User, Article};
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'emailadmin1@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
            'remember_token' => Str::random(10),
        ]);

        $categories = [
            [
                'name' => 'Hiburan',
                'user_id' => 1
            ],
            [
                'name' => 'Politik',
                'user_id' => 1
            ],
            [
                'name' => 'Tragedi',
                'user_id' => 1
            ]
        ];

        Category::insert($categories);

        $articles = [
            [
                'title' => 'Artikel Tentang Hiburan',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In egestas vel turpis id accumsan. Curabitur dignissim eu mauris at iaculis. Etiam commodo lorem nunc, eu semper mi eleifend ac. Donec lobortis lobortis aliquam. Integer eget quam elementum, iaculis ex ut, porta ipsum. Cras a tortor in quam fermentum blandit viverra et velit. Nam aliquam quis leo ut ultrices. Aenean elit justo, efficitur ac fermentum at, varius in erat. Vivamus ex sem, luctus id arcu in, convallis pretium lacus. Suspendisse accumsan diam tortor, at ornare eros facilisis sit amet. Quisque vel fermentum urna, non interdum nunc. Vivamus ex nulla, malesuada vitae.',
                'image' => '',
                'user_id' => 1,
                'category_id' => 1
            ],
            [
                'title' => 'Artikel Tentang Politik',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In egestas vel turpis id accumsan. Curabitur dignissim eu mauris at iaculis. Etiam commodo lorem nunc, eu semper mi eleifend ac. Donec lobortis lobortis aliquam. Integer eget quam elementum, iaculis ex ut, porta ipsum. Cras a tortor in quam fermentum blandit viverra et velit. Nam aliquam quis leo ut ultrices. Aenean elit justo, efficitur ac fermentum at, varius in erat. Vivamus ex sem, luctus id arcu in, convallis pretium lacus. Suspendisse accumsan diam tortor, at ornare eros facilisis sit amet. Quisque vel fermentum urna, non interdum nunc. Vivamus ex nulla, malesuada vitae.',
                'image' => '',
                'user_id' => 1,
                'category_id' => 2
            ],
            [
                'title' => 'Artikel Tentang Tragedi',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In egestas vel turpis id accumsan. Curabitur dignissim eu mauris at iaculis. Etiam commodo lorem nunc, eu semper mi eleifend ac. Donec lobortis lobortis aliquam. Integer eget quam elementum, iaculis ex ut, porta ipsum. Cras a tortor in quam fermentum blandit viverra et velit. Nam aliquam quis leo ut ultrices. Aenean elit justo, efficitur ac fermentum at, varius in erat. Vivamus ex sem, luctus id arcu in, convallis pretium lacus. Suspendisse accumsan diam tortor, at ornare eros facilisis sit amet. Quisque vel fermentum urna, non interdum nunc. Vivamus ex nulla, malesuada vitae.',
                'image' => '',
                'user_id' => 1,
                'category_id' => 3
            ]
        ];

        Article::insert($articles);
    }
}
