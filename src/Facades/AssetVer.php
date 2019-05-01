<?php

namespace Sukohi\AssetVer\Facades;

use Illuminate\Support\Facades\Facade;

class AssetVer extends Facade {

    /**
    * Get the registered name of the component.
    *
    * @return string
    */
    protected static function getFacadeAccessor() { return 'asset-ver'; }

}