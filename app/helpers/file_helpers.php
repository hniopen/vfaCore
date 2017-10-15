<?php
/**
 * Created by PhpStorm.
 * User: rs
 * Date: 13/10/2017
 * Time: 12:20
 */
use Illuminate\Support\Str;

function deleteFilesInPath($path, $fileName)
{
    /** @var SplFileInfo $allFiles */
    $allFiles = File::allFiles($path);

    $files = [];

    foreach ($allFiles as $file) {
        $files[] = $file->getFilename();
    }

    $files = array_reverse($files);

    foreach ($files as $file) {
        if (Str::contains($file, $fileName)) {
            if (file_exists($path.$file)) {
                unlink($path.$file);
            }
            break;
        }
    }
}

function deleteDirInPath($path, $dirName){
    if(is_dir($path.$dirName)){
        rmdir(path.$dirName);
    }
}