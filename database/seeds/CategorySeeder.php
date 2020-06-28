<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id' => 1,
                'name' => 'Fantasy',
                'description' => 'Book under this genre contains a story set in a fantasy world – a world that is not real and often includes magic, magical creatures, and supernatural events.'
            ],
            [
                'id' => 2,
                'name' => 'Classic',
                'description' => 'Classic refers to the fictions that are accepted as the most important and influential books of a particular time period or place. These books are widely taught in schools.'
            ],
            [
                'id' => 3,
                'name' => 'Drama',
                'description' => 'Dramas are stories composed in verse or prose, usually for theatrical performance, where conflicts and emotions are expressed through dialogue and actions.'
            ],
            [
                'id' => 4,
                'name' => 'Horror',
                'description' => 'Horror is a genre that is intended to or has the ability to create the feeling of fear, repulsion, fright or terror in the readers. In other words, it creates a frightening and horror atmosphere'
            ],
            [
                'id' => 5,
                'name' => 'Romance',
                'description' => 'The primary focus of romance fiction is on the relationship and romantic love between two people. These books have an emotionally satisfying and optimistic ending.'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
