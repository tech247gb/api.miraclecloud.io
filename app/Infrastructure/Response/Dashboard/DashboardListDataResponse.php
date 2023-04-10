<?php
namespace App\Infrastructure\Response\Dashboard;

use Illuminate\Http\Resources\Json\Resource;

class DashboardListDataResponse extends Resource
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
                'links' => [
                    'first' => $this->resource->url(1),
                    'self' => $this->resource->url($this->resource->currentPage()),
                    'next' => $this->resource->nextPageUrl(),
                    'last' => $this->resource->url($this->resource->lastPage()),
                ],
                'meta' => [
                    'total' => $this->resource->total(),
                    'per_page' => $this->resource->perPage(),
                    'current_page' => $this->resource->currentPage(),
                    'total_pages' => $this->resource->lastPage()
                ],
                'data' => $this->getDataWithRelations(),
            ];
    }

    /**
     * @return array
     */
    private function getDataWithRelations():array
    {
        $data = [];
        foreach ($this->resource->getCollection()->all() as &$datum) {

            $data[] = new DashboardDataResponse($datum);
        }
        unset($datum);

        return $data;
    }
}
