<?php

namespace app\widgets\HistoryList\helpers;

use app\models\History;
use app\widgets\HistoryList\eventBuilders\EventBuilderInterface;

use app\widgets\HistoryList\eventBuilders\TaskBuilder;
use app\widgets\HistoryList\eventBuilders\SmsBuilder;
use app\widgets\HistoryList\eventBuilders\FaxBuilder;
use app\widgets\HistoryList\eventBuilders\CustomerBuilder;
use app\widgets\HistoryList\eventBuilders\CallBuilder;
use app\widgets\HistoryList\eventBuilders\DefaultBuilder;

class HistoryListHelper
{
    public static function getEventBuilder(History $model): EventBuilderInterface
    {
        switch ($model->event) {
            case History::EVENT_CREATED_TASK:
            case History::EVENT_COMPLETED_TASK:
            case History::EVENT_UPDATED_TASK:
                $eventBuilder = new TaskBuilder($model);
                break;
            case History::EVENT_INCOMING_SMS:
            case History::EVENT_OUTGOING_SMS:
                $eventBuilder = new SmsBuilder($model);
                break;
            case History::EVENT_OUTGOING_FAX:
            case History::EVENT_INCOMING_FAX:
                $eventBuilder = new FaxBuilder($model);
                break;
            case History::EVENT_CUSTOMER_CHANGE_TYPE:
            case History::EVENT_CUSTOMER_CHANGE_QUALITY:
                $eventBuilder = new CustomerBuilder($model);
                break;
            case History::EVENT_INCOMING_CALL:
            case History::EVENT_OUTGOING_CALL:
                $eventBuilder = new CallBuilder($model);
                break;
            default:
                $eventBuilder = new DefaultBuilder($model);
        }
        return $eventBuilder;
    }
}