<?php

namespace App\Console\Commands;

use App\Models\Buyer;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Worker;
use Illuminate\Console\Command;

class DevCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'develop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Команда чисто для тестов в разработке и не более';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $buyer = Buyer::find(1)->sales;
        dd($buyer->toArray());
    }
}
