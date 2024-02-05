<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use App\Jobs\DeleteTasksJob;

class DeleteTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a task';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $task = Task::orderBy('id', 'desc')->first();

        if ($task) {
            DeleteTasksJob::dispatch($task);
        }
    }
}
