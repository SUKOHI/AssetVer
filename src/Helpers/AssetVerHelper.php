<?php

function asset_ver($key = true) {

    $asset_ver = new \Sukohi\AssetVer\AssetVer();
    $version_value = $asset_ver->getValue();

    if($key) {

        return config('asset_ver.param_key', 'ver') .'='. $version_value;

    }

    return $version_value;

}