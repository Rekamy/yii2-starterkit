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
            'username' => $this->string()->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull()->comment('password'),
            'password_reset_token' => $this->string(),
            'email' => $this->string()->notNull(),

            'remark' => $this->string(),
            'status' => $this->smallInteger()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%profile}}', [
            'user_id' => $this->primaryKey(),
            'name' => $this->string(),
            'ic_no' => $this->integer(),
            'contact' => $this->string(),
            'staff_no' => $this->string(),

            'remark' => $this->string(),
            'status' => $this->smallInteger()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);
        $this->createTable('{{%company}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(),
            'name' => $this->string()->notNull(),
            'logo' => $this->string(),
            'address' => $this->string(),
            'city' => $this->string(),
            'poscode' => $this->integer(),
            'state' => $this->string(),
            'country' => $this->string(),
            'contact' => $this->string(),
            'fax' => $this->string(),
            'email' => $this->string()->notNull(),
            'email_secondary' => $this->string(),

            'remark' => $this->string(),
            'status' => $this->smallInteger()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%branch}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(),
            'company_id' => $this->integer(),
            'name' => $this->string()->notNull(),
            'address' => $this->string(),
            'city' => $this->string(),
            'poscode' => $this->integer(),
            'state' => $this->string(),
            'country' => $this->string(),
            'contact' => $this->string(),
            'fax' => $this->string(),
            'email' => $this->string()->notNull(),
            'email_secondary' => $this->string(),

            'remark' => $this->string(),
            'status' => $this->smallInteger()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%company_pic}}', [
            'id' => $this->primaryKey(),
            'company_id' => $this->integer(),
            'branch_id' => $this->integer(),
            'user_id' => $this->integer(),

            'remark' => $this->string(),
            'status' => $this->smallInteger()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%location}}', [
            'id' => $this->primaryKey(),
            'company_id' => $this->integer(),
            'branch_id' => $this->integer(),
            'name' => $this->string(),

            'remark' => $this->string(),
            'status' => $this->smallInteger()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'order_no' => $this->string()->notNull(),
            'order_date' => $this->date(),
            'type' => $this->integer(),
            'company_id' => $this->integer(),
            'approved_at' => $this->timestamp(),
            'approved_by' => $this->integer(),

            'remark' => $this->string(),
            'status' => $this->integer()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%purchase}}', [
            'id' => $this->primaryKey(),
            'purchase_no' => $this->string()->notNull(),
            'purchase_date' => $this->date(),
            'company_id' => $this->integer()->comment('Supplier'),

            'remark' => $this->string(),
            'status' => $this->integer()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%asset}}', [
            'id' => $this->primaryKey(),
            'asset_no' => $this->string()->notNull(),
            'supplier_asset_no' => $this->string(),
            'manufacturer_asset_no' => $this->string(),
            'client_asset_no' => $this->string(),
            'order_date' => $this->date(),
            'supplier_id' => $this->integer(),
            'category' => $this->string(),
            'subcategory' => $this->string(),

            'remark' => $this->string(),
            'status' => $this->integer()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%movement}}', [
            'id' => $this->primaryKey(),
            'asset_id' => $this->integer()->notNull(),
            'type' => $this->string(),
            'date' => $this->date(),
            'from' => $this->integer(),
            'to' => $this->integer(),

            'remark' => $this->string(),
            'status' => $this->integer()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%maintenance}}', [
            'id' => $this->primaryKey(),
            'asset_id' => $this->integer()->notNull(),
            'type' => $this->string(),
            'date' => $this->date(),
            'supplier_id' => $this->integer(),

            'remark' => $this->string(),
            'status' => $this->integer()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%gen_type}}', [
            'id' => $this->primaryKey(),
            'gen_modref_code' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'description' => $this->string(),

            'remark' => $this->string(),
            'status' => $this->integer()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%gen_status}}', [
            'id' => $this->primaryKey(),
            'gen_modref_code' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'description' => $this->string(),

            'remark' => $this->string(),
            'status' => $this->integer()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%gen_mod}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'description' => $this->string(),

            'remark' => $this->string(),
            'status' => $this->integer()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%gen_modtype}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'description' => $this->string(),

            'remark' => $this->string(),
            'status' => $this->integer()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%gen_modref}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string()->notNull(),
            'gen_mod_id' => $this->integer()->notNull(),
            'gen_modtype_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'description' => $this->string(),

            'remark' => $this->string(),
            'status' => $this->integer()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%gen_modref_progress}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string()->notNull(),
            'next' => $this->string(),
            'return' => $this->string(),
            'description' => $this->string(),

            'remark' => $this->string(),
            'status' => $this->integer()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->insertFk();
        $this->insertIdx();
        $this->defaultData();
        $this->insertScenario();

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
        // custom idx
        $i = 1;
        $this->createIndex('idx_custom'.$i++,'user','username');
        $this->createIndex('idx_custom'.$i++,'setting','key');

        $this->addExtraIdx($i);
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
        if($idx){
            $query = $this->db->createCommand($idx)->queryAll();
            foreach ($query as $key => $value) {
                $this->createIndex('idx'.$i++,'{{'.$value['TABLE_NAME'].'}}',$value['COLUMN_NAME']);
            }
        }

    }
}
