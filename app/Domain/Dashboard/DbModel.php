<?php

namespace App\Domain\Dashboard;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Class DbModel
 * @package App\Domain\Db
 */
class DbModel
{
    /**
     * @param array $params
     * @return Collection
     */
    public function userLogin(array $params): Collection
    {
        return collect(
            DB::select('call SP_User_Login(?, ?, ?)', $params)
        );
    }

    /**
     * @param array $params
     * @return Collection
     */
    public function userLoginSso(array $params): Collection
    {
        return collect(
            DB::select('call SP_User_Login_ForSSO(?, ?)', $params)
        );
    }

    /**
     * @param array $params
     * @return Collection
     */
    public function userLoginSaml(array $params): Collection
    {
        return collect(
            DB::select('call SP_User_Login_SSO(?)', $params)
        );
    }

    /**
     * @param array $params
     * @return array
     */
    public function getPrivateKey(array $params)
    {
        return DB::select('call SP_Get_PrivateKey(?)', $params);
    }

    /**
     * @param array $params
     * @return Collection
     */
    public function dashboardGrid(array $params): Collection
    {
        return collect(
            DB::select('call Client_Report_Select(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $params)
        );
    }

    /**
     * SP dashboard chart
     *
     * @param array $params
     * @return Collection
     */
    public function clientReportChartSelect(array $params)
    {
        return collect(
            DB::select('call Client_Report_Chart_Select(?, ?, ?, ?, ?)', $params)
        );
    }

    /**
     * @param array $params
     * @return Collection
     */
    public function selectClient(array $params)
    {
        return collect(
            DB::select('call SP_Client_Select(?)', $params)
        );
    }

    /**
     * get all clients by filter
     *
     * @param array $params
     * @return Collection
     */
    public function listClients(array $params)
    {
        return collect(
            DB::select('call SP_Client_AllSelect()', $params)
        );
    }

    /**
     * add client
     *
     * @param array $params
     * @return Collection
     */
    public function createClient(array $params)
    {
        return collect(
            DB::select('call SP_Client_Create(?)', $params)
        );
    }

    /**
     * edit client by id
     *
     * @param array $params
     * @return Collection
     */
    public function updateClient(array $params)
    {
        return collect(
            DB::select('call SP_Client_Update(?, ?)', $params)
        );
    }

    /**
     * delete client by id
     *
     * @param array $params
     * @return Collection
     */
    public function deleteClient(array $params)
    {
        return collect(
            DB::select('call SP_Client_Delete(?)', $params)
        );
    }

    /**
     * load list Business Units
     * @param array $params
     * @return Collection
     */
    public function businessUnits(array $params)
    {
        return collect(
            DB::select('call BU_List_Select(?, ?)', $params)
        );
    }

    /**
     * load account list
     * @param array $params
     * @return Collection
     */
    public function accountsList(array $params)
    {
        return collect(
            DB::select('call SP_AccountsList_Select(?)', $params)
        );
    }

    /**
     * @param array $params
     * @return array
     */
    public function getAccountById(array $params)
    {
        return DB::select('call SP_Account_Select(?)', $params);
    }

    /**
     * enable account
     * @param array $params
     * @return Collection
     */
    public function accountEnable(array $params)
    {
        return collect(
            DB::select('call SP_Account_Enable(?)', $params)
        );
    }

    /**
     * disable account
     * @param array $params
     * @return Collection
     */
    public function accountDisable(array $params)
    {
        return collect(
            DB::select('call SP_Account_Disable(?)', $params)
        );
    }

    /**
     * disable account
     * @param array $params
     * @return Collection
     */
    public function getYear(array $params)
    {
        return collect(
            DB::select('call SP_YearsList_Select(?)', $params)
        );
    }

    /**
     * disable account
     * @param array $params
     * @return Collection
     */
    public function accountDelete(array $params)
    {
        return collect(
            DB::select('call SP_Account_Delete(?)', $params)
        );
    }

    /**
     * add account
     * @param array $params
     * @return Collection
     */
    public function addAccount(array $params)
    {
        return collect(
            DB::select('call SP_Account_Insert(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $params)
        );
    }

    /**
     * update account
     * @param array $params
     * @return Collection
     */
    public function updateAccount(array $params)
    {
        return collect(
            DB::select('call SP_Account_Update(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $params)
        );
    }

    /**
     * @param array $params
     * @return Collection
     */
    public function accountListDynamicDashboard(array $params)
    {
        return collect(
            DB::select('call SP_DB2_AccountList_Select(?)', $params)
        );
    }

    /**
     * @param array $params
     * @return Collection
     */
    public function getSubBusinessUnitsList(array $params)
    {

        return collect(
            DB::select('call SubBU_List_Select(?, ?)', $params)
        );
    }

    /**
     * @param array $params
     * @return Collection
     */
    public function getVendorsList(array $params)
    {

        return collect(
            DB::select('call SP_VendorList_Select(?)', $params)
        );
    }

    /**
     * @param array $params
     * @return Collection
     */
    public function createBusinessUnit(array $params): Collection
    {
        return collect(
            DB::select('call SP_BU_Create(?, ?)', $params)
        );
    }

    /**
     * @param array $params
     * @return array
     */
    public function updateBusinessUnit(array $params)
    {
        return DB::select('call SP_BU_Update(?, ?)', $params);
    }

    /**
     * @param array $params
     * @return array
     */
    public function deleteBusinessUnit(array $params): array
    {
        return DB::select('call SP_BU_Delete(?)', $params);
    }

    /**
     * @param array $params
     * @return Collection
     */
    public function createSubBusinessUnit(array $params): Collection
    {
        return collect(
            DB::select('call SP_SubBU_Create(?, ?)', $params)
        );
    }

    /**
     * @param array $params
     * @return array
     */
    public function updateSubBusinessUnit(array $params): array
    {
        return DB::select('call SP_SubBU_Update(?, ?)', $params);
    }

    /**
     * @param array $params
     * @return array
     */
    public function deleteSubBusinessUnit(array $params): array
    {
        return DB::select('call SP_SubBU_Delete(?)', $params);
    }

    /**
     * @param array $params
     * @return Collection
     */
    public function getDynamicChartData(array $params)
    {
        return collect(
            DB::select('call SP_DB2_Client_Chart_Select(?, ?, ?, ?, ?, ?, ?, ?)', $params)
        );
    }

    /**
     * @param array $params
     * @return Collection
     */
    public function getDashboardTableData(array $params)
    {
        return collect(
            DB::select('call SP_DB2_Client_Table_Select(?, ?, ?, ?, ?, ?, ?, ?)', $params)
        );
    }

    /**
     * @param array $params
     * @return Collection
     */
    public function getServiceList(array $params)
    {
        return collect(
            DB::select('call SP_DB2_Services_Select(?)', $params)
        );
    }

    /**
     * @param array $params
     * @return Collection
     */
    public function getVendorList(array $params)
    {
        return collect(
            DB::select('call SP_DB2_Vendor_List_Select(?)', $params)
        );
    }

    /**
     * @param array $params
     * @return Collection
     */
    public function getReportList(array $params)
    {
        return collect(
            DB::select('call SP_Get_Menu_For_User(?)', $params)
        );
    }

    /**
     * @param array $params
     * @return Collection
     */
    public function getAlertsList(array $params)
    {
        return collect(
            DB::select('call SP_Alerts_GetAlertsByClientID(?, ?)', $params)
        );
    }

    /**
     * @return Collection
     */
    public function getAlertTypeList()
    {
        return collect(
            DB::select('call SP_Alerts_GetAlertsTypes()')
        );
    }

    /**
     * @param array $params
     * @return Collection
     */
    public function getOwnerList(array $params)
    {
        return collect(
            DB::select('call SP_Alerts_GetOwnersListByClientID(?)', $params)
        );
    }

    /**
     * @return Collection
     */
    public function getComparisonTypesList()
    {
        return collect(
            DB::select('call SP_Alerts_GetComparisonTypes()')
        );
    }

    /**
     * @param array $params
     * @return array
     */
    public function suspendAlert(array $params): array
    {
        return DB::select('call SP_Alerts_Suspend(?)', $params);
    }

    /**
     * @param array $params
     * @return array
     */
    public function unSuspendAlert(array $params): array
    {
        return DB::select('call SP_Alerts_UnSuspend(?)', $params);
    }

    /**
     * @return Collection
     */
    public function getProductList()
    {
        return collect(
            DB::select('call SP_Alerts_GetProductsList()')
        );
    }

    /**
     * @param array $params
     * @return Collection
     */
    public function getSourceList(array $params)
    {
        return collect(
            DB::select('call SP_Alerts_GetAlertSourcesByAlertType(?)', $params)
        );
    }

    /**
     * @param array $params
     * @return array
     */
    public function createAlert(array $params)
    {
        return DB::select('call SP_Alerts_Create(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $params);
    }

    /**
     * @return Collection
     */
    public function getAlertTypesDescriptions(): Collection
    {
        return collect(
            DB::select('call SP_Alerts_GetAlertsTypes()')
        );
    }

    /**
     * @param array $params
     * @return array
     */
    public function deleteAlert(array $params): array
    {
        return DB::select('call SP_Alerts_Delete(?)', $params);
    }

    /**
     * @param array $params
     * @return Collection
     */
    public function getAlertServiceList(array $params): Collection
    {
        return collect(
            DB::select('call SP_Alerts_GetServicesList(?)', $params)
        );
    }

    /**
     * @param array $params
     * @return Collection
     */
    public function getResourceList(array $params)
    {
        return collect(
            DB::select('call SP_DB2_ResourcesList_Select(?)', $params)
        );
    }

    /**
     * @param array $params
     * @return Collection
     */
    public function getTagsByTagKey(array $params): Collection
    {
        return collect(
            DB::select('call SP_Alerts_GetTagValueByTagKey(?)', $params)
        );
    }

    /**
     * @param array $params
     * @return Collection
     */
    public function getTagList(array $params): Collection
    {
        return collect(
            DB::select('call SP_Alerts_GetTagsKeysAndValuesByParameters(?, ?, ?, ?)', $params)
        );
    }

    /**
     * @param array $params
     * @return Collection
     */
    public function getFrequencyListByAlertTypeId(array $params): Collection
    {
        return collect(
            DB::select('call SP_Alerts_GetFrequenciesByAlertTypeID(?)', $params)
        );
    }

    /**
     * @param array $params
     *
     * @return Collection|null
     */
    public function getAlertsHandledList(array $params): ?Collection
    {
        return collect(
            DB::select('call SP_Alerts_GetAlertHandled(?, ?, ?, ?)', $params)
        );
    }

    /**
     * @return Collection|null
     */
    public function getAlertStatusList(): ?Collection
    {
        return collect(
            DB::select('call SP_Alerts_GetStatusList()')
        );
    }

    /**
     * @param array $params
     *
     * @return Collection
     */
    public function getStatusReasonList(array $params): Collection
    {
        return collect(
            DB::select('call SP_Alerts_GetStatusReasonsList(?)', $params)
        );
    }

    /**
     * @param array $params
     *
     * @return array
     */
    public function updateAlertStatus(array $params): array
    {
        return DB::select('call SP_Alerts_UpdateBusinessAlertStatus(?, ?, ?, ?);', $params);
    }

    /**
     * @param array $params
     *
     * @return Collection
     */
    public function ssoByCertificate(array $params): Collection
    {
        return collect(
            DB::select('call SP_Validate_SSO_Certificate(?);', $params)
        );
    }

    /**
     * @param array $params
     *
     * @return Collection
     */
    public function destinationByClient(array $params): Collection
    {
        return collect(
            DB::select('call SP_Get_SSO_Destination_For_Client(?);', $params)
        );
    }

    public function azureAccountByClientId(array $params): array
    {
        return DB::select('call SP_AppRegistration_Select(?);', $params);
    }

    public function azureAccountAppListByClientId(array $params): array
    {
        return DB::select('call SP_AppRegistration_Select_AccountsAssignedOrUnAssigned(?);', $params);
    }

    public function azureAccountAppBulkLoad(array $params): array
    {
        return DB::select('call SP_BulkLoad_Accounts(?, ?);', $params);
    }

    public function azureAccountStore(array $params): array
    {
        return DB::select('call SP_Set_AppRegistration(?, ?, ?, ?, ?, ?);', $params);
    }
}
