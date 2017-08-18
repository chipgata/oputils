<?php

use yii\db\Migration;

/**
 * Handles the creation of table `subnet_groups`.
 */
class m170818_082425_create_subnet_groups_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('subnet_groups', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'desc' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('subnet_groups');
    }
}
