<?php
use yii\db\Migration;

class m200821_115200_create_jars6_expense_table extends Migration
{
    /**
     * @var string
     */
    private $_tableName;

    public function init()
    {
        parent::init();
        $this->_tableName = Yii::$app->getModule('jars6')->tableName;
    }

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            $this->_tableName,
            [
                'id' => $this->primaryKey(),
                'occur_date' => $this->datetime()->notNull(),
                'amount' => $this->integer(),
                'expense_item_id' => $this->integer(),
                'expense_item' => $this->string(),
                'expense_item_detail_id' => $this->integer(),
                'expense_item_detail' => $this->string(),
                'jars' => $this->tinyInteger(),
                'pay_method' => $this->tinyInteger(),
                'store_id' => $this->string(),
                'store' => $this->string(),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable($this->_tableName);
    }
}
