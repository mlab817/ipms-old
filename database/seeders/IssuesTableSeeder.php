<?php

namespace Database\Seeders;

use App\Models\Issue;
use App\Models\IssueComment;
use Illuminate\Database\Seeder;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IssueComment::withoutEvents(function () {
            IssueComment::factory()->count(5)->create();
        });
    }
}
