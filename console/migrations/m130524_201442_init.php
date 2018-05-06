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

            'status' => $this->smallInteger()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%profile}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'avatar' => $this->string(),
            'ic_no' => $this->string(),
            'contact' => $this->string(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
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
            // $this->addForeignKey('fk'.$i++,'{{profile}}','id','{{user}}','id');
        $this->addExtraFk($i);
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

    public function addExtraFk($i) {
        $dbName = $this->getDbname($this->db);
        switch ($this->db->driverName) {
            case 'mysql':
            $userBy = "
            SELECT
                -- table_name as TABLE_NAME
                column_name as COLUMN_NAME
                , table_name as TABLE_NAME
            FROM information_schema.`COLUMNS`
            WHERE table_schema = '$dbName'
            AND table_name NOT IN  ('log')
            AND column_name LIKE '%by'
            AND column_name NOT LIKE '%deleted%'
            ";
            $approved = "
            SELECT
                -- table_name as TABLE_NAME
                column_name as COLUMN_NAME
                , table_name as TABLE_NAME
            FROM information_schema.`COLUMNS`
            WHERE table_schema = '$dbName'
            AND table_name NOT IN  ('log')
            AND column_name LIKE 'approved_id'
            ";
            break;
            case 'oci':
            $userBy = "
            -- SELECT
            -- TABLE_NAME
            -- FROM USER_TABLES
            -- UNION ALL
            -- SELECT
            -- VIEW_NAME AS TABLE_NAME
            -- FROM USER_VIEWS
            -- UNION ALL
            -- SELECT
            -- MVIEW_NAME AS TABLE_NAME
            -- FROM USER_MVIEWS
            -- ORDER BY TABLE_NAME
            ";

            break;
            default:
            $userBy = false;
            break;
        }
        if($userBy){
            $query = $this->db->createCommand($userBy)->queryAll();
            foreach ($query as $key => $value) {
                $this->addForeignKey('fk'.$i++,'{{'.$value['TABLE_NAME'].'}}',$value['COLUMN_NAME'],'{{user}}','id');
            }
        }
        if($approved){
            $query = $this->db->createCommand($approved)->queryAll();
            foreach ($query as $key => $value) {
                $this->addForeignKey('fk'.$i++,'{{'.$value['TABLE_NAME'].'}}',$value['COLUMN_NAME'],'{{approve_level}}','id');
            }
        }
    }

    public function addExtraIdx($i) {
        $dbName = $this->getDbname($this->db);
        switch ($this->db->driverName) {
            case 'mysql':
            $idx = "
            SELECT
                -- table_name as TABLE_NAME
                column_name as COLUMN_NAME
                , table_name as TABLE_NAME
            FROM information_schema.`COLUMNS`
            WHERE table_schema = '$dbName'
            AND table_name NOT IN  ('log')
            AND column_name LIKE '%_id'
            AND column_name LIKE '%_by'
            AND column_name LIKE 'deleted'
            AND column_name LIKE 'approved'
            AND column_name LIKE 'status'
            ";
            break;
            case 'oci':
            $userBy = "
            -- SELECT
            -- TABLE_NAME
            -- FROM USER_TABLES
            -- UNION ALL
            -- SELECT
            -- VIEW_NAME AS TABLE_NAME
            -- FROM USER_VIEWS
            -- UNION ALL
            -- SELECT
            -- MVIEW_NAME AS TABLE_NAME
            -- FROM USER_MVIEWS
            -- ORDER BY TABLE_NAME
            ";

            break;
            default:
            $userBy = false;
            break;
        }
/*        if($userBy){
            $query = $this->db->createCommand($userBy)->queryAll();
            foreach ($query as $key => $value) {
                $this->createIndex('fk'.$i++,'{{'.$value['TABLE_NAME'].'}}',$value['COLUMN_NAME']);
            }
        }
        if($approved){
            $query = $this->db->createCommand($approved)->queryAll();
            foreach ($query as $key => $value) {
                $this->createIndex('fk'.$i++,'{{'.$value['TABLE_NAME'].'}}',$value['COLUMN_NAME']);
            }
        }*/
        if($idx){
            $query = $this->db->createCommand($idx)->queryAll();
            foreach ($query as $key => $value) {
                $this->createIndex('fk'.$i++,'{{'.$value['TABLE_NAME'].'}}',$value['COLUMN_NAME']);
            }
        }

    }
}
