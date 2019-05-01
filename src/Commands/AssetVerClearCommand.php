<?php

namespace Sukohi\AssetVer\Commands;

use Illuminate\Console\Command;
use Sukohi\AssetVer\AssetVer;

class AssetVerClearCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'asset_ver:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear asset version.';

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
        $asset_ver = new AssetVer();
        $asset_ver->clear();

        $this->info('Done!');
    }
}
