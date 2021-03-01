<?php
namespace app\widgets\HistoryList\eventBuilders;

use app\models\Customer;
use app\models\History;

class CustomerBuilder extends AbstractBuilder implements EventBuilderInterface
{
    public function getView(): string
    {
        return '_item_statuses_change';
    }

    public function getParams(): array
    {
        if ($this->model->event == History::EVENT_CUSTOMER_CHANGE_TYPE) {
            $additionalParams = [
                'oldValue' => Customer::getTypeTextByType($this->model->getDetailOldValue('type')),
                'newValue' => Customer::getTypeTextByType($this->model->getDetailNewValue('type'))
            ];
        } elseif ($this->model->event == History::EVENT_CUSTOMER_CHANGE_QUALITY) {
            $additionalParams = [
                'oldValue' => Customer::getQualityTextByQuality($this->model->getDetailOldValue('quality')),
                'newValue' => Customer::getQualityTextByQuality($this->model->getDetailNewValue('quality'))
            ];
        } else {
            $additionalParams = [];
        }

        return [
            'model' => $this->model,
        ] + $additionalParams;
    }
}