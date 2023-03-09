<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SubscriptionService;
use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;

class SubscriptionsController extends Controller
{
    protected $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    /**
     * @OA\Post(
     *      path="/api/subscription",
     *      tags={"Subscriptions"},
     *      summary="Crear Suscripcion",
     *      description="",
     *      @OA\Parameter(
     *          name="Content-Type",
     *          description="application/json",
     *          required=true,
     *          in="header",
     *      ),
     *      @OA\Parameter(
     *          name="Authorization",
     *          description="Token obtenido al iniciar sesion",
     *          required=true,
     *          in="header",
     *      ),
     *      @OA\RequestBody(
     *          @OA\JsonContent(
     *              @OA\Property(property="type_service_id", type="integer", description="Id de Tipo de Servicio"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *       )
     *  )
    */
    public function subscription(SubscriptionRequest $request)
    {
        $subscription = null;
        try{
            $subscription = $this->subscriptionService->subscription($request);
        }catch(\Exception $ex){
            $subscription = apiExceptionResponse($ex);
        }
        return apiResponse($subscription, "Suscripcion exitosa!", "OK", 200);
    }

    /**
     * @OA\Post(
     *      path="/api/unsubscribe/{id}",
     *      tags={"Subscriptions"},
     *      summary="Desuscripcion",
     *      description="",
     *      @OA\Parameter(
     *          name="Content-Type",
     *          description="application/json",
     *          required=true,
     *          in="header",
     *      ),
     *      @OA\Parameter(
     *          name="Authorization",
     *          description="Token obtenido al iniciar sesion",
     *          required=true,
     *          in="header",
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *       )
     *  )
    */
    public function unsubscribe(Request $request, $id)
    {
        $unsubscribe = null;
        try{
            $unsubscribe = $this->subscriptionService->unsubscribe($id);
        }catch(\Exception $ex){
            $unsubscribe = apiExceptionResponse($ex);
        }
        return apiResponse($unsubscribe, "Desuscripcion exitosa!", 'OK', 200);
    }
}
