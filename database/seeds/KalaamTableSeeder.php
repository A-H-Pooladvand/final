<?php

use App\Audible;
use App\Book;
use App\Category;
use App\Course;
use App\Event;
use App\News;
use App\Place;
use App\Slider;
use App\Tag;
use App\Term;
use Illuminate\Database\Seeder;

class KalaamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed Place with category
        factory(Place::class, 500)->create();

        // Seed News with category
        factory(News::class, 200)->create()->each(function ($item) {

            $categories = factory(Category::class, rand(2, 4))->create(['category_type' => News::class])->toArray();
            $tags = factory(Tag::class, rand(2, 4))->create()->toArray();

            $item->tags()->attach(array_column($tags, 'id'));
            return $item->categories()->sync(array_column($categories, 'id'));

        });

        // Seed Audible with category
        factory(Audible::class, 200)->create()->each(function ($item) {

            $categories = factory(Category::class, rand(2, 4))->create(['category_type' => Audible::class])->toArray();
            $tags = factory(Tag::class, rand(2, 4))->create()->toArray();

            $item->tags()->attach(array_column($tags, 'id'));
            return $item->categories()->sync(array_column($categories, 'id'));

        });


        // Seed Term with category
        factory(Term::class, 200)->create()->each(function ($item) {

            $categories = factory(Category::class, rand(2, 4))->create(['category_type' => Term::class])->toArray();
            $tags = factory(Tag::class, rand(2, 4))->create()->toArray();

            if (rand(0, 1)) {
                // Seed Course with category
                $courses = factory(Course::class, rand(2, 4))->create()->each(function ($item) {

                        $categories = factory(Category::class, rand(2, 4))->create(['category_type' => Course::class])->toArray();
                        $tags = factory(Tag::class, rand(2, 4))->create()->toArray();

                        $item->tags()->attach(array_column($tags, 'id'));
                        return $item->categories()->sync(array_column($categories, 'id'));

                    })->toArray();

                $item->courses()->attach(array_column($courses, 'id'));
            }
            $item->tags()->attach(array_column($tags, 'id'));
            return $item->categories()->sync(array_column($categories, 'id'));

        });

        // Seed Event with category
        factory(Event::class, 200)->create()->each(function ($item) {

            $categories = factory(Category::class, rand(2, 4))->create(['category_type' => Event::class])->toArray();
            $tags = factory(Tag::class, rand(2, 4))->create()->toArray();

            $item->tags()->attach(array_column($tags, 'id'));
            return $item->categories()->sync(array_column($categories, 'id'));

        });

        // Seed Book with category
        factory(Book::class, 200)->create()->each(function ($item) {

            $categories = factory(Category::class, rand(2, 4))->create(['category_type' => Book::class])->toArray();
            $tags = factory(Tag::class, rand(2, 4))->create()->toArray();

            $item->tags()->attach(array_column($tags, 'id'));
            return $item->categories()->sync(array_column($categories, 'id'));

        });

        // Seed Slider
        factory(Slider::class, 6)->create();
    }
}
