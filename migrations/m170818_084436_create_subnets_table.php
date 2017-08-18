<?php

use yii\db\Migration;

/**
 * Handles the creation of table `subnets`.
 */
class m170818_084436_create_subnets_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('subnets', [
            'id' => $this->primaryKey(),
            'subnet_group_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'desc' => $this->text(),
            'network_address' => $this->string()->notNull(),
            'subnet_mask' => $this->string()->notNull(),
        ]);

        // creates index for column `author_id`
        $this->createIndex(
            'idx-subnets-subnet_group_id',
            'subnets',
            'subnet_group_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-subnets-subnet_group_id',
            'subnets',
            'subnet_group_id',
            'subnet_groups',
            'id',
            'CASCADE'
        );

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey(
            'fk-subnets-subnet_group_id',
            'subnet_groups'
        );

        $this->dropIndex(
            'idx-subnets-subnet_group_id',
            'subnet_groups'
        );

        $this->dropTable('subnets');
    }
}
