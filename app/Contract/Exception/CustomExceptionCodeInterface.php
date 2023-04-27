<?php

declare(strict_types = 1);

namespace App\Contract\Exception;

/**
 * Interface CustomExceptionCodeInterface
 * @package App\Contract\Exception
 */
interface CustomExceptionCodeInterface
{

    const SUB_BUSINESS_UNIT_UPDATE_EXCEPTION = 5001;
    const SUB_BUSINESS_UNIT_DELETE_EXCEPTION = 5002;
    const BUSINESS_UNIT_UPDATE_EXCEPTION = 5003;
    const BUSINESS_UNIT_DELETE_EXCEPTION = 5004;

    const ALERT_SUSPEND_EXCEPTION = 5010;
    const ALERT_UNSUSPEND_EXCEPTION = 5011;
    const ALERT_CREATE_EXCEPTION = 5012;
    const ALERT_DELETE_EXCEPTION = 5013;
    const NOTIFICATION_CREATE_EXCEPTION = 5014;
    const NOTIFICATION_DELETE_EXCEPTION = 5015;

    // Tag
    const TAG_SHOW_EXCEPTION = 5020;
    const TAG_VALUES_BY_TAG_KEY_COMMAND = 5021;

    const POWER_BI_GET_EMBED_TOKEN_COMMAND_VALIDATION_EXCEPTION = 5030;

    // AlertHandle
    const ALERT_HANDLE_LIST_COMMAND = 5040;

    // StatusReason
    const STATUS_REASON_LIST_COMMAND = 5050;

    // AlertStatus
    const ALERT_STATUS_UPDATE_COMMAND = 5060;
    const ALERT_STATUS_UPDATE = 5061;
}
