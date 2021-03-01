<?php
namespace app\widgets\HistoryList\eventBuilders;

use app\models\Sms;

class SmsBuilder extends AbstractBuilder implements EventBuilderInterface
{
    public function getParams(): array
    {
        return [
            'user' => $this->model->user,
            'body' => $this->model->sms->message ? $this->model->sms->message : '',
            'footer' => $this->model->sms->direction == Sms::DIRECTION_INCOMING ?
                \Yii::t('app', 'Incoming message from {number}', [
                    'number' => $this->model->sms->phone_from ?? ''
                ]) : \Yii::t('app', 'Sent message to {number}', [
                    'number' => $this->model->sms->phone_to ?? ''
                ]),
            'iconIncome' => $this->model->sms->direction == Sms::DIRECTION_INCOMING,
            'footerDatetime' => $this->model->ins_ts,
            'iconClass' => 'icon-sms bg-dark-blue'
        ];
    }
}