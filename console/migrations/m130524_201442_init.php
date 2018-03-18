<?php

use common\components\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $this->customDrop();
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->timestamp(),
            'updated_by' => $this->timestamp(),
            'deleted_by' => $this->timestamp(),
        ], $tableOptions);

        $this->createTable('{{%profile}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'ic_no' => $this->string(),
            'contact' => $this->string(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->timestamp(),
            'updated_by' => $this->timestamp(),
            'deleted_by' => $this->timestamp(),
        ], $tableOptions);

        $this->createTable('{{%setting}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string(),
            'label' => $this->string(),
            'value' => $this->string(),
            'description' => $this->string(),

            'remark' => $this->string(),
            'status' => $this->smallInteger()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

            $this->insertFk();
            $this->insertIdx();
            $this->defaultScenario();
        }

        public function down()
        {
            $this->customDrop();
        }

        public function insertFk() {
            $i = 1;
            $this->addForeignKey('fk'.$i++,'{{user}}','id','{{profile}}','id');
            $this->addForeignKey('fk'.$i++,'{{profile}}','id','{{user}}','id');

        // $this->addForeignKey('fk'.$i++,'{{branch}}','company_id','{{company}}','id');
        // $this->addForeignKey('fk'.$i++,'{{location}}','company_id','{{company}}','id');
        // $this->addForeignKey('fk'.$i++,'{{efies}}','company_id','{{company}}','id');
        // $this->addForeignKey('fk'.$i++,'{{company_pic}}','company_id','{{company}}','id');
        // $this->addForeignKey('fk'.$i++,'{{company_pic}}','user_id','{{user}}','id');
        // $this->addForeignKey('fk'.$i++,'{{user_attachment}}','user_id','{{user}}','id');
        }

        public function insertIdx() {
        // pk idx
            $i = 1;
            $this->createIndex('idx'.$i++,'user','id');
            $this->createIndex('idx'.$i++,'profile','id');
            $this->createIndex('idx'.$i++,'setting','id');

        // deleted idx
            $i = 1;
            $this->createIndex('idx_deleted'.$i++,'user','deleted_by');
            $this->createIndex('idx_deleted'.$i++,'profile','deleted_by');

        // custom idx
            $i = 1;
            $this->createIndex('idx_custom'.$i++,'user','username');
            $this->createIndex('idx_custom'.$i++,'setting','key');
        }

        public function defaultScenario() {
            $this->batchInsert('{{user}}',['username','email','password_hash','auth_key'],[
                ['admin1','admin1@mail.com',\Yii::$app->security->generatePasswordHash('admin1'),\Yii::$app->security->generateRandomString()],
            ]);
            $this->batchInsert('{{profile}}',['name','ic_no','contact','email'],[
                ['admin1','910207065155','0132059953','admin1@mail.com'],
            ]);
            $this->batchInsert('{{setting}}',['label','description','key','value'],[
                ['Default themes','Default theme will be use if no theme is set.','defaultTheme','adminlte'],
                ['Testing email','Testing email are use for testing mailing purpose.','testEmail','admin@example.com'],
            ]);
        }
    }
