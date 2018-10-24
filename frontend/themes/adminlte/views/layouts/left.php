<?php
$dbName = \common\components\Migration::getDbName(Yii::$app->db);
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
        $url = '/poc/'.strtr($value['TABLE_NAME'], '_', '-');
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
                <img src="<?= Yii::$app->params['leftMenuImg'] ?>" style="width: 80%" alt="Mohor_rasmi_Majlis_Perbandaran_Seberang_Perai"/>
            </div>
        </div>

        <!-- search form -->
        <!-- <form id="search-menu" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form> -->
        <!-- /.search form -->
        <?php 
        $menus = [];

        $menus = [
            ['label' => Yii::t('app','Asset & Inventory Section'), 'options' => ['class' => 'header'], 'visible' => Yii::$app->user->can('manage-asset') || Yii::$app->user->can('manage-inventory')],
            [
                'label' => Yii::t('app','Asset Management'),
                'visible' => Yii::$app->user->can('manage-asset'),
                'items' => [
                    ['label' => Yii::t('app','List'), 'icon' => 'file-code-o', 'url' => ['/asset/index']],
                    ['label' => Yii::t('app','Placement'), 'icon' => 'file-code-o', 'url' => ['/asset/placement'], 'visible' => Yii::$app->user->can('manage-asset-placement')],
                    ['label' => Yii::t('app','Maintenance'), 'icon' => 'file-code-o', 'url' => ['/asset/maintenance'], 'visible' => Yii::$app->user->can('manage-asset-maintenance')],
                    ['label' => Yii::t('app','Warranty'), 'icon' => 'file-code-o', 'url' => ['/asset/warranty'], 'visible' => Yii::$app->user->can('manage-asset-warranty')],
                ],
            ],
            [
                'label' => Yii::t('app','Inventory Management'),
                'visible' => Yii::$app->user->can('manage-inventory'),
                'items' => [
                    ['label' => Yii::t('app','List'), 'icon' => 'file-code-o', 'url' => ['/inventory/index']],
                    ['label' => Yii::t('app','Checkin'), 'icon' => 'file-code-o', 'url' => ['/inventory/checkin'], 'visible' => Yii::$app->user->can('manage-checkin')],
                    ['label' => Yii::t('app','Checkout'), 'icon' => 'file-code-o', 'url' => ['/inventory/checkout'], 'visible' => Yii::$app->user->can('manage-checkout')],
                    ['label' => Yii::t('app','Maintenance'), 'icon' => 'file-code-o', 'url' => ['/inventory/maintenance'], 'visible' => Yii::$app->user->can('manage-inventory-maintenance')],
                    ['label' => Yii::t('app','Warranty'), 'icon' => 'file-code-o', 'url' => ['/inventory/warranty'], 'visible' => Yii::$app->user->can('manage-inventory-warranty')],
                ],
            ],
            ['label' => Yii::t('app','Purchase Section'), 'options' => ['class' => 'header'], 'visible' => Yii::$app->user->can('purchase')],

            ['label' => Yii::t('app','Order List'), 'icon' => 'file-code-o', 'url' => ['/order/index'], 'visible' => Yii::$app->user->can('purchase')],
            ['label' => Yii::t('app','Asset Purchasing'), 'icon' => 'file-code-o', 'url' => ['/asset/purchase'], 'visible' => Yii::$app->user->can('purchase')],
            ['label' => Yii::t('app','Inventory Purchasing'), 'icon' => 'file-code-o', 'url' => ['/inventory/purchase'], 'visible' => Yii::$app->user->can('purchase')],

            ['label' => Yii::t('app','Admin Section'), 'options' => ['class' => 'header'], 'visible' => Yii::$app->user->can('admin')],
            [
                'label' => Yii::t('app','List Management'),
                'visible' => Yii::$app->user->can('admin'),
                'items' => [
                    ['label' => Yii::t('app','Category'), 'icon' => 'file-code-o', 'url' => ['/category/index']],
                    ['label' => Yii::t('app','Subcategory'), 'icon' => 'file-code-o', 'url' => ['/subcategory/index']],
                    [
                        'label' => Yii::t('app','Asset'),
                    // 'visible' => Yii::$app->user->can('admin'),
                        'items' => [
                            ['label' => Yii::t('app','Status'), 'icon' => 'file-code-o', 'url' => ['/gen-value/asset-status']],
                            ['label' => Yii::t('app','Type'), 'icon' => 'file-code-o', 'url' => ['/gen-value/asset-type']],
                            ['label' => Yii::t('app','Progress'), 'icon' => 'file-code-o', 'url' => ['/gen-value/asset-progress']],
                        ]
                    ],
                    [
                        'label' => Yii::t('app','Inventory'),
                    // 'visible' => Yii::$app->user->can('admin'),
                        'items' => [
                            ['label' => Yii::t('app','Status'), 'icon' => 'file-code-o', 'url' => ['/gen-value/inventory-status']],
                            ['label' => Yii::t('app','Type'), 'icon' => 'file-code-o', 'url' => ['/gen-value/inventory-status']],
                            ['label' => Yii::t('app','Progress'), 'icon' => 'file-code-o', 'url' => ['/gen-value/inventory-status']],
                        ]
                    ],
                    [
                        'label' => Yii::t('app','Order'),
                    // 'visible' => Yii::$app->user->can('admin'),
                        'items' => [
                            ['label' => Yii::t('app','Status'), 'icon' => 'file-code-o', 'url' => ['/gen-value/order-status']],
                            ['label' => Yii::t('app','Type'), 'icon' => 'file-code-o', 'url' => ['/gen-value/order-status']],
                            ['label' => Yii::t('app','Progress'), 'icon' => 'file-code-o', 'url' => ['/gen-value/order-status']],
                        ]
                    ],
                    [
                        'label' => Yii::t('app','Maintenance'),
                    // 'visible' => Yii::$app->user->can('admin'),
                        'items' => [
                            ['label' => Yii::t('app','Status'), 'icon' => 'file-code-o', 'url' => ['/gen-value/maintenance-status']],
                            ['label' => Yii::t('app','Type'), 'icon' => 'file-code-o', 'url' => ['/gen-value/maintenance-status']],
                            ['label' => Yii::t('app','Progress'), 'icon' => 'file-code-o', 'url' => ['/gen-value/maintenance-status']],
                        ]
                    ],
                    [
                        'label' => Yii::t('app','Movement'),
                    // 'visible' => Yii::$app->user->can('admin'),
                        'items' => [
                            ['label' => Yii::t('app','Status'), 'icon' => 'file-code-o', 'url' => ['/gen-value/movement-status']],
                            ['label' => Yii::t('app','Type'), 'icon' => 'file-code-o', 'url' => ['/gen-value/movement-status']],
                            ['label' => Yii::t('app','Progress'), 'icon' => 'file-code-o', 'url' => ['/gen-value/movement-status']],
                        ]
                    ],
                    [
                        'label' => Yii::t('app','Warranty'),
                    // 'visible' => Yii::$app->user->can('admin'),
                        'items' => [
                            ['label' => Yii::t('app','Status'), 'icon' => 'file-code-o', 'url' => ['/gen-value/warranty-status']],
                            ['label' => Yii::t('app','Type'), 'icon' => 'file-code-o', 'url' => ['/gen-value/warranty-status']],
                            ['label' => Yii::t('app','Progress'), 'icon' => 'file-code-o', 'url' => ['/gen-value/warranty-status']],
                        ]
                    ],
                ],
            // 'visible' => Yii::$app->user->isGuest,
            ],
            [
                'label' => Yii::t('app','System Management'),
                'visible' => Yii::$app->user->can('admin'),
                'items' => [
                    ['label' => Yii::t('app','Users'), 'icon' => 'file-code-o', 'url' => ['/profile/user/index']],
                    ['label' => Yii::t('app','My Profile'), 'icon' => 'file-code-o', 'url' => ['/profile/profile/index']],
                    ['label' => Yii::t('app','Access'), 'icon' => 'file-code-o', 'url' => ['/admin/assignment']],
                    ['label' => Yii::t('app','Activity Log'), 'icon' => 'file-code-o', 'url' => ['/activity-log/index']],
                    ['label' => Yii::t('app','System Maintenance'), 'icon' => 'file-code-o', 'url' => ['/system/maintenance']],
                ],
            // 'visible' => Yii::$app->user->isGuest,
            ],

            ['label' => Yii::t('app','Module Developer'), 'options' => ['class' => 'header'], 'visible' => Yii::$app->user->can('superadmin')],
            [
                'label' => Yii::t('app','Developer'), 'icon' => 'file-code-o',
                'visible' => Yii::$app->user->can('superadmin'),
                'items' => [
                    [
                        'label' => Yii::t('app','Login'), 'url' => ['/site/login'],
                        'visible' => Yii::$app->user->isGuest
                    ],
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
            ],
        ];



        echo dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree delay', 'data-widget'=> 'tree'],
                'items' => $menus
            ]
        ) ?>

    </section>

</aside>
