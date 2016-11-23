<?php

namespace CleaniqueCoders\Console\Commands\Setting;

use CleaniqueCoders\Setting;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class Flush extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setting:flush
                        {--truncate=0 : Set to 1 to truncate settings table as well}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush Setting';

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
        $settings = Setting::all()->pluck('key')->toArray();

        foreach ($settings as $key => $value) {
            Cache::pull('setting.' . $value);
        }

        $this->info('Setting cache flushed successfully.');

        if ($this->option('truncate') == 1) {
            Setting::truncate();
            $this->info('Setting table truncated successfully.');
        }
    }
}
