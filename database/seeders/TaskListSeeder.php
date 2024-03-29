<?php

namespace Database\Seeders;

use App\Models\TaskList;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lists = [
            ['title' => 'To Do'],
            ['title' => 'Doing'],
            ['title' => 'Done'],
        ]; 

        foreach($lists as $list){
            TaskList::updateOrCreate($list);
        }
    }
}
