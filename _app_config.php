<?php
/**
 * @package SISSTC
 *
 * APPLICATION-WIDE CONFIGURATION SETTINGS
 *
 * This file contains application-wide configuration settings.  The settings
 * here will be the same regardless of the machine on which the app is running.
 *
 * This configuration should be added to version control.
 *
 * No settings should be added to this file that would need to be changed
 * on a per-machine basic (ie local, staging or production).  Any
 * machine-specific settings should be added to _machine_config.php
 */

/**
 * APPLICATION ROOT DIRECTORY
 * If the application doesn't detect this correctly then it can be set explicitly
 */
if (!GlobalConfig::$APP_ROOT) GlobalConfig::$APP_ROOT = realpath("./");

/**
 * check is needed to ensure asp_tags is not enabled
 */
if (ini_get('asp_tags')) 
	die('<h3>Server Configuration Problem: asp_tags is enabled, but is not compatible with Savant.</h3>'
	. '<p>You can disable asp_tags in .htaccess, php.ini or generate your app with another template engine such as Smarty.</p>');

/**
 * INCLUDE PATH
 * Adjust the include path as necessary so PHP can locate required libraries
 */
set_include_path(
		GlobalConfig::$APP_ROOT . '/libs/' . PATH_SEPARATOR .
		'phar://' . GlobalConfig::$APP_ROOT . '/libs/phreeze-3.3.8.phar' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/../phreeze/libs' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/vendor/phreeze/phreeze/libs/' . PATH_SEPARATOR .
		get_include_path()
);

/**
 * COMPOSER AUTOLOADER
 * Uncomment if Composer is being used to manage dependencies
 */
// $loader = require 'vendor/autoload.php';
// $loader->setUseIncludePath(true);

/**
 * SESSION CLASSES
 * Any classes that will be stored in the session can be added here
 * and will be pre-loaded on every page
 */
require_once "App/ExampleUser.php";

/**
 * RENDER ENGINE
 * You can use any template system that implements
 * IRenderEngine for the view layer.  Phreeze provides pre-built
 * implementations for Smarty, Savant and plain PHP.
 */
require_once 'verysimple/Phreeze/SavantRenderEngine.php';
GlobalConfig::$TEMPLATE_ENGINE = 'SavantRenderEngine';
GlobalConfig::$TEMPLATE_PATH = GlobalConfig::$APP_ROOT . '/templates/';

/**
 * ROUTE MAP
 * The route map connects URLs to Controller+Method and additionally maps the
 * wildcards to a named parameter so that they are accessible inside the
 * Controller without having to parse the URL for parameters such as IDs
 */
GlobalConfig::$ROUTE_MAP = array(

	// default controller when no route specified
	'GET:' => array('route' => 'Default.Home'),
		
	// example authentication routes
	'GET:loginform' => array('route' => 'SecureExample.LoginForm'),
	'POST:login' => array('route' => 'SecureExample.Login'),
	'GET:secureuser' => array('route' => 'SecureExample.UserPage'),
	'GET:secureadmin' => array('route' => 'SecureExample.AdminPage'),
	'GET:logout' => array('route' => 'SecureExample.Logout'),

	'GET:vendas' => array('route' => '/vendas.html'),
		
	// Cliente
	'GET:clientes' => array('route' => 'Cliente.ListView'),
	'GET:cliente/(:any)' => array('route' => 'Cliente.SingleView', 'params' => array('cpf' => 1)),
	'GET:api/clientes' => array('route' => 'Cliente.Query'),
	'POST:api/cliente' => array('route' => 'Cliente.Create'),
	'GET:api/cliente/(:any)' => array('route' => 'Cliente.Read', 'params' => array('cpf' => 2)),
	'PUT:api/cliente/(:any)' => array('route' => 'Cliente.Update', 'params' => array('cpf' => 2)),
	'DELETE:api/cliente/(:any)' => array('route' => 'Cliente.Delete', 'params' => array('cpf' => 2)),
		
	// Compra
	'GET:compras' => array('route' => 'Compra.ListView'),
	'GET:compra/(:num)' => array('route' => 'Compra.SingleView', 'params' => array('idcompra' => 1)),
	'GET:api/compras' => array('route' => 'Compra.Query'),
	'POST:api/compra' => array('route' => 'Compra.Create'),
	'GET:api/compra/(:num)' => array('route' => 'Compra.Read', 'params' => array('idcompra' => 2)),
	'PUT:api/compra/(:num)' => array('route' => 'Compra.Update', 'params' => array('idcompra' => 2)),
	'DELETE:api/compra/(:num)' => array('route' => 'Compra.Delete', 'params' => array('idcompra' => 2)),
		
	// Pagamento
	'GET:pagamentos' => array('route' => 'Pagamento.ListView'),
	'GET:pagamento/(:num)' => array('route' => 'Pagamento.SingleView', 'params' => array('id' => 1)),
	'GET:api/pagamentos' => array('route' => 'Pagamento.Query'),
	'POST:api/pagamento' => array('route' => 'Pagamento.Create'),
	'GET:api/pagamento/(:num)' => array('route' => 'Pagamento.Read', 'params' => array('id' => 2)),
	'PUT:api/pagamento/(:num)' => array('route' => 'Pagamento.Update', 'params' => array('id' => 2)),
	'DELETE:api/pagamento/(:num)' => array('route' => 'Pagamento.Delete', 'params' => array('id' => 2)),
		
	// Produto
	'GET:produtos' => array('route' => 'Produto.ListView'),
	'GET:produto/(:num)' => array('route' => 'Produto.SingleView', 'params' => array('idproduto' => 1)),
	'GET:api/produtos' => array('route' => 'Produto.Query'),
	'POST:api/produto' => array('route' => 'Produto.Create'),
	'GET:api/produto/(:num)' => array('route' => 'Produto.Read', 'params' => array('idproduto' => 2)),
	'PUT:api/produto/(:num)' => array('route' => 'Produto.Update', 'params' => array('idproduto' => 2)),
	'DELETE:api/produto/(:num)' => array('route' => 'Produto.Delete', 'params' => array('idproduto' => 2)),
		
	// ProdutosComprado
	'GET:produtoscomprados' => array('route' => 'ProdutosComprado.ListView'),
	'GET:produtoscomprado/(:num)' => array('route' => 'ProdutosComprado.SingleView', 'params' => array('idcompra' => 1)),
	'GET:api/produtoscomprados' => array('route' => 'ProdutosComprado.Query'),
	'POST:api/produtoscomprado' => array('route' => 'ProdutosComprado.Create'),
	'GET:api/produtoscomprado/(:num)' => array('route' => 'ProdutosComprado.Read', 'params' => array('idcompra' => 2)),
	'PUT:api/produtoscomprado/(:num)' => array('route' => 'ProdutosComprado.Update', 'params' => array('idcompra' => 2)),
	'DELETE:api/produtoscomprado/(:num)' => array('route' => 'ProdutosComprado.Delete', 'params' => array('idcompra' => 2)),

	// catch any broken API urls
	'GET:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'PUT:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'POST:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'DELETE:api/(:any)' => array('route' => 'Default.ErrorApi404')
);

/**
 * FETCHING STRATEGY
 * You may uncomment any of the lines below to specify always eager fetching.
 * Alternatively, you can copy/paste to a specific page for one-time eager fetching
 * If you paste into a controller method, replace $G_PHREEZER with $this->Phreezer
 */
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Tbcompra","tbcompra_ibfk_1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Tbpagamento","tbpagamento_ibfk_1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Tbprodutosparacompra","tbprodutosparacompra_ibfk_1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
?>