<?php
namespace console\controllers;

use Yii;
use yii\helpers\Console;
use common\components\Migration;
use yii\console\Controller;
use yii\console\controllers\MigrateController as BaseMigrateController;

class MigrateController extends BaseMigrateController
{

	public function actionReset()
	{
		$migrate = new Migration();
		$migrate->reset();
		return 1;
	}


	public function actionAuth2() {
		$migrate = new Migration();
		$auth = Yii::$app->authManager;

		if($auth) {
			$this->stdOut("Remove all auth settings\n");
			$auth->removeAll();
		}
		$roleList = [
			'Administrator',
			'Asset Admin',
			'Asset User',
			'Store Admin',
			'Store User',
		];
		$authList = [
			// profile
			'profile_admin',
			'profile_create',
			'profile_edit',
			'profile_delete',
			'profile_delete_permanent',

			'setting_admin',
			'setting_create',
			'setting_edit',
			'setting_delete',
			'setting_delete_permanent',

			'report_generate',

		];

		foreach ($authList as $key => $permission) {
			$createPermission = $auth->createPermission($permission);
			$createPermission->description = str_replace($permission, '_', ' ');
			$auth->add($createPermission);
			$this->stdOut("Add permission : $createPermission->name\n");
		}
		foreach ($roleList as $key => $role) {
			$createRole = $auth->createRole($role);
			$createRole->description = $role;
			$auth->add($createRole);
			$this->stdOut("Add role : $createRole->name\n");
		}

		$administrator = $auth->getRole('Administrator');
		$auth->assign($administrator, 1);
		$this->stdOut("Append $administrator->name to Admin User\n");
		foreach ($authList as $key => $permisson) {
			$permissionRule = $auth->getPermission($permisson);
			$auth->addChild($administrator, $permissionRule);
			$this->stdOut("Append $permissionRule->name to $administrator->name User\n");
		}

	}

	public function actionAuth() {
		$migrate = new Migration();
		$auth = Yii::$app->authManager;

		if($auth) {
			$this->stdOut("Remove all auth settings\n");
			$auth->removeAll();
		}

		// add crud permission : add table name that require complex user management
		// get all table
		$query = new \yii\db\Query();
		switch (Yii::$app->db->driverName) {
			case 'oci':
			$query->from('USER_TABLES')
			->select('TABLE_NAME as "table_name"')
			->where(['owner'=>$migrate->dbName]);
			break;

			default: // default to mysql
			$query->from('information_schema.tables')
			->select('table_name')
			->where(['table_schema'=>$migrate->dbName]);
			break;
		}
		$query->andWhere(['not like','table_name','migration'])
		->andWhere(['not like','table_name','log'])
		->andWhere(['not like','table_name','auth'])
		// ->andWhere(['not in','table_name',$crudModules])
		->all();

		foreach ($query->each() as $key => $value) {
			$crudModules[] = $value['table_name'];
		}
		var_dump($crudModules);die;
		foreach ($crudModules as $key => $module) {
			$this->stdOut("Add permission : $module\n", Console::FG_RED, Console::UNDERLINE);
			$this->addCrudPermission($module,$auth);
			$this->stdOut("Permission for $module added\n\n", Console::FG_GREEN, Console::UNDERLINE);
		}

		// add admin permission : add table that not included in crud permission
		// $query = new \yii\db\Query();
		// switch (Yii::$app->db->driverName) {
		// 	case 'oci':
		// 	$query->from('USER_TABLES')
		// 	->select('TABLE_NAME as "table_name"')
		// 	->where(['owner'=>$migrate->dbName]);
		// 	break;

		// 	default: // default to mysql
		// 	$query->from('information_schema.tables')
		// 	->select('table_name')
		// 	->where(['table_schema'=>$migrate->dbName]);
		// 	break;
		// }
		// $query->andWhere(['not in','table_name',$crudModules])
		// ->andWhere(['not like','table_name','auth'])
		// ->andWhere(['not like','table_name','migration'])
		// ->all();

		// foreach ($query->each() as $key => $value) {
		// 	$adminModules[] = $value['table_name'];
		// }

		// foreach ($adminModules as $key => $module) {
		// 	$this->stdOut("Add permission for $module\n", Console::FG_RED, Console::UNDERLINE);
		// 	$this->addSimplePermission($module,$auth);
		// 	$this->stdOut("Permission for $module added\n\n", Console::FG_GREEN, Console::UNDERLINE);
		// }

		// assign default role to admin
		$roleList = \common\models\AuthItem::find()->select('name')->where(['like','name','_admin'])->asArray()->all();
		foreach ($roleList as $key => $value) {
			$defaultAdminPermissions[] = $value['name'];
		}
		$this->assignDefaultUserPermission($defaultAdminPermissions,1);

		return true;
	}

