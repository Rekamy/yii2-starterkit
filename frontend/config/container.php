<?php
use yii\web\JsExpression;
use kartik\grid\GridView;
use kartik\export\ExportMenu;


$pdfHeader = [
    'L' => [
        'content' => Yii::t('kvgrid', 'FEMS Fire Extinguisher Management System'),
        'font-size' => 8,
        'color' => '#333333',
    ],
    'C' => [
        // 'content' => 'FEMS Export',
        'content' => '',
        'font-size' => 16,
        'color' => '#333333',
    ],
    'R' => [
        'content' => Yii::t('kvgrid', 'Generated') . ': ' . date('D, d-M-Y g:i a T'),
        'font-size' => 8,
        'color' => '#333333',
    ],
];
$pdfFooter = [
    'L' => [
        'content' => Yii::t('kvgrid', '© Aito Firework Holding'),
        'font-size' => 8,
        'font-style' => 'B',
        'color' => '#999999',
    ],
    'R' => [
        'content' => '[ {PAGENO} ]',
        'font-size' => 10,
        'font-style' => 'B',
        'font-family' => 'serif',
        'color' => '#333333',
    ],
    'line' => true,
];

$exportMenuExportConfig = [
    ExportMenu::FORMAT_HTML => [
        'label' => Yii::t('kvexport', 'HTML'),
        'icon' => $isFa ? 'file-text' : 'floppy-saved',
        'iconOptions' => ['class' => 'text-info'],
        'linkOptions' => [],
        'options' => ['title' => Yii::t('kvexport', 'Hyper Text Markup Language')],
        'alertMsg' => Yii::t('kvexport', 'The HTML export file will be generated for download.'),
        'mime' => 'text/html',
        'extension' => 'html',
        'writer' => ExportMenu::FORMAT_HTML,
    ],
    ExportMenu::FORMAT_CSV => [
        'label' => Yii::t('kvexport', 'CSV'),
        'icon' => $isFa ? 'file-code-o' : 'floppy-open',
        'iconOptions' => ['class' => 'text-primary'],
        'linkOptions' => [],
        'options' => ['title' => Yii::t('kvexport', 'Comma Separated Values')],
        'alertMsg' => Yii::t('kvexport', 'The CSV export file will be generated for download.'),
        'mime' => 'application/csv',
        'extension' => 'csv',
        'writer' => ExportMenu::FORMAT_CSV,
    ],
    ExportMenu::FORMAT_TEXT => [
        'label' => Yii::t('kvexport', 'Text'),
        'icon' => $isFa ? 'file-text-o' : 'floppy-save',
        'iconOptions' => ['class' => 'text-muted'],
        'linkOptions' => [],
        'options' => ['title' => Yii::t('kvexport', 'Tab Delimited Text')],
        'alertMsg' => Yii::t('kvexport', 'The TEXT export file will be generated for download.'),
        'mime' => 'text/plain',
        'extension' => 'txt',
        'writer' => ExportMenu::FORMAT_CSV,
        'delimiter' => "\t",
    ],
    ExportMenu::FORMAT_PDF => [
        'label' => Yii::t('kvexport', 'PDF'),
        'icon' => $isFa ? 'file-pdf-o' : 'floppy-disk',
        'iconOptions' => ['class' => 'text-danger'],
        'linkOptions' => [],
        'options' => ['title' => Yii::t('kvexport', 'Portable Document Format')],
        'alertMsg' => Yii::t('kvexport', 'The PDF export file will be generated for download.'),
        'mime' => 'application/pdf',
        'extension' => 'pdf',
        'writer' => ExportMenu::FORMAT_PDF,
        // 'useInlineCss' => true,
        // 'pdfConfig' => [],

        'showHeader' => true,
        'showPageSummary' => true,
        'showFooter' => true,
        'showCaption' => true,
        'filename' => Yii::t('kvgrid', 'tets'),

        'pdfConfig' => [
            'mode' => 'UTF-8',
            'format' => 'A4-L',
            'destination' => 'D',
            'marginTop' => 20,
            'marginBottom' => 20,
            'cssInline' => '.kv-wrap{padding:20px;}' .
            '.kv-align-center{text-align:center;}' .
            '.kv-align-left{text-align:left;}' .
            '.kv-align-right{text-align:right;}' .
            '.kv-align-top{vertical-align:top!important;}' .
            '.kv-align-bottom{vertical-align:bottom!important;}' .
            '.kv-align-middle{vertical-align:middle!important;}' .
            '.kv-page-summary{border-top:4px double #ddd;font-weight: bold;}' .
            '.kv-table-footer{border-top:4px double #ddd;font-weight: bold;}' .
            '.kv-table-caption{font-size:1.5em;padding:8px;border:1px solid #ddd;border-bottom:none;}',
            'orientation' => 'L',
            'methods' => [
                'SetTitle' => '$properties->getTitle()',
                'SetAuthor' => '$properties->getCreator()',
                'SetCreator' => '$properties->getCreator()',
                'SetSubject' => '$properties->getSubject()',
                'SetKeywords' => '$properties->getKeywords()',
            ],
            'cssFile' => '',
            // 'content' => $w->generateHTMLHeader(false) . $w->generateSheetData() . $w->generateHTMLFooter(),
            'methods' => [

                'SetHeader' => [
                    ['odd' => $pdfHeader, 'even' => $pdfHeader],
                ],
                'SetFooter' => [
                    ['odd' => $pdfFooter, 'even' => $pdfFooter],
                ],
            ],
            'options' => [
                'title' => '{caption}',
                'subject' => Yii::t('kvgrid', 'PDF export generated by kartik-v/yii2-grid extension'),
                'keywords' => Yii::t('kvgrid', 'krajee, grid, export, yii2-grid, pdf'),
            ],
            'contentBefore' => '',
            'contentAfter' => '',
        ],
    ],
    ExportMenu::FORMAT_EXCEL => [
        'label' => Yii::t('kvexport', 'Excel 95 +'),
        'icon' => $isFa ? 'file-excel-o' : 'floppy-remove',
        'iconOptions' => ['class' => 'text-success'],
        'linkOptions' => [],
        'options' => ['title' => Yii::t('kvexport', 'Microsoft Excel 95+ (xls)')],
        'alertMsg' => Yii::t('kvexport', 'The EXCEL 95+ (xls) export file will be generated for download.'),
        'mime' => 'application/vnd.ms-excel',
        'extension' => 'xls',
        'writer' => ExportMenu::FORMAT_EXCEL,
    ],
    ExportMenu::FORMAT_EXCEL_X => [
        'label' => Yii::t('kvexport', 'Excel 2007+'),
        'icon' => $isFa ? 'file-excel-o' : 'floppy-remove',
        'iconOptions' => ['class' => 'text-success'],
        'linkOptions' => [],
        'options' => ['title' => Yii::t('kvexport', 'Microsoft Excel 2007+ (xlsx)')],
        'alertMsg' => Yii::t('kvexport', 'The EXCEL 2007+ (xlsx) export file will be generated for download.'),
        'mime' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'extension' => 'xlsx',
        'writer' => ExportMenu::FORMAT_EXCEL_X,
    ],
];
$defaultExportConfig = [
    GridView::HTML => [
        'label' => Yii::t('kvgrid', 'HTML'),
        // 'icon' => $isFa ? 'file-text' : 'floppy-saved',
        'iconOptions' => ['class' => 'text-info'],
        'showHeader' => true,
        'showPageSummary' => true,
        'showFooter' => true,
        'showCaption' => true,
        'filename' => Yii::t('kvgrid', 'FEMS Export'),
        'alertMsg' => Yii::t('kvgrid', 'The HTML export file will be generated for download.'),
        'options' => ['title' => Yii::t('kvgrid', 'Hyper Text Markup Language')],
        'mime' => 'text/html',
        'config' => [
            'cssFile' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
        ],
    ],
    GridView::CSV => [
        'label' => Yii::t('kvgrid', 'CSV'),
        // 'icon' => $isFa ? 'file-code-o' : 'floppy-open',
        'iconOptions' => ['class' => 'text-primary'],
        'showHeader' => true,
        'showPageSummary' => true,
        'showFooter' => true,
        'showCaption' => true,
        'filename' => Yii::t('kvgrid', 'FEMS Export'),
        'alertMsg' => Yii::t('kvgrid', 'The CSV export file will be generated for download.'),
        'options' => ['title' => Yii::t('kvgrid', 'Comma Separated Values')],
        'mime' => 'application/csv',
        'config' => [
            'colDelimiter' => ',',
            'rowDelimiter' => "\r\n",
        ],
    ],
    GridView::TEXT => [
        'label' => Yii::t('kvgrid', 'Text'),
        // 'icon' => $isFa ? 'file-text-o' : 'floppy-save',
        'iconOptions' => ['class' => 'text-muted'],
        'showHeader' => true,
        'showPageSummary' => true,
        'showFooter' => true,
        'showCaption' => true,
        'filename' => Yii::t('kvgrid', 'FEMS Export'),
        'alertMsg' => Yii::t('kvgrid', 'The TEXT export file will be generated for download.'),
        'options' => ['title' => Yii::t('kvgrid', 'Tab Delimited Text')],
        'mime' => 'text/plain',
        'config' => [
            'colDelimiter' => "\t",
            'rowDelimiter' => "\r\n",
        ],
    ],
    GridView::EXCEL => [
        'label' => Yii::t('kvgrid', 'Excel'),
        // 'icon' => $isFa ? 'file-excel-o' : 'floppy-remove',
        'iconOptions' => ['class' => 'text-success'],
        'showHeader' => true,
        'showPageSummary' => true,
        'showFooter' => true,
        'showCaption' => true,
        'filename' => Yii::t('kvgrid', 'FEMS Export'),
        'alertMsg' => Yii::t('kvgrid', 'The EXCEL export file will be generated for download.'),
        'options' => ['title' => Yii::t('kvgrid', 'Microsoft Excel 95+')],
        'mime' => 'application/vnd.ms-excel',
        'config' => [
            'worksheet' => Yii::t('kvgrid', 'ExportWorksheet'),
            'cssFile' => '',
        ],
    ],
    GridView::PDF => [
        'label' => Yii::t('kvgrid', 'PDF'),
        // 'icon' => $isFa ? 'file-pdf-o' : 'floppy-disk',
        'iconOptions' => ['class' => 'text-danger'],
        'showHeader' => true,
        'showPageSummary' => true,
        'showFooter' => true,
        'showCaption' => true,
        'filename' => Yii::t('kvgrid', 'FEMS Export'),
        'alertMsg' => Yii::t('kvgrid', 'The PDF export file will be generated for download.'),
        'options' => ['title' => Yii::t('kvgrid', 'Portable Document Format')],
        'mime' => 'application/pdf',
        'config' => [
            'mode' => 'UTF-8',
            'format' => 'A4-L',
            'destination' => 'D',
            'marginTop' => 20,
            'marginBottom' => 20,
            'cssInline' => '.kv-wrap{padding:20px;}' .
            '.kv-align-center{text-align:center;}' .
            '.kv-align-left{text-align:left;}' .
            '.kv-align-right{text-align:right;}' .
            '.kv-align-top{vertical-align:top!important;}' .
            '.kv-align-bottom{vertical-align:bottom!important;}' .
            '.kv-align-middle{vertical-align:middle!important;}' .
            '.kv-page-summary{border-top:4px double #ddd;font-weight: bold;}' .
            '.kv-table-footer{border-top:4px double #ddd;font-weight: bold;}' .
            '.kv-table-caption{font-size:1.5em;padding:8px;border:1px solid #ddd;border-bottom:none;}',
            'methods' => [
                'SetHeader' => [
                    ['odd' => $pdfHeader, 'even' => $pdfHeader],
                ],
                'SetFooter' => [
                    ['odd' => $pdfFooter, 'even' => $pdfFooter],
                ],
            ],
            'options' => [
                'title' => '{caption}',
                'subject' => Yii::t('kvgrid', 'PDF export generated by kartik-v/yii2-grid extension'),
                'keywords' => Yii::t('kvgrid', 'krajee, grid, export, yii2-grid, pdf'),
            ],
            'contentBefore' => '',
            'contentAfter' => '',
        ],
    ],
    GridView::JSON => [
        'label' => Yii::t('kvgrid', 'JSON'),
        // 'icon' => $isFa ? 'file-code-o' : 'floppy-open',
        'iconOptions' => ['class' => 'text-warning'],
        'showHeader' => true,
        'showPageSummary' => true,
        'showFooter' => true,
        'showCaption' => true,
        'filename' => Yii::t('kvgrid', 'FEMS Export'),
        'alertMsg' => Yii::t('kvgrid', 'The JSON export file will be generated for download.'),
        'options' => ['title' => Yii::t('kvgrid', 'JavaScript Object Notation')],
        'mime' => 'application/json',
        'config' => [
            'colHeads' => [],
            'slugColHeads' => false,
            'jsonReplacer' => new JsExpression("function(k,v){return typeof(v)==='string'?$.trim(v):v}"),
            'indentSpace' => 4,
        ],
    ],
];

