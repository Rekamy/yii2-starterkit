<?php
$dbName = \common\components\Migration::getDbName();
switch (Yii::$app->db->driverName) {
    case 'mysql':
    $script = "SELECT table_name as TABLE_NAME
    FROM information_schema.tables
    WHERE table_schema = '$dbName'";
    break;
    case 'oci':
    $script = "
    SELECT
    TABLE_NAME
    FROM USER_TABLES
    UNION ALL
    SELECT
    VIEW_NAME AS TABLE_NAME
    FROM USER_VIEWS
    UNION ALL
    SELECT
    MVIEW_NAME AS TABLE_NAME
    FROM USER_MVIEWS
    ORDER BY TABLE_NAME
    ";

    break;
    default:
    $script = false;
    break;
}
if($script){
    $query = Yii::$app->db->createCommand($script)->queryAll();
    foreach ($query as $key => $value) {
        $url = '/'.strtr($value['TABLE_NAME'], '_', '-');
        $label = strtr($value['TABLE_NAME'], '_', ' ');
        $items[] = ['label' => $label, 'url' => [$url]];
    }
}

?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div style="text-align: center">
                <img src="<?= Yii::$app->params['leftMenuImg'] ?>" style="width: 200px" alt="Mohor_rasmi_Majlis_Perbandaran_Seberang_Perai"/>
            </div>
        </div>

        <!-- search form -->
<!--         <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
    -->        <!-- /.search form -->
    <?= dmstr\widgets\Menu::widget(
        [
            'options' => ['class' => 'sidebar-menu tree delay', 'data-widget'=> 'tree'],
            'items' => [
                [
                    'label' => Yii::t('app','Login'), 'url' => ['/site/login'],
                    'visible' => Yii::$app->user->isGuest
                ],
                ['label' => Yii::t('app','Admin Section'), 'options' => ['class' => 'header']],
                [
                    'label' => Yii::t('app','System Management'),
                    // 'visible' => Yii::$app->user->can('admin'),
                    'items' => [
                        ['label' => Yii::t('app','Users'), 'icon' => 'file-code-o', 'url' => ['/user/index']],
                        ['label' => Yii::t('app','My Profile'), 'icon' => 'file-code-o', 'url' => ['/profile/index']],
                        ['label' => Yii::t('app','Access'), 'icon' => 'file-code-o', 'url' => ['/admin/assignment']],
                        ['label' => Yii::t('app','Activity Log'), 'icon' => 'file-code-o', 'url' => ['/activity-log/index']],
                        ['label' => Yii::t('app','System Maintenance'), 'icon' => 'file-code-o', 'url' => ['/system/maintenance']],
                    ],
                    // 'visible' => Yii::$app->user->isGuest,
                ],
                ['label' => Yii::t('app','Module Developer'), 'options' => ['class' => 'header']],
                [
                    'label' => Yii::t('app','Developer'), 'icon' => 'file-code-o',
                    'items' => [
                        ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                        ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                        [
                            'label' => 'Under Development', 'icon' => 'file-code-o',
                            'items' => [
                                ['label' => Yii::t('app','Workshop Report'), 'icon' => 'file-code-o', 'url' => ['/workshop-usage/index']],
                                ['label' => Yii::t('app','Store Report'), 'icon' => 'file-code-o', 'url' => ['/store-usage/index']],
                            ]
                        ],
                        [
                            'label' => 'Database', 'icon' => 'database',
                            'items' => $items
                        ],
                    ],
                    // 'visible' => Yii::$app->user->isGuest,
                ],
            ],
        ]
        ) ?>

    </section>

</aside>