	public function addCrudPermission($module,$auth) {
        // add "createModule" permission
		$createModule = $auth->createPermission('create_'.$module);
		$createModule->description = 'Create a '.$module;
		$auth->add($createModule);
		$this->stdOut("Add permission : $createModule->name\n");

        // add "updateModule" permission
		$updateModule = $auth->createPermission('update_'.$module);
		$updateModule->description = 'Update '.$module;
		$auth->add($updateModule);
		$this->stdOut("Add permission : $updateModule->name\n");

        // add "viewModule" permission
		$viewModule = $auth->createPermission('view_'.$module);
		$viewModule->description = 'View '.$module;
		$auth->add($viewModule);
		$this->stdOut("Add permission : $viewModule->name\n");

        // add "viewAllModule" permission
		$viewAllModule = $auth->createPermission('view_all_'.$module);
		$viewAllModule->description = 'View all '.$module;
		$auth->add($viewAllModule);
		$auth->addChild($viewAllModule,$viewModule);
		$this->stdOut("Add permission : $viewAllModule->name\n");

        // add "deleteModule" permission
		$deleteModule = $auth->createPermission('delete_'.$module);
		$deleteModule->description = 'Delete '.$module;
		$auth->add($deleteModule);
		$this->stdOut("Add permission : $deleteModule->name\n");

        // add "noDeleteModule" permission
		$noDeleteModule = $auth->createPermission('no_delete_'.$module);
		$noDeleteModule->description = 'Forbidden delete on '.$module;
		$auth->add($noDeleteModule);
		$this->stdOut("Add permission : $noDeleteModule->name\n");

        // add "author" role and give this role the "createModule" permission
		$author = $auth->createRole($module.'_author');
		$this->stdOut("Add role : $author->name\n");

		$auth->add($author);
		$auth->addChild($author, $createModule);
		$auth->addChild($author, $viewModule);
		$this->stdOut("Append $createModule->name to $author->name\n");
		$this->stdOut("Append $viewModule->name to $author->name\n");

        // add "admin" role and give this role the "updateModule" permission
        // as well as the permissions of the "author" role
		$admin = $auth->createRole($module.'_admin');
		$auth->add($admin);
		$this->stdOut("Add role : $admin->name\n");
		$auth->addChild($admin, $viewAllModule);
		$auth->addChild($admin, $updateModule);
		$auth->addChild($admin, $deleteModule);
		$auth->addChild($admin, $author);
		$this->stdOut("Append $updateModule->name to $admin->name\n");
		$this->stdOut("Append $deleteModule->name to $admin->name\n");
		$this->stdOut("Append $author->name to $admin->name\n");

		$this->addRule($module,$auth,$updateModule,$viewModule,$deleteModule,$author);
	}

