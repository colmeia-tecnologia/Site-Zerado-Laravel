<?php

namespace App\Http\Controllers\Util;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FileController extends Controller
{
    /**
     * Explode file and extension
     * @param  [string] $name [filename]
     * @return [array]       [Name and Extension]
     */
    public static function nameExtension($name)
    {
        $extension  = '.'.File::extension($name);
        $name       = str_replace($extension, '', $name);

        $nameExtension = [$name, $extension];

        return $nameExtension;
    }
}
