<?php

namespace Sukohi\AssetVer\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Sukohi\AssetVer\AssetVer;

class AssetVerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'asset_ver';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update asset version.';

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
        $cache_value = '';
        $mode = config('asset_ver.mode');

        if($mode === 'timestamp') {

            $mode = 'timestamp';
            $cache_value = date('U');

        } else if($mode === 'random') {

            $mode = 'timestamp';
            $cache_value = Str::random();

        } else {

            $cache_values = $asset_ver->get();
            $mode = 'count';
            $cache_value = ($asset_ver->getMode() === 'count')
                ? $cache_values['value'] + 1
                : 1;

        }

        $asset_ver->set($mode, $cache_value);
        $this->info('Done! [ value: '. $asset_ver->getValue() .' ]');
    }
}
