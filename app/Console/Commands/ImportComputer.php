<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\DB; //  Import the DB facade
use Illuminate\Console\Command;

class ImportComputer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-computer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filePath = storage_path('app/p1bldga.csv');

        if (!file_exists($filePath)) {
            $this->error('File not found: ' . $filePath);
            return;
        }

        $file = fopen($filePath, 'r');
        $header = fgetcsv($file); // Skip header row

        while (($row = fgetcsv($file, 1000, ',')) !== false) {
            $data = array_map(fn($value) => trim($value) === "" ? "" : trim($value), $row);

            DB::table('p1bldga')->insert([
                'department'     => $data[0] ?? "",
                'username'       => $data[1] ?? "",
                'computer_name'  => $data[2] ?? "",
                'model'          => $data[3] ?? "",
                'pc_grade'       => $data[4] ?? "",
                'processor'      => $data[5] ?? "",
                'ram'            => $data[6] ?? "",
                'storage'        => $data[7] ?? "",
                'ip_address'     => $data[8] ?? "",
                'os'             => $data[9] ?? "",
                'remarks'        => $data[10] ?? "",
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        }

        fclose($file);
        $this->info('List imported successfully into database.');
    }

}
