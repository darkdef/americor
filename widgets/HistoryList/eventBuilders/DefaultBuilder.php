<?php
namespace app\widgets\HistoryList\eventBuilders;

class DefaultBuilder extends AbstractBuilder implements EventBuilderInterface
{
    public function getParams(): array
    {
        return [
            'user' => $this->model->user,
            'body' => $this->getBody(),
            'bodyDatetime' => $this->model->ins_ts,
            'iconClass' => 'fa-gear bg-purple-light'
        ];
    }
}