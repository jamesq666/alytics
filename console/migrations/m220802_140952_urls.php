<?php

use yii\db\Migration;

/**
 * Class m220802_140952_urls
 */
class m220802_140952_urls extends Migration
{
    public function up()
    {
        $this->createTable('urls', [
            'id' => $this->primaryKey(),
            'date' => $this->integer(),
            'url' => $this->string(255)->unique(),
            'periodicity' => $this->tinyInteger(2),
            'try' => $this->tinyInteger(2),
        ]);
    }

    public function down()
    {
        $this->dropTable('urls');
    }
}
