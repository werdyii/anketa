<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // composer dump-autoload
        // php artisan migrate:refresh --seed


        $this->call('PollsTableSeeder');
        $this->call('ProposalsTableSeeder');

        Model::reguard();
    }
}
