<?php

namespace App\Services;

use App\Services\BaseService;
use App\Models\Subscription;
use App\Models\User;

class SubscriptionService extends Service
{
    public function subscription($request)
    {
        $user = \Auth::user();
        Subscription::updateOrCreate([
            'user_id' => $user->id,
            'type_service_id' => $request->type_service_id
        ],
        [
            'active' => '1'
        ]);

        return $user;
    }

    public function unsubscribe($id)
    {
        $user = \Auth::user();
        $subscription = Subscription::find($id);
        $subscription->update(['active'=>'0']);
        return $user;
    }
}