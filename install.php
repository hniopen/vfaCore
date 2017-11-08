<?php
/**
 * Created by PhpStorm.
 * User: Safidy
 * Date: 11/10/2017
 * Time: 11:28
 */

//Create dynamic menu & routes for generator
$routePath  = "routes/";
$menu = "resources/views/partials/dynamic_menu.blade.php";
$routeWeb = $routePath."dynamic_web.php";
$routeApi = $routePath."dynamic_api.php";
if (!file_exists($routeWeb)) {
    $contents = "<?php /* Dynamic route Web for generator */";
    file_put_contents($routeWeb, $contents);
}
if (!file_exists($routeApi)) {
    $contents = "<?php /* Dynamic route API for generator */";
    file_put_contents($routeApi, $contents);
}
if (!file_exists($menu)) {
    $contents = "";
    file_put_contents($menu, $contents);
}
// create xml directory in public folder
if (!file_exists('public/xml')) {
    mkdir('public/xml', 0777, true);
}

