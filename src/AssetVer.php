<?php

namespace Sukohi\AssetVer;

use Illuminate\Support\Arr;

class AssetVer {

    public function getKey() {

        return config('asset_ver.cache_key', 'asset_ver');

    }

    public function get() {

        $cache_key = $this->getKey();
        return \Cache::get($cache_key);

    }

    public function getValue() {

        $values = $this->get();
        return Arr::get($values, 'value', '1');

    }

    public function getMode() {

        $values = $this->get();
        return Arr::get($values, 'mode', 'count');

    }

    public function set($mode, $value) {

        $cache_key = $this->getKey();
        \Cache::forever($cache_key, [
            'mode' => $mode,
            'value' => $value
        ]);

    }

    public function clear() {

        $cache_key = $this->getKey();
        \Cache::forget($cache_key);

    }

}