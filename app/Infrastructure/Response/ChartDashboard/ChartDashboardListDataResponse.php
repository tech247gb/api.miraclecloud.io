<?php
namespace App\Infrastructure\Response\ChartDashboard;

use Illuminate\Http\Resources\Json\Resource;

class ChartDashboardListDataResponse extends Resource
{
    /**
     * @var bool for don't sanitize int keys
     */
    public $preserveKeys = true;

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
                'data' => $this->getDataWithRelations(),
            ];
    }

    private function getDataWithRelations()
    {
        $data = [];

        foreach ($this->resource as $key => &$datum) {
            $data[$key] = [
                'type' => 'chart',
                'attributes' => $datum
            ];
        }

        return $data;
    }
}
