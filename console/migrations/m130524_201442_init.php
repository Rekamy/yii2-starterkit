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
            'status_id' => $this->integer()->defaultValue(2)->comment('Status'),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%profile}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->comment('User'),
            'name' => $this->string(),
            'ic_no' => $this->string(),
            'contact' => $this->string(),
            'staff_no' => $this->string(),
            'email' => $this->string(),

            'remark' => $this->string(),
            'status_id' => $this->integer()->defaultValue(1)->comment('Status'),
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

            'remark' => $this->string(),
            'status_id' => $this->integer()->defaultValue(1)->comment('Status'),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%location}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(),
            'company_id' => $this->integer()->comment('Company'),
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
            'status_id' => $this->integer()->defaultValue(1)->comment('Status'),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%person_in_charge}}', [
            'id' => $this->primaryKey(),
            'location_id' => $this->integer()->comment('Location'),
            'profile_id' => $this->integer()->comment('User'),

            'remark' => $this->string(),
            'status_id' => $this->integer()->defaultValue(1)->comment('Status'),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%transaction}}', [
            'id' => $this->primaryKey(),
            'type' => $this->integer()->notNull(),
            'date' => $this->date(),

            'remark' => $this->string(),
            'status_id' => $this->integer()->defaultValue(1)->comment('Status'),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%diposal}}', [
            'id' => $this->primaryKey(),
            'transaction_id' => $this->integer()->comment('Transaction'),
            'order_no' => $this->string()->notNull(),
            'order_date' => $this->date(),
            'attend_date' => $this->date(),
            'type_id' => $this->integer()->comment('Type'),
            'order_by' => $this->integer(),
            'attend_by' => $this->integer(),
            'approved_at' => $this->timestamp(),
            'approved_by' => $this->integer(),
            'disposed_at' => $this->timestamp(),
            'disposed_by' => $this->integer(),

            'remark' => $this->string(),
            'status_id' => $this->integer()->defaultValue(1)->comment('Status'),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%diposal_item}}', [
            'id' => $this->primaryKey(),
            'disposal_id' => $this->integer()->comment('Disposal'),
            'item_id' => $this->integer()->comment('Item'),
            'order_no' => $this->string()->notNull(),
            'order_date' => $this->date(),
            'attend_date' => $this->date(),
            'type_id' => $this->integer()->comment('Type'),
            'reason_id' => $this->integer()->comment('Reason'),
            'method_id' => $this->integer()->comment('Method'),
            'order_by' => $this->integer(),
            'attend_by' => $this->integer(),
            'approved_at' => $this->timestamp(),
            'approved_by' => $this->integer(),

            'remark' => $this->string(),
            'status_id' => $this->integer()->defaultValue(1)->comment('Status'),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'transaction_id' => $this->integer()->comment('Transaction'),
            'order_no' => $this->string()->notNull(),
            'order_date' => $this->date(),
            'attend_date' => $this->date(),
            'type_id' => $this->integer()->comment('Type'),
            'seller_id' => $this->integer()->comment('Supplier'),
            'buyyer_id' => $this->integer()->comment('Company'),
            'order_by' => $this->integer(),
            'attend_by' => $this->integer(),
            'approved_at' => $this->timestamp(),
            'approved_by' => $this->integer(),

            'remark' => $this->string(),
            'status_id' => $this->integer()->defaultValue(1)->comment('Status'),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%order_item}}', [
            'id' => $this->primaryKey(),
            'type_id' => $this->integer()->comment('Type'),
            'order_id' => $this->integer()->notNull()->comment('Order No'),
            'item_id' => $this->integer()->notNull()->comment('Item'),
            'rq_quantity' => $this->integer()->notNull(),
            'app_quantity' => $this->integer(),
            'approved_at' => $this->timestamp(),
            'approved_by' => $this->integer(),

            'remark' => $this->string(),
            'status_id' => $this->integer()->defaultValue(1)->comment('Status'),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->string(),

            'remark' => $this->string(),
            'status_id' => $this->integer()->defaultValue(1)->comment('Status'),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%subcategory}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->string(),

            'remark' => $this->string(),
            'status_id' => $this->integer()->defaultValue(1)->comment('Status'),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%jt_subcategory}}', [
            'category_id' => $this->integer()->notNull()->comment('Category'),
            'subcategory_id' => $this->integer()->notNull()->comment('Subcategory'),

            'remark' => $this->string(),
            'status_id' => $this->integer()->defaultValue(1)->comment('Status'),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->addPrimaryKey('pk_subcategory', '{{%jt_subcategory}}', ['category_id', 'subcategory_id']);

        $this->createTable('{{%asset}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->comment('Category'),
            'subcategory_id' => $this->integer()->comment('Subcategory'),
            'asset_no' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),

            'supplier_id' => $this->integer()->comment('Supplier'),
            'supplier_code_no' => $this->string(),
            'manufacturer_id' => $this->integer()->comment('Manufacturer'),
            'manufacturer_code_no' => $this->string(),

            'disposal_item_id' => $this->integer()->comment(''),

            'remark' => $this->string(),
            'status_id' => $this->integer()->defaultValue(1)->comment('Status'),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%inventory}}', [
            'id' => $this->primaryKey(),
            'code_no' => $this->string()->notNull(),
            'card_no' => $this->string()->notNull(),
            'category_id' => $this->integer()->comment('Category'),
            'subcategory_id' => $this->integer()->comment('Subcategory'),
            'description' => $this->string()->notNull(),

            'remark' => $this->string(),
            'status_id' => $this->integer()->defaultValue(1)->comment('Status'),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%inventory_item}}', [
            'id' => $this->primaryKey(),
            'code_no' => $this->integer(),
            'card_no' => $this->string()->notNull(),
            'serial_no' => $this->string()->notNull(),

            'checkin_id' => $this->integer()->comment('Checkin ID'),
            'checkout_id' => $this->integer()->comment('Checkout ID'),

            'supplier_id' => $this->integer()->comment('Supplier'),
            'supplier_code_no' => $this->string(),
            'manufacturer_id' => $this->integer()->comment('Manufacturer'),
            'manufacturer_code_no' => $this->string(),
            'client_id' => $this->integer()->comment('Client'),
            'client_code_no' => $this->string(),

            'disposal_item_id' => $this->integer()->comment('Disposal ID'),

            'remark' => $this->string(),
            'status_id' => $this->integer()->defaultValue(1)->comment('Status'),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%movement}}', [
            'id' => $this->primaryKey(),
            'item_id' => $this->integer()->notNull()->comment('Item'),
            'type_id' => $this->integer()->comment('Type'),
            'date' => $this->date(),
            'from' => $this->integer(),
            'to' => $this->integer(),

            'remark' => $this->string(),
            'status_id' => $this->integer()->defaultValue(1)->comment('Status'),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%maintenance}}', [
            'id' => $this->primaryKey(),
            'item_id' => $this->integer()->notNull()->comment('Item'),
            'type_id' => $this->integer()->comment('Type'),
            'date' => $this->date(),
            'supplier_id' => $this->integer()->comment('Supplier'),

            'remark' => $this->string(),
            'status_id' => $this->integer()->defaultValue(1)->comment('Status'),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%warranty}}', [
            'id' => $this->primaryKey(),
            'item_id' => $this->integer()->notNull()->comment('Item'),
            'supplier_id' => $this->integer()->comment('Supplier'),
            'type_id' => $this->integer()->comment('Type'),
            'start_date' => $this->date(),
            'end_date' => $this->date(),

            'remark' => $this->string(),
            'status_id' => $this->integer()->defaultValue(1)->comment('Status'),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%setting}}', [
            'id' => $this->primaryKey(),
            'label' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
            'key' => $this->string()->notNull(),
            'value' => $this->string()->notNull(),
            'start_date' => $this->date(),
            'end_date' => $this->date(),

            'remark' => $this->string(),
            'status_id' => $this->integer()->defaultValue(1)->comment('Status'),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('{{%gen_value}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string()->notNull()->comment('General Module Refference'),
            'name' => $this->string()->notNull(),
            'description' => $this->string(),

            'remark' => $this->string(),
            'status_id' => $this->integer()->defaultValue(1)->comment('Status'),
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
            'status_id' => $this->integer()->defaultValue(1)->comment('Status'),
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
            'status_id' => $this->integer()->defaultValue(1)->comment('Status'),
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
            'gen_mod_id' => $this->integer()->notNull()->comment('General Module'),
            'gen_modtype_id' => $this->integer()->notNull()->comment('General Module Type'),
            'name' => $this->string()->notNull(),
            'description' => $this->string(),

            'remark' => $this->string(),
            'status_id' => $this->integer()->defaultValue(1)->comment('Status'),
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
            'status_id' => $this->integer()->defaultValue(1)->comment('Status'),
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
        // $this->defaultScenario();
        $this->insertScenario();

    }

    public function down()
    {
        $this->customDrop();
    }

    public function insertFk() {
        $i = 1;
        $this->addForeignKey('fk'.$i++,'{{order}}','seller'.'_id','{{company}}','id');
        $this->addForeignKey('fk'.$i++,'{{order}}','buyyer'.'_id','{{company}}','id');
        $this->addForeignKey('fk'.$i++,'{{asset}}','supplier'.'_id','{{company}}','id');
        $this->addForeignKey('fk'.$i++,'{{asset}}','manufacturer'.'_id','{{company}}','id');
        $this->addForeignKey('fk'.$i++,'{{inventory_item}}','supplier'.'_id','{{company}}','id');
        $this->addForeignKey('fk'.$i++,'{{inventory_item}}','manufacturer'.'_id','{{company}}','id');
        $this->addForeignKey('fk'.$i++,'{{inventory_item}}','client'.'_id','{{company}}','id');
        $this->addForeignKey('fk'.$i++,'{{inventory_item}}','checkin'.'_id','{{order_item}}','id');
        $this->addForeignKey('fk'.$i++,'{{inventory_item}}','checkout'.'_id','{{order_item}}','id');
        $this->addExtraFk($i);
    }

    public function insertIdx() {
        // custom idx
        $i = 1;
        $this->createIndex('idx_custom'.$i++,'user','username');
        $this->createIndex('idx_custom'.$i++,'setting','key');

        $this->addExtraIdx($i);
    }

    public function addExtraFk($i) {
        $dbName = $this->getDbname($this->db);
        switch ($this->db->driverName) {
            case 'mysql':
            $fk['common'] = "
            SELECT
            -- table_name as TABLE_NAME
            column_name AS COLUMN_NAME
            , table_name AS TABLE_NAME
            , SUBSTRING(column_name, 1, LENGTH(column_name)-3) REF_TABLE
            FROM information_schema.`COLUMNS`
            WHERE table_schema = '$dbName'
            AND column_name LIKE '%_id'
            AND table_name NOT LIKE '%auth%'
            AND table_name NOT LIKE '%log%'
            AND table_name NOT LIKE 'gen%'
            AND SUBSTRING(column_name, 1, LENGTH(column_name)-3) IN (
            SELECT table_name 
            FROM information_schema.`tables` 
            WHERE table_schema = '$dbName'
            )
            ";
            $fk['profileBy'] = "
            SELECT
            -- table_name as TABLE_NAME
            column_name as COLUMN_NAME
            , table_name as TABLE_NAME
            FROM information_schema.`COLUMNS`
            WHERE table_schema = '$dbName'
            AND table_name NOT IN  ('log')
            AND column_name LIKE '%_by'
            AND column_name NOT LIKE '%deleted%'
            ";
            $fk['approved'] = "
            SELECT
            -- table_name as TABLE_NAME
            column_name as COLUMN_NAME
            , table_name as TABLE_NAME
            FROM information_schema.`COLUMNS`
            WHERE table_schema = '$dbName'
            AND table_name NOT IN  ('log')
            AND column_name LIKE 'approved_id'
            ";
            $fk['genval'] = "
            SELECT
            -- table_name as TABLE_NAME
            column_name AS COLUMN_NAME
            , table_name AS TABLE_NAME
            FROM information_schema.`COLUMNS`
            WHERE table_schema = '$dbName'
            AND table_name NOT IN  ('log')
            AND table_name NOT LIKE 'auth%'
            AND table_name NOT LIKE 'gen%'
            AND (
            column_name LIKE '%status%'
            OR column_name LIKE '%method%'
            OR column_name LIKE '%reason%'
            OR column_name LIKE '%type%'
            )
            ";
            break;
            default:
            $fk = false;
            break;
        }
        if($fk) {
            if($fk['profileBy']){
                $query = $this->db->createCommand($fk['profileBy'])->queryAll();
                foreach ($query as $key => $value) {
                    $this->addForeignKey('fk'.$i++,'{{'.$value['TABLE_NAME'].'}}',$value['COLUMN_NAME'],'{{profile}}','id');
                }
            }
            if($fk['approved']){
                $query = $this->db->createCommand($fk['approved'])->queryAll();
                foreach ($query as $key => $value) {
                    $this->addForeignKey('fk'.$i++,'{{'.$value['TABLE_NAME'].'}}',$value['COLUMN_NAME'],'{{approve_level}}','id');
                }
            }
            if($fk['common']){
                $query = $this->db->createCommand($fk['common'])->queryAll();
                foreach ($query as $key => $value) {
                    $this->addForeignKey('fk'.$i++,'{{'.$value['TABLE_NAME'].'}}',$value['COLUMN_NAME'],$value['REF_TABLE'],'id');
                }
            }
            if($fk['genval']){
                $query = $this->db->createCommand($fk['genval'])->queryAll();
                foreach ($query as $key => $value) {
                    $this->addForeignKey('fk'.$i++,'{{'.$value['TABLE_NAME'].'}}',$value['COLUMN_NAME'],'{{gen_value}}','id');
                }
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
            AND table_name NOT like  'gen_%'
            AND column_name LIKE '%_id'
            AND column_name LIKE '%_by'
            AND column_name LIKE 'approved'
            AND column_name LIKE 'status'
            AND column_name LIKE 'type'
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

    public function insertScenario() {
        $this->batchInsert('{{user}}',['username','email','password_hash','auth_key','status_id'],[
            ['sarraglobal','support@sarraglobal.com',\Yii::$app->security->generatePasswordHash('#SarraSisApp_2018'),\Yii::$app->security->generateRandomString(),1],
        ]);
        $this->batchInsert('{{profile}}',['user_id','name','ic_no','contact','email'],[
            [1,'Superadmin','910207065155','0132059953','support@sarraglobal.com'],
        ]);
        $this->batchInsert('{{setting}}',['label','description','key','value'],[
            ['Default themes','Default theme will be use if no theme is set.','defaultTheme','adminlte'],
            ['Testing email','Testing email are use for testing mailing purpose.','testEmail','admin@example.com'],
        ]);
        $this->batchInsert('{{user}}',['username','email','password_hash','auth_key','created_at','status_id'],[
            ['staf1','staf1@mail.com',Yii::$app->security->generatePasswordHash('staf1'),Yii::$app->security->generateRandomString(),new \yii\db\Expression('CURRENT_TIMESTAMP'),1],
            ['staf2','staf2@mail.com',Yii::$app->security->generatePasswordHash('staf2'),Yii::$app->security->generateRandomString(),new \yii\db\Expression('CURRENT_TIMESTAMP'),1],
            ['pic1','pic1@mail.com',Yii::$app->security->generatePasswordHash('pic1'),Yii::$app->security->generateRandomString(),new \yii\db\Expression('CURRENT_TIMESTAMP'),1],
            ['pic2','pic2@mail.com',Yii::$app->security->generatePasswordHash('pic2'),Yii::$app->security->generateRandomString(),new \yii\db\Expression('CURRENT_TIMESTAMP'),2],
            ['pic3','pic3@mail.com',Yii::$app->security->generatePasswordHash('pic3'),Yii::$app->security->generateRandomString(),new \yii\db\Expression('CURRENT_TIMESTAMP'),2],
        ]);
        $this->batchInsert('{{profile}}',['name'],[
            ['staf1'],
            ['staf2'],
            ['pic1'],
            ['pic2'],
            ['pic3'],
            ['pic4'],
            ['pic5'],
        ]);
        $this->batchInsert('{{company}}',['name'],[
            ['company A'],
            ['company B'],
            ['company C'],
        ]);
        $this->batchInsert('{{location}}',['company_id','name','email'],[
            [1,'Site A-1','a@mail.com'],
            [1,'Site A-1','a@mail.com'],
            [2,'Site B-1','b@mail.com'],
            [3,'Branch C-1','c@mail.com'],
            [3,'Branch C-1','c@mail.com'],
            [3,'Branch C-1','c@mail.com'],
        ]);
        $this->batchInsert('{{person_in_charge}}',['location_id','profile_id'],[
            [1,4],
            [2,4],
            [3,5],
            [4,6],
            [5,6],
            [6,7],
        ]);
        $this->batchInsert('{{category}}',['name'],[
            ['Category 01'],
            ['Category 02'],
        ]);
        $this->batchInsert('{{subcategory}}',['name'],[
            ['Subcategory 01'],
            ['Subcategory 02'],
            ['Subcategory 03'],
        ]);
        $this->batchInsert('{{jt_subcategory}}',['category_id','subcategory_id'],[
            [1,1],
            [1,2],
            [2,1],
            [2,3],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function defaultData()
    {
        $this->batchInsert('{{%gen_mod}}', ['id','code','name'], [
            [1,'01','General'],
            [2,'02','Order'],
            [3,'03','Asset'],
            [4,'04','Inventory'],
            [5,'05','Maintenance'],
            [6,'06','Warranty'],
            [7,'07','Disposal'],
            [8,'08','Company'],
            [9,'09','Location'],
            [10,'10','Placement'],
            [11,'11','Transaction'],
            [12,'12','Order Item'],
        ]);

        $this->batchInsert('{{%gen_modtype}}', ['id','code','name'], [
            [1,'01','Status'],
            [2,'02','Progress'],
            [3,'03','Type'],
            [4,'04','Reason'],
            [5,'05','Method'],
        ]);

        $this->batchInsert('{{%gen_value}}', ['code','name'], [
            // General status
            ['0101','ACTIVE'],
            ['0101','INACTIVE'],
            
            // General progress
            ['0102','NEW'],
            ['0102','PENDING'],
            ['0102','WAITING FOR APPROVAL'],
            ['0102','COMPLETED'],
            
            // General type
            ['0103','GENERAL'],

            // order status
            ['0201','NEW'],
            ['0201','RECEIVED'],
            
            // order progress
            ['0202','PENDING'],
            ['0202','WAITING FOR APPROVAL'],
            ['0202','DELIVERING'],
            ['0202','DELIVERED'],
            
            // order type
            ['0203','ASSET PURCHASE'],
            ['0203','ASSET RENTAL'],
            ['0203','ASSET PLACEMENT'],
            ['0203','INVENTORY CHECKIN'],
            ['0203','INVENTORY CHECKOUT'],

            // asset status
            ['0301','ACTIVE'],
            ['0301','INACTIVE'],
            ['0301','DISPOSED'],
            
            // asset progress
            ['0302','PENDING'],
            ['0302','WAITING FOR APPROVAL'],
            ['0302','DELIVERING'],
            ['0302','DELIVERED'],
            
            // asset type
            ['0303','PURCHASE'],
            ['0303','RENTAL'],
            ['0303','PLACEMENT'],

            // inventory status
            ['0401','NEW'],
            ['0401','RECEIVED'],
            
            // inventory progress
            ['0402','PENDING'],
            ['0402','WAITING FOR APPROVAL'],
            ['0402','DELIVERING'],
            ['0402','DELIVERED'],
            ['0402','WAITING FOR PICKUP'],
            ['0402','RECEIVED'],
            ['0402','IN PROGRESS'],
            ['0402','COMPLETED'],
            ['0402','RETURNED'],
            
            // inventory type
            ['0403','PURCHASE'],
            ['0403','RENTAL'],
            ['0403','PLACEMENT'],

            // maintenance status
            ['0501','NEW'],
            ['0501','COMPLETED'],
            
            // maintenance progress
            ['0502','PENDING'],
            ['0502','WAITING FOR APPROVAL'],
            ['0502','MAINTENANCE COMPLETED'],
            ['0502','DELIVERING'],
            ['0502','DELIVERED'],
            
            // maintenance type
            ['0503','PURCHASE'],
            ['0503','RENTAL'],
            ['0503','PLACEMENT'],

            // warranty status
            ['0601','ACTIVE'],
            ['0601','INACTIVE'],
            
            // warranty progress
            ['0602','PENDING'],
            ['0602','WAITING FOR APPROVAL'],
            ['0602','DELIVERING'],
            ['0602','DELIVERED'],
            
            // warranty type
            ['0603','SCHEDULED SCHEME'],
            ['0603','LIFETIME'],

            // disposal status
            ['0701','NEW'],
            ['0701','COMPLETED'],
            
            // disposal progress
            ['0702','PENDING'],
            ['0702','WAITING FOR APPROVAL'],
            ['0702','DIPOSED'],
            
            // disposal type
            // ['0703','SCHEDULED SCHEME'],

            // disposal reason
            ['0704','BROKEN'],
            ['0704','MANUFACTURER DEFECT'],
            ['0704','EXPIRED'],

            // disposal method
            ['0705','SELL'],
            ['0705','DISPOSE'],

            // order item type
            ['1203','ASSET'],
            ['1203','INVENTORY'],
        ]);

        $this->batchInsert('{{%gen_modref}}', ['code','gen_mod_id','gen_modtype_id','name'], [
            ['0101',1,1,'General Status'],
            ['0102',1,2,'General Progress'],
            ['0103',1,3,'General Type'],

            ['0201',2,1,'Order Status'],
            ['0202',2,2,'Order Progress'],
            ['0203',2,3,'Order Type'],

            ['0301',3,1,'Asset Status'],
            ['0302',3,2,'Asset Progress'],
            ['0303',3,3,'Asset Type'],

            ['0401',4,1,'Inventory Status'],
            ['0402',4,2,'Inventory Progress'],
            ['0403',4,3,'Inventory Type'],

            ['0501',5,1,'Maintenance Status'],
            ['0502',5,2,'Maintenance Progress'],
            ['0503',5,3,'Maintenance Type'],

            ['0601',6,1,'Warranty Status'],
            ['0602',6,2,'Warranty Progress'],
            ['0603',6,3,'Warranty Type'],
        ]);

    }
}
