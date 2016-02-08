<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Deen extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = '1deen:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installing GIS Projects';

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
        $this->line('Silahkan tunggu beberapa waktu :)');
        \Artisan::call('db:seed');
        
        $this->output->progressStart(10);

        for ($i = 0; $i < 5; $i++) {
            sleep(1);
            $this->output->progressAdvance();
        }

        $this->output->progressFinish();

        $this->line('Sukses !!! , Buka di url and http://localhost:8000');
        \Artisan::call('serve');
    }
}
