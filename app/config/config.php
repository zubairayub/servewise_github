<?php

$config = [
'MODEL_PATH' => APPLICATION_PATH . DS . 'model' . DS,   
'VIEW_PATH' => APPLICATION_PATH . DS . 'view' . DS,
'CONTROLLER_PATH' =>   '..\app\controller' . DS,
'LERN_VIEW_PATH' => APPLICATION_PATH . DS . 'view' . DS . 'lern_navigation' . DS,
'LIB_PATH' => APPLICATION_PATH . DS . 'lib' . DS,
'STYLE_PATH' => '../app/view/css/style.css',
'SUBSTYLE_PATH' => '../app/view/css/navigationpage.css',
'AOSSTYLE_PATH' => '../app/view/css/aos.css',
'FONTS_PATH' => '../app/view/css/fonts.css',
'DASHBOARD_PATH' => '../app/view/css/dashboard.css',
'FONTAWSOME' => '../app/view/font-awesome-4.7.0/css/font-awesome.min.css',
'JQUREY_PATH' => '../app/view/js/jqurey.js',
'JS_PATH' => '../app/view/js/core.js',
'EDITOR_PATH' => '../app/view/js/tinymce.min.js',
'EDITOR_SUB_PATH' => '../app/view/js/init-tinymce.js',
'JS_PATH_DASHBOARD' => '../app/view/dashboard/js/core.js',
'AJAX_HANDLER_DASHBOARD' => '../app/view/dashboard/js/ajax-handler.js',
'OWL_MAILER_JS' => APPLICATION_PATH . DS .'view/js/owlmailer.js',
'AOSJS_PATH' => '../app/view/js/aos.js',
'IMAGE_PATH'=> '../app/view/img/',
'LOGO_DIRECTORY' =>   '../app/upload/logos/' ,
'LOGO_DIRECTORY_FOOTER' => '../app/upload/logos/footerllog/' ,
'CATEGORY_DIRECTORY' =>   '../app/upload/categories/',
'PRODUCT_DIRECTORY' => '../app/upload/products/'  ,
'FONTAWESOME_PATH' => '../app/view/css/font-awesome/css/font-awesome.css',
'FONTAWESOMEMIN_PATH' => '../app/view/css/font-awesome/css/font-awesome.min.css',


];

require $config['LIB_PATH'] . 'functions.php';
