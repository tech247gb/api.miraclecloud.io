<?php


namespace App\Contract\Exception;


interface ValidationExceptionCodeInterface
{
    const DASHBOARD_VALIDATION_EXCEPTION = 4221;
    const CHART_DASHBOARD_VALIDATION_EXCEPTION = 4222;
    const YEAR_LIST_VALIDATION_EXCEPTION = 4223;
    const BUSINESS_UNIT_VALIDATION_EXCEPTION = 4224;
    const SUB_BUSINESS_UNIT_VALIDATION_EXCEPTION = 4225;
    const VENDOR_LIST_VALIDATION_EXCEPTION = 4226;
    const ACCOUNT_LIST_VALIDATION_EXCEPTION = 4227;
    const ACCOUNT_VALIDATION_EXCEPTION = 4228;
    const ACCOUNT_GET_VALIDATION_EXCEPTION = 4229;
    const LOGIN_VALIDATION_EXCEPTION = 4230;
    const ACCOUNT_ADD_VALIDATION_EXCEPTION = 4231;
    const ACCOUNT_UPDATE_VALIDATION_EXCEPTION = 4232;
    const BUSINESS_UNIT_CREATE_VALIDATION_EXCEPTION = 4233;
    const BUSINESS_UNIT_UPDATE_VALIDATION_EXCEPTION = 4234;
    const SUB_BUSINESS_UNIT_CREATE_VALIDATION_EXCEPTION = 4235;
    const SUB_BUSINESS_UNIT_UPDATE_VALIDATION_EXCEPTION = 4236;
    const DYNAMIC_CHART_VALIDATION_EXCEPTION = 4237;
    const DASHBOARD_TABLE_VALIDATION_EXCEPTION = 4238;
    const SERVICE_LIST_VALIDATION_EXCEPTION = 4239;

    // Alerts
    const ALERT_LIST_VALIDATION_EXCEPTION = 4250;
    const ALERT_SUSPEND_VALIDATION_EXCEPTION = 4251;
    const ALERT_UNSUSPEND_VALIDATION_EXCEPTION = 4252;
    const ALERT_CREATE_VALIDATION_EXCEPTION = 4253;
    const ALERT_SERVICE_LIST_VALIDATION_EXCEPTION = 4254;
    const ALERT_EXPORT_EXCEL_VALIDATION_EXCEPTION = 4255;
     // Notification
     const NOTIFICATION_LIST_VALIDATION_EXCEPTION = 4256;
     const NOTIFICATION_SUSPEND_VALIDATION_EXCEPTION = 4257;
     const NOTIFICATION_UNSUSPEND_VALIDATION_EXCEPTION = 4258;
     const NOTIFICATION_CREATE_VALIDATION_EXCEPTION = 4259;
     const NOTIFICATION_SERVICE_LIST_VALIDATION_EXCEPTION = 4261;
     const NOTIFICATION_EXPORT_EXCEL_VALIDATION_EXCEPTION = 4262;

    const OWNER_LIST_VALIDATION_EXCEPTION = 4260;

    const SOURCE_LIST_VALIDATION_EXCEPTION = 4270;

    const RESOURCE_LIST_VALIDATION_EXCEPTION = 4280;

    // Tag
    const TAG_LIST_VALIDATION_EXCEPTION = 4290;
    const TAG_VALUES_BY_TAG_KEY = 4291;

    const FREQUENCY_SHOW_BY_ALERT_TYPE_ID = 4300;

    // AlertHandle
    const ALERT_HANDLE_LIST_VALIDATION_EXCEPTION = 4320;

    // StatusReason
    const STATUS_REASON_LIST_VALIDATION_EXCEPTION = 4330;

    // AlertStatus
    const ALERT_STATUS_UPDATE_VALIDATION_EXCEPTION = 4340;

    //Azure Account
    public const AZURE_ACCOUNT_GET_BY_CLIENT_ID_EXCEPTION = 4350;
    public const AZURE_ACCOUNT_APP_LIST_BY_CLIENT_ID_EXCEPTION = 4351;
    public const AZURE_ACCOUNT_APP_LIST_EXCEPTION = 4352;
    public const AZURE_ACCOUNT_STORE_EXCEPTION = 4353;
    public const AZURE_ACCOUNT_APP_BULK_LOAD_EXCEPTION = 4354;
}
