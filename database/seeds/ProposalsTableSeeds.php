<?php
 
use Illuminate\Database\Seeder;
 
class ProposalsTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('proposals')->delete();
 
 /*
            $table->increments('id');

            $table->integer('poll_id')->unsigned();
            $table->mediumText('proposal');
 */
 
        $data = array(
            ['id' => 1, 'poll_id' => '1', 'proposal' => 'Ankete1 - Možnosť odpovede A', 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 2, 'poll_id' => '2', 'proposal' => 'Ankete2 - Možnosť odpovede A', 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 3, 'poll_id' => '3', 'proposal' => 'Ankete3 - Možnosť odpovede A', 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 4, 'poll_id' => '4', 'proposal' => 'Ankete4 - Možnosť odpovede A', 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 5, 'poll_id' => '1', 'proposal' => 'Ankete1 - Možnosť odpovede B', 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 6, 'poll_id' => '2', 'proposal' => 'Ankete2 - Možnosť odpovede B', 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 7, 'poll_id' => '3', 'proposal' => 'Ankete3 - Možnosť odpovede B', 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 8, 'poll_id' => '4', 'proposal' => 'Ankete4 - Možnosť odpovede B', 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 9, 'poll_id' => '1', 'proposal' => 'Ankete1 - Možnosť odpovede C', 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 10, 'poll_id' => '2', 'proposal' => 'Ankete2 - Možnosť odpovede C', 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 11, 'poll_id' => '3', 'proposal' => 'Ankete3 - Možnosť odpovede C', 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 12, 'poll_id' => '4', 'proposal' => 'Ankete4 - Možnosť odpovede C', 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 13, 'poll_id' => '1', 'proposal' => 'Ankete1 - Možnosť odpovede D', 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 14, 'poll_id' => '2', 'proposal' => 'Ankete2 - Možnosť odpovede D', 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 15, 'poll_id' => '3', 'proposal' => 'Ankete3 - Možnosť odpovede D', 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 16, 'poll_id' => '4', 'proposal' => 'Ankete4 - Možnosť odpovede D', 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 17, 'poll_id' => '1', 'proposal' => 'Ankete1 - Možnosť odpovede E', 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 18, 'poll_id' => '2', 'proposal' => 'Ankete2 - Možnosť odpovede E', 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 19, 'poll_id' => '3', 'proposal' => 'Ankete3 - Možnosť odpovede E', 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 20, 'poll_id' => '4', 'proposal' => 'Ankete4 - Možnosť odpovede E', 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 21, 'poll_id' => '1', 'proposal' => 'Ankete1 - Možnosť odpovede F', 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 22, 'poll_id' => '2', 'proposal' => 'Ankete2 - Možnosť odpovede F', 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 23, 'poll_id' => '3', 'proposal' => 'Ankete3 - Možnosť odpovede F', 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 24, 'poll_id' => '4', 'proposal' => 'Ankete4 - Možnosť odpovede F', 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 25, 'poll_id' => '4', 'proposal' => 'Ankete4 - Možnosť odpovede G', 'created_at' => new DateTime, 'updated_at' => new DateTime ]
        );
 
        // Uncomment the below to run the seeder
        DB::table('proposals')->insert($data);
    }
 
}