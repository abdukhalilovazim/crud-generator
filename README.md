## Installed packages

- [JWT-auth (php-open-source-save)](https://github.com/PHP-Open-Source-Saver/jwt-auth).
- [L5-Swagger (DarkaOnline) for documentation ](https://github.com/DarkaOnLine/L5-Swagger).
- . . .

## Using a CRUD generator

There are 2 different commands to run the CRUD controller

| Command                                | Description                                                                                                                                                                                                          | Result                                                                                                                                                                                                                               |
|----------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| php artisan api:admin {ControllerName} | This command creates CRUD Controller with Resource. Controller Controller name can be followed by version and accepts default v1. Example for writing another version: <br>php artisan api:admin (ControllerName) v2 | 3 files created. Their routes are:<br/>App\Http\Controllers\API\{version}\Admin\{ControllerName}<br/>App\Http\Resources\{version}\Admin\{ControllerNameResourse}<br/>App\Http\Resources\{version}\Admin\{ControllerNameShowResourse} | 
| php artisan api:user  {ControllerName} | It works the same as route api:admin only it creates a different document.                                                                                                                                           | 3 files created. Their routes are:<br/>App\Http\Controllers\API\{version}\User\{ControllerName}<br/>App\Http\Resources\{version}\User\{ControllerNameResourse}<br/>App\Http\Resources\{version}\User\{ControllerNameShowResourse}  |

