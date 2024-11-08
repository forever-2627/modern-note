<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Firsts',
            'Sports and Physical Fitness Achievements',
            'Academic Achievements',
            'Artistic and Creative Achievements',
            'Personal Growth and Development',
            'Career and Professional Achievements',
            'Family and Relationship Milestones',
            'Travel and Adventure',
            'Financial Achievements',
            'Community and Social Contributions',
            'Pet Achievements',
            'Goals',
            'Events and Celebrations',
            'extra achievements',
        ];

        foreach ($categories as $name) {
            \App\Models\Category::create(['name' => $name]);
        }
    }
}
