<?php
namespace app\widgets\HistoryList\eventBuilders;

use app\models\History;

abstract class AbstractBuilder implements EventBuilderInterface
{
    protected $model;

    public function __construct(History $model)
    {
        $this->model = $model;
    }

    public function getView(): string
    {
        return '_item_common';
    }

    public function getParams(): array
    {
        return [
            'user' => $this->model->user,
            'body' => '',
            'iconClass' => '',
            'footerDatetime' => '',
            'footer' => ''
        ];
    }

    public function getBody(): string
    {
        return $this->model->eventText;
    }
}