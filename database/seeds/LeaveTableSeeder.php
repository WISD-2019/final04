<?php

use Illuminate\Database\Seeder;
use App\Leave;

class LeaveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leaves')->truncate();
        Leave::unguard();
        factory(Leave::class, 10)->create();
        Leave::reguard();

    }
}
