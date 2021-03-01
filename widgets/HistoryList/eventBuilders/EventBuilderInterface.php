<?php
namespace app\widgets\HistoryList\eventBuilders;

use app\models\History;

interface EventBuilderInterface
{
    public function __construct(History $model);

    public function getView(): string;
    public function getParams(): array;
    public function getBody(): string;
}