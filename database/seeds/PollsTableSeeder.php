<?php
 
use Illuminate\Database\Seeder;
use App\Poll;

class PollsTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        //DB::table('polls')->delete();
        Poll::truncate();
 
 /*
 		'name',
		'description',
        'limit',
        'status',
		'published_at',
		'expires_at'
 */
 
        $today          = Carbon\Carbon::now();
        $next_week      = $today->copy()->addWeeks(1); 
        $next_to_week   = $today->copy()->addWeeks(2);
        $yesterday      = $today->copy()->yesterday();
        $last_week      = $today->copy()->subWeeks(1);
        $faker          = Faker\Factory::create();

        foreach (range(1, 20) as $index) {
            Poll::create([
                'name' => $faker->sentence, 
                'description' => $faker->paragraph(4), 
                'limit' => 5 , 'status'=> 'end', 
                'published_at' => $last_week, 
                'expires_at' => $yesterday , 
                'created_at' => new DateTime, 
                'updated_at' => new DateTime ]);
        }

        foreach (range(1, 20) as $index) {
            Poll::create([
                'name' => $faker->sentence, 
                'description' => $faker->paragraph(3), 
                'limit' => 5 , 'status'=> 'run', 
                'published_at' => $yesterday, 
                'expires_at' => $next_week, 
                'created_at' => new DateTime, 
                'updated_at' => new DateTime                
                ]);
        }

        foreach (range(1, 20) as $index) {
            Poll::create([
                'name' => $faker->sentence, 
                'description' => $faker->paragraph(2), 
                'limit' => 5 , 'status'=> 'preview', 
                'published_at' => $next_week, 
                'expires_at' => $next_to_week,
                'created_at' => new DateTime, 
                'updated_at' => new DateTime                
                ]);
        }

        // Uncomment the below to run the seeder
        // DB::table('polls')->insert($polls);
    }
 
}