	public function addRule($module,$auth,$updateModule,$viewModule,$deleteModule,$author) {
		$rule = new \common\components\rbac\AuthorRule;
		$rule->name = $rule->name.'_'.$module;
		$auth->add($rule);

		// add the "viewOwnModule" permission and associate the rule with it.
		$viewOwnModule = $auth->createPermission('viewOwn_'.$module);
		$viewOwnModule->description = 'View own '.$module;
		$viewOwnModule->ruleName = $rule->name;
		$auth->add($viewOwnModule);
		$this->stdOut("Add permission : $viewOwnModule->name\n");

		// "viewOwnModule" will be used from "viewModule"
		$auth->addChild($viewOwnModule, $viewModule);

		// allow "author" to view their own posts
		$auth->addChild($author, $viewOwnModule);
		$this->stdOut("Append $viewOwnModule->name to $author->name\n");

		// add the "updateOwnPost" permission and associate the rule with it.
		$updateOwnModule = $auth->createPermission('updateOwn_'.$module);
		$updateOwnModule->description = 'Update own '.$module;
		$updateOwnModule->ruleName = $rule->name;
		$auth->add($updateOwnModule);
		$this->stdOut("Add permission : $updateOwnModule->name\n");

		// "updateOwnModule" will be used from "updateModule"
		$auth->addChild($updateOwnModule, $updateModule);

		// allow "author" to update their own posts
		$auth->addChild($author, $updateOwnModule);
		$this->stdOut("Append $updateOwnModule->name to $author->name\n");

		// add the "deleteOwnPost" permission and associate the rule with it.
		$deleteOwnModule = $auth->createPermission('deleteOwn_'.$module);
		$deleteOwnModule->description = 'Delete own '.$module;
		$deleteOwnModule->ruleName = $rule->name;
		$auth->add($deleteOwnModule);
		$this->stdOut("Add permission : $deleteOwnModule->name\n");

		// "deleteOwnModule" will be used from "deleteModule"
		$auth->addChild($deleteOwnModule, $deleteModule);

		// allow "author" to delete their own posts
		$auth->addChild($author, $deleteOwnModule);
		$this->stdOut("Append $deleteOwnModule->name to $author->name\n");
	}

	public function assignDefaultUserPermission($roles,$userId) {
		$auth = \Yii::$app->authManager;
		foreach ($roles as $key => $roleName) {
			$role = $auth->getRole($roleName);
			$role = isset($role) ? $auth->getRole($roleName) : $auth->getPermission($roleName);
			$auth->assign($role, $userId);
			$this->stdOut("Append $role->name to Admin User\n");
		}
	}

	public function addSimplePermission($module,$auth) {
        // add "createModule" permission
		$createModule = $auth->createPermission('create_'.$module);
		$createModule->description = 'Create a '.$module;
		$auth->add($createModule);
		$this->stdOut("Add permission : $createModule->name\n");

        // add "updateModule" permission
		$updateModule = $auth->createPermission('update_'.$module);
		$updateModule->description = 'Update '.$module;
		$auth->add($updateModule);
		$this->stdOut("Add permission : $updateModule->name\n");

        // add "viewModule" permission
		$viewModule = $auth->createPermission('view_'.$module);
		$viewModule->description = 'View '.$module;
		$auth->add($viewModule);
		$this->stdOut("Add permission : $viewModule->name\n");

        // add "deleteModule" permission
		$deleteModule = $auth->createPermission('delete_'.$module);
		$deleteModule->description = 'Delete '.$module;
		$auth->add($deleteModule);
		$this->stdOut("Add permission : $deleteModule->name\n");

        // add "admin" role and give this role the "updateModule" permission
        // as well as the permissions of the "author" role
		$admin = $auth->createRole($module.'_admin');
		$auth->add($admin);
		$this->stdOut("Add role : $admin->name\n");

		$auth->addChild($admin, $createModule);
		$auth->addChild($admin, $viewModule);
		$auth->addChild($admin, $updateModule);
		$auth->addChild($admin, $deleteModule);
		$this->stdOut("Append $createModule->name to $admin->name\n");
		$this->stdOut("Append $viewModule->name to $admin->name\n");
		$this->stdOut("Append $updateModule->name to $admin->name\n");
		$this->stdOut("Append $deleteModule->name to $admin->name\n");

	}
}
