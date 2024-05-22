<?php

namespace App\Console\Commands;

use App\Http\Resources\Sale\SaleResource;
use App\Models\Buyer;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Worker;
use Illuminate\Console\Command;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

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
        $dbCount = DB::table('products')->select('count_product')->get();

        dd($dbCount);
    }
}
