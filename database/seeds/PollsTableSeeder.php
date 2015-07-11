<?php
 
use Illuminate\Database\Seeder;
 
class PollsTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('polls')->delete();
 
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


        $polls = array(
            ['id' => 1, 'name' => 'Anketa 1', 'description' => 'Popis k ankete -1', 'limit' => 5 , 'status'=> 'end', 'published_at' => $last_week, 'expires_at' => $yesterday , 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'Anketa 2', 'description' => 'Popis k ankete -2', 'limit' => 5 , 'status'=> 'run', 'published_at' => $yesterday, 'expires_at' => $next_week, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'name' => 'Anketa 3', 'description' => 'Popis k ankete -3', 'limit' => 5 , 'status'=> 'run', 'published_at' => $yesterday, 'expires_at' => $next_to_week, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'name' => 'Anketa 4', 'description' => 'Popis k ankete -4', 'limit' => 5 , 'status'=> 'preview', 'published_at' => $next_week, 'expires_at' => $next_to_week, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        // Uncomment the below to run the seeder
        DB::table('polls')->insert($polls);
    }
 
}