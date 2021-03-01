<?php
use app\models\search\HistorySearch;
use app\widgets\HistoryList\helpers\HistoryListHelper;

/** @var $this View */
/** @var $model HistorySearch */
$eventBuilder = HistoryListHelper::getEventBuilder($model);

echo $this->render($eventBuilder->getView(), $eventBuilder->getParams());
