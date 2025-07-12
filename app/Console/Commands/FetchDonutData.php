<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Donut;
use App\Models\Batter;
use App\Models\Topping;

class FetchDonutData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-donut-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Save json data to db. fetch using cl php artisan app:fetch-donut-data
     */

    public function handle()
{
    $this->info("Fetching data...");

    // Y this url fetch 4 data instead of 3? Manually delete 1, else got dups on Cake.
    $url = 'https://repocodes.s3.amazonaws.com/interview.json';
    $response = Http::get($url);

    if (!$response->successful()) {
        $this->error("Failed to fetch data.");
        return;
    }

    $data = $response->json();

    foreach ($data as $donutItem) {
        // 1. Save Donut
        $donut = Donut::create([
            'donut_id' => $donutItem['id'],
            'name'     => $donutItem['name'],
            'type'     => $donutItem['type'],
            'ppu'      => $donutItem['ppu'],
        ]);

        // 2. Save Batters
        foreach ($donutItem['batters']['batter'] as $batter) {
            Batter::create([
                'donut_id'  => $donut->id,
                'batter_id' => $batter['id'],
                'type'      => $batter['type'],
            ]);
        }

        // 3. Save Toppings
        foreach ($donutItem['topping'] as $topping) {
            Topping::create([
                'donut_id'   => $donut->id,
                'topping_id'=> $topping['id'],
                'type'       => $topping['type'],
            ]);
        }

        $this->line("Saved donut: " . $donut->name);
    }

    $this->info("✅ All data saved to database!");
}

}
