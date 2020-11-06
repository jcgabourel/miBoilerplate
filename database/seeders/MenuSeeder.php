<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('menus')->insert(['title'=>'DASHBOARD',
                                    'icon'=>'fa fa-dashboard fa-fw',
                                    'href'=>'dashboard2',
                                    'parent_id'=>'0',
                                    'level'=>1]);
        DB::table('menus')->insert(['title'=>'CHARTS ',
                                    'icon'=>'fa fa-bar-chart-o fa-fw',
                                    'href'=>'#',
                                    'parent_id'=>'0',
                                    'level'=>1]);
        DB::table('menus')->insert(['title'=>'Flot Charts',                                     
                                    'href'=>'#',
                                    'parent_id'=>'2',
                                    'level'=>2]);
        DB::table('menus')->insert(['title'=>'Morris.js Charts',                                     
                                    'href'=>'#',
                                    'parent_id'=>'2',
                                    'level'=>2]);
    }
}
