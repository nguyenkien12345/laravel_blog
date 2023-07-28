<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category as CategoryModel;

class Category extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    // Create Category
    public function handle()
    {
        CategoryModel::create([
            'name' => 'Lê Thị Huyền' . time(),
            'slug' => 'le-thi-huyen' . time(),
        ]);
    }
}
