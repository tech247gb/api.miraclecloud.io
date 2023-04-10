<?php

namespace App\Domain\ChartDashboard;

use App\Contract\CommandBus\ChartDashboard\ChartDashboardCommandInterface;

/**
 * Class ChartDashboardHelper
 * @package App\Domain\Dashboard
 */
class ChartDashboardHelper
{
    const
        VENDOR_AWS = 2,
        VENDOR_AZURE = 1;

    public static function GroupData(array $data, ChartDashboardCommandInterface $command): array
    {
        $result = [];
        foreach ($data as &$elem) {
            $vendorName = self::getVendorName($elem->VendorID);
            $currentMonth = ChartDashboardHelper::getCurrentMonth((int)$elem->Year,
                ChartDashboardHelper::getMonthNumber($elem->Month));
            if (!empty($command->getBusinessUnitId()) && $command->getBusinessUnitId() != $elem->BUID) {
                continue;
            }
            if (!empty($command->getVendorId()) && $command->getVendorId() != $elem->VendorID) {
                continue;
            }
            if (isset($result[$elem->Month][$vendorName])) {
                $result[$elem->Month][$vendorName]['sum'] += floatval($elem->ActualCost);
                $result[$elem->Month][$vendorName]['project'] += floatval($elem->ProjectedCost);
                $result[$elem->Month][$vendorName]['budget'] += floatval($elem->Budget);
            } else {
                $result[$elem->Month][$vendorName]['sum'] = floatval($elem->ActualCost) ?? 0;
                $result[$elem->Month][$vendorName]['project'] = floatval($elem->ProjectedCost) ?? 0;
                $result[$elem->Month][$vendorName]['budget'] = floatval($elem->Budget) ?? 0;
                $result[$elem->Month][$vendorName]['currentMonth'] = $currentMonth;
                $result[$elem->Month][$vendorName]['year'] = $elem->Year;
                $result[$elem->Month][$vendorName]['monthNumber'] = $elem->MonthNumber;
                $result[$elem->Month][$vendorName]['currencyId'] = $elem->CurrencyID;
                $result[$elem->Month][$vendorName]['bUId'] = $elem->BUID;
                $result[$elem->Month][$vendorName]['vendorId'] = $elem->VendorID;
                $result[$elem->Month][$vendorName]['month'] = $elem->Month;
            }
        }

        return $result;
    }

    private static function listVendors()
    {
        return [
            self::VENDOR_AWS => 'AWS',
            self::VENDOR_AZURE => 'Azure',
        ];
    }

    private static function getVendorName($key)
    {
        return self::listVendors()[$key] ?? $key;
    }

    /**
     * @param $month
     * @return mixed
     */
    private static function getMonthNumber($month)
    {
        $monthList = [
            'January' => 1,
            'February' => 2,
            'March' => 3,
            'April' => 4,
            'May' => 5,
            'June' => 6,
            'July' => 7,
            'August' => 8,
            'September' => 9,
            'October' => 10,
            'November' => 11,
            'December' => 12,
        ];

        return $monthList[$month] ?? 0;
    }

    /**
     * @param $elemMonth
     * @param $elemYear
     * @return string
     */
    private static function getCurrentMonth($elemYear, $elemMonth)
    {
        $month = (int)date("n");
        $year = (int)date("Y");
        if ($elemYear > $year || ($elemYear == $year && $month < $elemMonth)) {
            $currentMonth = 'next';
        } elseif ($elemYear == $year && $month == $elemMonth) {
            $currentMonth = 'current';
        } else {
            $currentMonth = 'last';
        }

        return $currentMonth;
    }
}
