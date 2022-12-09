<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category -> name = "Art";
        $category -> save();

        $category1 = new Category();
        $category1 -> name = "Education et Formation";
        $category1 -> save();

        $category2 = new Category();
        $category2 -> name = "Humour";
        $category2 -> save();

        $category3 = new Category();
        $category3 -> name = "Réseaux Sociaux";
        $category3 -> save();

        $category4 = new Category();
        $category4 -> name = "Santé";
        $category4 -> save();

        $category5 = new Category();
        $category5 -> name = "Services";
        $category5 -> save();

        $category6 = new Category();
        $category6 -> name = "Sites E commerce";
        $category6 -> save();

        $category7 = new Category();
        $category7 -> name = "Vacances et Loisirs";
        $category7 -> save();
    }
}
