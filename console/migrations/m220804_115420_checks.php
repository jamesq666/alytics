<?php

use yii\db\Migration;

/**
 * Class m220804_115420_checks
 */
class m220804_115420_checks extends Migration
{
    public function up()
    {
        $this->createTable('checks', [
            'id' => $this->primaryKey(),
            'date' => $this->integer(),
            'url' => $this->string(255),
            'http_code' => $this->smallInteger(3),
            'try' => $this->tinyInteger(2),
        ]);
    }

    public function down()
    {
        $this->dropTable('checks');
    }
}
