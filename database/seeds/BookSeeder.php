<?php

use Illuminate\Database\Seeder;
use App\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            [
                'id' => 1,
                'name' => 'A Game of Thrones',
                'author' => 'George R.R. Martin',
                'published_date' => '1996-08-01',
                'user' => 'none',
                'category_id'=>1
            ],
            [
                'id' => 2,
                'name' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'published_date' => '1960-07-11',
                'user' => 'none',
                'category_id' => 2
            ],
            [
                'id' => 3,
                'name' => 'The Crucible',
                'author' => 'Arthur Miller',
                'published_date' => '1953-01-22',
                'user' => 'none',
                'category_id' => 3
            ],
            [
                'id' => 4,
                'name' => 'The Shining',
                'author' => 'Stephen King',
                'published_date' => '1977-01-28',
                'user' => 'none',
                'category_id' => 4
            ],
            [
                'id' => 5,
                'name' => 'Perfect Chemistry ',
                'author' => 'Simone Elkeles',
                'published_date' => '2008-12-23',
                'user' => 'none',
                'category_id' => 5
            ],
        ];
        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
