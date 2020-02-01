<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $days = 10;
        for ($i=0; $i < 24 * $days; $i++) {
            $datetime = \Carbon\Carbon::now()->subHour($i);

            factory(App\Event::class, 1)->create(['time' => $datetime]);

        }
    }
}
