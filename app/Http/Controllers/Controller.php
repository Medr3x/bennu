<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(title="API - BENNU", version="1.0")
 * @OA\Server(url="http://bennu.test:8400")
 * @OA\Tag(name="Auth",description="Estos endpoints manejan la autenticacion de los usuarios, su registro y cierre de sesion.")
 * @OA\Tag(name="Subscriptions",description="Estos endpoints manejan la suscripcion y desuscripcion de un usuario a n tipos de servicios.")
*/
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
