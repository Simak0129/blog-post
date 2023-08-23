<?php

namespace App\Services;

use App\Repositories\PostsRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class RedisService
{

    public const POST_CREATED = 'post_created';
    public const POST_UPDATED = 'post_updated';
    public const POST_DELETED = 'post_deleted';


    public function storeInQueue(array $data, string $type) : void
    {
        $notificationServices = config('notification_microservices');
        if (!empty($notificationServices)) {
            foreach ($notificationServices as $service) {
                $data['type'] = $type;
                Redis::connection('default')->rpush($service, json_encode($data));
            }
        }
    }

}
