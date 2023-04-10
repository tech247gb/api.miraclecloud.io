<?php


namespace App\Infrastructure\Response\DynamicDashboard\AccountList;


use Illuminate\Http\Resources\Json\Resource;

class AccountListDataResponse extends Resource
{

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

        return [

            'data' => $this->resource->map(function ($account) {

                return [
                    'type' => 'account',
                    'id' => $account->id,
                    'attributes' => [
                        'name' => $account->name
                    ]
                ];
            })
        ];
    }

}
