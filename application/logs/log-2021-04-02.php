<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-02 07:47:11 --> Severity: Notice --> Undefined index: code F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 68
ERROR - 2021-04-02 07:47:11 --> Severity: Notice --> Undefined index: [Sales Scheme F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 72
ERROR - 2021-04-02 07:47:11 --> Severity: Notice --> Undefined index: medicine_code F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 96
ERROR - 2021-04-02 07:47:11 --> Severity: Notice --> Undefined index: medicine_name F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 97
ERROR - 2021-04-02 07:47:11 --> Severity: Notice --> Undefined index: formulation F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 98
ERROR - 2021-04-02 07:47:11 --> Severity: Notice --> Undefined index: p_price F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 99
ERROR - 2021-04-02 07:47:11 --> Severity: Notice --> Undefined index: sale_price F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 100
ERROR - 2021-04-02 07:47:11 --> Severity: Notice --> Undefined index: quantity F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 101
ERROR - 2021-04-02 07:47:11 --> Severity: Notice --> Undefined variable: catid F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 102
ERROR - 2021-04-02 07:47:11 --> Severity: Notice --> Undefined index: supplier F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 103
ERROR - 2021-04-02 07:47:12 --> Severity: Notice --> Undefined index: unit F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 104
ERROR - 2021-04-02 07:47:12 --> Severity: Notice --> Undefined index: d_price F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 105
ERROR - 2021-04-02 07:47:12 --> Severity: Notice --> Undefined index: purchase_date F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 106
ERROR - 2021-04-02 07:47:12 --> Severity: Notice --> Undefined index: expiry_date F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 107
ERROR - 2021-04-02 07:47:12 --> Severity: Notice --> Undefined index: manufacture_date F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 108
ERROR - 2021-04-02 07:47:12 --> Severity: Notice --> Undefined index: status F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 109
ERROR - 2021-04-02 07:47:12 --> Severity: Notice --> Undefined index: batch_no F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 110
ERROR - 2021-04-02 07:47:12 --> Query error: Column 'medicine_code' cannot be null - Invalid query: INSERT INTO `product` (`hospital_id`, `medicine_id`, `medicine_code`, `medicine_name`, `formulation`, `p_price`, `sale_price`, `quantity`, `category`, `supplier`, `unit`, `d_price`, `purchase_date`, `expiry_date`, `manufacture_date`, `status`, `batch_no`) VALUES ('27', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2021-04-02 07:47:12 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at F:\xampp\htdocs\pharmacy\system\core\Exceptions.php:271) F:\xampp\htdocs\pharmacy\system\core\Common.php 570
ERROR - 2021-04-02 07:47:12 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_db.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 07:47:13 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_db.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 07:49:16 --> Severity: Notice --> Undefined index: code F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 68
ERROR - 2021-04-02 07:49:16 --> Severity: Notice --> Undefined index: [Sales Scheme F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 72
ERROR - 2021-04-02 07:49:16 --> Query error: Column 'code' cannot be null - Invalid query: INSERT INTO `stock_report` (`code`, `product_name`, `unit`, `current_stock`, `sales_scheme`, `purc_scheme_free`, `cost_price`, `purchase_price`, `sales_price`, `mrp`, `company`, `manufacturer`, `rack_no`) VALUES (NULL, 'DISPO SYRINGE 1ML 1*1', 'Pcs', '0', NULL, '0', '0', '0', '0', '5', 'SURGICALS (B.D)', '', '')
ERROR - 2021-04-02 07:49:16 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_db.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 07:49:17 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_db.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 07:49:28 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 07:49:28 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 07:49:28 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 07:49:58 --> Severity: error --> Exception: syntax error, unexpected 'die' (T_EXIT), expecting ',' or ';' F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 50
ERROR - 2021-04-02 07:49:59 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 07:49:59 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
DEBUG - 2021-04-02 07:53:03 --> UTF-8 Support Enabled
DEBUG - 2021-04-02 07:53:03 --> Global POST, GET and COOKIE data sanitized
ERROR - 2021-04-02 07:53:03 --> Severity: error --> Exception: syntax error, unexpected 'die' (T_EXIT), expecting ',' or ';' F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 50
ERROR - 2021-04-02 07:53:03 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 07:53:03 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
DEBUG - 2021-04-02 07:53:06 --> UTF-8 Support Enabled
DEBUG - 2021-04-02 07:53:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2021-04-02 07:53:06 --> Severity: error --> Exception: syntax error, unexpected 'die' (T_EXIT), expecting ',' or ';' F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 50
ERROR - 2021-04-02 07:53:06 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 07:53:06 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
INFO - 2021-04-02 07:53:56 --> Config Class Initialized
INFO - 2021-04-02 07:53:56 --> Hooks Class Initialized
DEBUG - 2021-04-02 07:53:56 --> UTF-8 Support Enabled
INFO - 2021-04-02 07:53:56 --> Utf8 Class Initialized
INFO - 2021-04-02 07:53:56 --> URI Class Initialized
INFO - 2021-04-02 07:53:57 --> Router Class Initialized
INFO - 2021-04-02 07:53:57 --> Output Class Initialized
INFO - 2021-04-02 07:53:57 --> Security Class Initialized
DEBUG - 2021-04-02 07:53:57 --> Global POST, GET and COOKIE data sanitized
INFO - 2021-04-02 07:53:57 --> Input Class Initialized
INFO - 2021-04-02 07:53:57 --> Language Class Initialized
ERROR - 2021-04-02 07:53:57 --> Severity: error --> Exception: syntax error, unexpected 'die' (T_EXIT), expecting ',' or ';' F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 50
ERROR - 2021-04-02 07:53:57 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 07:53:57 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
INFO - 2021-04-02 08:04:39 --> Config Class Initialized
INFO - 2021-04-02 08:04:39 --> Hooks Class Initialized
DEBUG - 2021-04-02 08:04:39 --> UTF-8 Support Enabled
INFO - 2021-04-02 08:04:39 --> Utf8 Class Initialized
INFO - 2021-04-02 08:04:39 --> URI Class Initialized
INFO - 2021-04-02 08:04:39 --> Router Class Initialized
INFO - 2021-04-02 08:04:39 --> Output Class Initialized
INFO - 2021-04-02 08:04:39 --> Security Class Initialized
DEBUG - 2021-04-02 08:04:39 --> Global POST, GET and COOKIE data sanitized
INFO - 2021-04-02 08:04:40 --> Input Class Initialized
INFO - 2021-04-02 08:04:40 --> Language Class Initialized
ERROR - 2021-04-02 08:04:40 --> Severity: error --> Exception: syntax error, unexpected 'die' (T_EXIT), expecting ',' or ';' F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 50
ERROR - 2021-04-02 08:04:40 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 08:04:40 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 08:17:00 --> Severity: error --> Exception: syntax error, unexpected 'die' (T_EXIT), expecting ',' or ';' F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 52
ERROR - 2021-04-02 08:17:01 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 08:17:01 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 08:17:25 --> Severity: error --> Exception: syntax error, unexpected 'die' (T_EXIT), expecting ',' or ';' F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 52
ERROR - 2021-04-02 08:17:25 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 08:17:25 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 08:18:35 --> Severity: error --> Exception: syntax error, unexpected 'die' (T_EXIT), expecting ',' or ';' F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 54
ERROR - 2021-04-02 08:18:35 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 08:18:35 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 08:18:46 --> Severity: error --> Exception: syntax error, unexpected 'die' (T_EXIT), expecting ',' or ';' F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 54
ERROR - 2021-04-02 08:18:46 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 08:18:46 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 08:20:45 --> Severity: error --> Exception: syntax error, unexpected 'die' (T_EXIT), expecting ',' or ';' F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 54
ERROR - 2021-04-02 08:20:45 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 08:20:45 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 08:35:31 --> Severity: error --> Exception: syntax error, unexpected 'die' (T_EXIT), expecting ',' or ';' F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 54
ERROR - 2021-04-02 08:35:31 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 08:35:31 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 08:35:52 --> Severity: error --> Exception: syntax error, unexpected 'die' (T_EXIT), expecting ',' or ';' F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 54
ERROR - 2021-04-02 08:35:52 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 08:35:52 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 08:36:05 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:36:05 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:36:05 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:05 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:05 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:05 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:06 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:36:06 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:06 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:36:06 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:06 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:06 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:07 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:36:07 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:07 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:07 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:36:07 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:07 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:15 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:36:15 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:36:15 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:15 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:15 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:15 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:15 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:36:16 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:36:16 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:16 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:16 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:16 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:16 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:36:16 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:16 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:17 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:36:17 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:17 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:19 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:36:19 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:19 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:36:19 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:19 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:19 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:19 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:36:19 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:19 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:19 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:36:19 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:19 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:20 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:36:20 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:20 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:20 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:36:20 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:20 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:36:24 --> Severity: error --> Exception: syntax error, unexpected 'die' (T_EXIT), expecting ',' or ';' F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 54
ERROR - 2021-04-02 08:36:24 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 08:36:24 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 08:47:20 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:47:20 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:47:20 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:47:20 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:47:20 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:47:20 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:47:20 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:47:20 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:47:20 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:47:21 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:47:21 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:47:21 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:47:21 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:47:21 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:47:21 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:47:21 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:47:21 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:47:21 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:47:22 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:47:23 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:47:23 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:47:23 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:47:23 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:47:23 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:47:36 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:47:36 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:47:36 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:47:36 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:47:36 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:47:36 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:48:27 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:48:27 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:48:27 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:48:27 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:48:27 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:48:27 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:48:30 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:48:30 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:48:30 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:48:30 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:48:30 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:48:30 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:48:31 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:48:31 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:48:32 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:48:32 --> 404 Page Not Found: Assets/plugins
ERROR - 2021-04-02 08:48:32 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:48:32 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_404.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 182
ERROR - 2021-04-02 08:49:05 --> Severity: error --> Exception: syntax error, unexpected '$hospital_id' (T_VARIABLE) F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 19
ERROR - 2021-04-02 08:49:05 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 08:49:05 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 08:49:54 --> Severity: error --> Exception: syntax error, unexpected '$hospital_id' (T_VARIABLE) F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 19
ERROR - 2021-04-02 08:49:56 --> Severity: error --> Exception: syntax error, unexpected '$hospital_id' (T_VARIABLE) F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 19
ERROR - 2021-04-02 08:50:10 --> Severity: error --> Exception: syntax error, unexpected '$hospital_id' (T_VARIABLE) F:\xampp\htdocs\pharmacy\application\controllers\ImportController.php 19
ERROR - 2021-04-02 08:50:10 --> Severity: Warning --> include(F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php): failed to open stream: No such file or directory F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
ERROR - 2021-04-02 08:50:10 --> Severity: Warning --> include(): Failed opening 'F:\xampp\htdocs\pharmacy\application\views\errors\html\error_exception.php' for inclusion (include_path='F:\xampp\php\PEAR') F:\xampp\htdocs\pharmacy\system\core\Exceptions.php 219