$gridViewSettings = [
    // 'caption' => 'Test',
    'perfectScrollbar' => true,
    // 'perfectScrollbarOptions' => [],
    'pjax' => true,
    'bordered' => false,
    'resizableColumns' => true,
    'striped' => true,
    'condensed' => false,
    'responsive' => true,
    'hover' => true,
    'responsiveWrap' => false,
    'persistResize' => true,
    'toggleData' => true,
    'exportConfig' => $defaultExportConfig,
    'filterSelector' => 'select[name="per-page"]',
    // 'floatHeader' => true,
    // 'floatOverflowContainer' => true,
    // 'floatHeaderOptions' => ['top' => 50],
    // 'export' => [
    //     'target' => '_blank',
    // ],
    // 'replaceTags' => [
    //     '{title}' => '{caption}',
    //     // '{title}' => function($this) {
    //     //     return $this->title;
    //     // },
    // ],
];
$container = [
    'definitions' => [
        'yii\widgets\LinkPager' => [
            'firstPageLabel' => '<<',
            'lastPageLabel'  => '>>'
        ],
        'kartik\export\ExportMenu' => [
            'dynagridOptions' => true,
            'target' => ExportMenu::TARGET_BLANK,
            'stream' => true,
            'fontAwesome' => true,
            'dropdownOptions' => [
                'label' => 'Full',
                'class' => 'btn btn-default',
                'itemsBefore' => [
                    '<li class="dropdown-header">Export All Data</li>',
                ],
            ],
            'exportConfig' => [$ExportMenuExportConfig],
            /*'exportConfig' => [
                ExportMenu::FORMAT_PDF => false,
            ],*/
        ],
        'kartik\grid\GridView' => $gridViewSettings,
    ]
];
return $container;
