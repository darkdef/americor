<?php
namespace app\widgets\HistoryList\eventBuilders;

class TaskBuilder extends AbstractBuilder implements EventBuilderInterface
{
    public function getParams(): array
    {
        return [
            'user' => $this->model->user,
            'body' => $this->getBody(),
            'iconClass' => 'fa-check-square bg-yellow',
            'footerDatetime' => $this->model->ins_ts,
            // In next line - change `task->customerCreditor` to `task->customer`
            'footer' => isset($this->model->task->customer->name) ? "Creditor: " . $this->model->task->customer->name : ''
        ];
    }

    public function getBody(): string
    {
        return "{$this->model->eventText}: " . ($this->model->task->title ?? '');
    }
}