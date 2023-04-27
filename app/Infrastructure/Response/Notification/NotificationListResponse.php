<?php


namespace App\Infrastructure\Response\Notification;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class NotificationListResponse extends Resource
{

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->map(function ($Notification) {
            return new NotificationResponse($Notification);
        });
    }

}
