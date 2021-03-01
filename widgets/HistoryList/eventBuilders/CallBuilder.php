<?php
namespace app\widgets\HistoryList\eventBuilders;

use app\models\Call;

class CallBuilder extends AbstractBuilder implements EventBuilderInterface
{
    public function getParams(): array
    {
        $model = $this->model;
        $call = $this->model->call;
        $answered = $call && $call->status == Call::STATUS_ANSWERED;

        return [
            'user' => $model->user,
            'content' => $call->comment ?? '',
            'body' => $this->getBody(),
            'footerDatetime' => $model->ins_ts,
            // not exist relation `applicant`, may be `customer`?
            'footer' => isset($call->customer) ? "Called <span>{$call->customer->name}</span>" : null,
            'iconClass' => $answered ? 'md-phone bg-green' : 'md-phone-missed bg-red',
            'iconIncome' => $answered && $call->direction == Call::DIRECTION_INCOMING
        ];
    }

    public function getBody(): string
    {
        return ($this->model->call ? $this->model->call->totalStatusText . (
            $this->model->call->getTotalDisposition(false) ?
                (" <span class='text-grey'>" . $this->model->call->getTotalDisposition(false) . "</span>") : ""
            ) : '<i>Deleted</i> '
        );
    }
}