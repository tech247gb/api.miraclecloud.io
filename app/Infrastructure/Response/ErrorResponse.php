<?php
namespace App\Infrastructure\Response;

use Illuminate\Http\Resources\Json\Resource;

class ErrorResponse extends Resource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'error',
                'attributes' => [
                    'code' => $this->resource['code'],
                    'message' => $this->resource['message'],
                ],
            ],
        ];
    }
}
