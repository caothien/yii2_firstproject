<?php

use yii\db\Migration;

/**
 * Handles the creation of table `staff`.
 */
class m161021_133414_create_staff_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('staff', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'age' => $this->integer()->notNull(),
            'gender' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'position' => $this->string()->notNull(),
            'avatar' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('staff');
    }
}
