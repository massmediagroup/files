<?php

namespace App\Console\Commands;

use App\File;
use Illuminate\Console\Command;

class FileDeleteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $files = File::all();
        foreach ($files as $file) {
            if ($file->delete_after <= now()) {
                \Storage::disk('public')->delete($file->path);
                $file->links()->delete();
                $file->delete();
            }
        }
    }
}
