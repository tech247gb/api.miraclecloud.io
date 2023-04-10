<?php

namespace App\Infrastructure\Response\Dashboard;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Request;

class DashboardDataResponse extends Resource
{
    /**
     * @var bool for don't sanitize int keys
     */
    public $preserveKeys = true;

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request):array
    {
        return [
            'type' => 'dashboard',
            'id' => $this->resource->BUID,
            'attributes' => [
                'monthNumber' => $this->resource->MontheNumber,
                'year' => $this->resource->Year,
                'vendorID' => $this->resource->VendorID,
                'businessUnits' => $this->resource->BUID,
                'currencyID' => $this->resource->CurrencyID,
                'budgetYTD' => round($this->resource->BudgetYTD,2),
                'budgetAnnual' => round($this->resource->BudgetAnnual,2),
                'costYTD' => round($this->resource->CostYTD,2),
                'costAnnual' => round($this->resource->CostAnnual,2),
                'costTrend' => round($this->resource->CostTrend,2),
                'gapYTD' => round($this->resource->GapYTD,2),
                'gapAnnual' => round($this->resource->GapAnnual,2),
                'percentageYTD' => round($this->resource->PrecentageYTD,2),
                'percentageAnnual' => round($this->resource->PrecentageAnnual,2)
            ],
        ];
    }
}
