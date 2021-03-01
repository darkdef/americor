<?php

use yii\db\Migration;

/**
 * Class m210301_200549_add_index
 */
class m210301_200549_add_index extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('ins_ts_index', '{{%history}}', [new \yii\db\Expression('ins_ts desc')]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('ins_ts_index', '{{%history}}');
    }
}
