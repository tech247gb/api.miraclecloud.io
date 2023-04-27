<?php


namespace App\Infrastructure\Response\Notification;


use App\Domain\Notification\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class NotificationResponse extends Resource
{

    /**
     * @var Notification
     */
    public $resource;

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'Notification',
                'attributes' => [
                    'NtfID' => $this->resource->getNtfID(),
                    'NotificationTitle' => $this->resource->getNotificationTitle(),
                    'NotificationType' => $this->resource->getNotificationType(),
                    'NotificationTypeName' => $this->resource->getNotificationTypeName(),
                    'NotificationDesc' => $this->resource->getNotificationDesc(),
                    'AddedBy' => $this->resource->getAddedBy(),
                    'redirecturl' => $this->resource->getredirecturl(),
                    'Seen' => $this->resource->getSeen()
                ]
            ]
        ];
    }


}
