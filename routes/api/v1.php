<?php
/**
 * Created by PhpStorm.
 * User: szualang
 * Date: 2018-1-22
 * Time: 15:46
 */

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api\V1',
    'middleware' => [
    //'cors',
    //'serializer',
    //'serializer:array', // if you want to remove data wrap
    'api.throttle',
    ],
    // each route have a limit of 200 of 1 minutes
    'limit' => 200, 'expires' => 1,], function ($api){
    // 以下是项目api路由设定
    $api->get('test', function (){
        return 'test from v1';
    });
});