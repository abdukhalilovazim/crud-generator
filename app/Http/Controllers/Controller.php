<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

/**
 *  @OA\Info(
 *      version="1.0.0",
 *      title="WEB AR ",
 *      description="Documentation for WEB AR",
 *      @OA\Contact(email="contact@programmer.uz"),
 * ),
 * @OA\SecurityScheme(
 *     type="http",
 *     description="Login with email and password to get the authentication token",
 *     name="Token based Based",
 *     in="header",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="admin",
 * ),
 * @OA\SecurityScheme(
 *     type="http",
 *     description="Login with email and password to get the authentication token",
 *     name="Token based Based",
 *     in="header",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="user",
 * ),
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function makeController(string $param, string $version,string $paths,string $text){
        $paramClone = $param;
        $param = str_replace(['controller','Controller'], ["",""], $param);
        $param = ucfirst($param);
        $path = str_replace($param, "", $paramClone);
        $fileNameController = 'API/'. $version ."/$paths/". $param . 'Controller.php';
        $resource_name =  $param . 'Resource';
        $resource_show_name = $param . 'ShowResource';
        $route = strtolower($param);
        echo "Resources are generating . . . \n";
        Artisan::call("make:resource ".$version ."/$paths/".$resource_name);
        Artisan::call("make:resource " .$version ."/$paths/". $resource_show_name);
        echo "Resources generated!\n";
        echo "Controller is generating . . . \n";
        $text = str_replace("{ControllerName}", $param . 'Controller', $text);
        $text = str_replace("{ResourceName}", $resource_name, $text);
        $text = str_replace("{ResourceShowName}", $resource_show_name, $text);
        $text = str_replace("{ModelName}", $param, $text);
        $text = str_replace("{route}", $route, $text);
        $text = str_replace("{version}", strtolower($version), $text);
        $text = str_replace("{version_path}",$version, $text);
        Storage::disk("controller")->put($path . "/" . $fileNameController, $text);
        echo "Controller generated!\n";
        echo "Swagger is generating . . . \n";
        Artisan::call("l5-swagger:generate");
        echo "Swagger is generated!\n";

    }
}
