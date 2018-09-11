<?php

use Illuminate\Database\Seeder;
use App\Models\Institution;
class InstitutionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $institutions = factory(Institution::class)->times(5)->make();
        Institution::insert($institutions->toArray());
    }
}
