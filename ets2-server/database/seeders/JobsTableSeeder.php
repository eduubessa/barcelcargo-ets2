<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;
use Psy\Util\Str;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $job = new Job();
        $job->name = "Condutor A";
        $job->slug = "interns";
        $job->save();

        $job = new Job();
        $job->name = "Condutor Regional";
        $job->slug = \Illuminate\Support\Str::random(64);
        $job->save();

        $job = new Job();
        $job->name = "Condutor Inter-regional";
        $job->slug = Str::random(64);
        $job->save();

        $job = new Job();
        $job->name = "Condutor Nacional";
        $job->slug = Str::random(64);
        $job->save();

        $job = new Job();
        $job->name = "Condutor Internacional";
        $job->slug = Str::random(64);
        $job->save();

    }
}
