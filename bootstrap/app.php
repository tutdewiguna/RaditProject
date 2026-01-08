<?php

/*
 * Configure paths
 */
define('ROOTPATH', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('SYSTEMPATH', ROOTPATH . 'vendor' . DIRECTORY_SEPARATOR . 'codeigniter4' . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'system' . DIRECTORY_SEPARATOR);
define('APPPATH', ROOTPATH . 'app' . DIRECTORY_SEPARATOR);
define('WRITEPATH', ROOTPATH . 'writable' . DIRECTORY_SEPARATOR);
define('PUBLICPATH', ROOTPATH . 'public' . DIRECTORY_SEPARATOR);
define('FCPATH', PUBLICPATH);

// Load environment variables
require_once SYSTEMPATH . 'Config/DotEnv.php';
(new CodeIgniter\Config\DotEnv(ROOTPATH))->load();

// Determine environment
define('CI_ENVIRONMENT', getenv('CI_ENVIRONMENT') ?? 'development');

// Create the application
return CodeIgniter\Config\Services::codeigniter();

