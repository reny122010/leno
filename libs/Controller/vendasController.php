<?php
/** @package    SISSTC::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");

/**
 * CompraController is the controller class for the Compra object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package SISSTC::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class VendasController extends AppBaseController
{

	/**
	 * Override here for any controller-specific functionality
	 *
	 * @inheritdocs
	 */
	protected function Init()
	{
		parent::Init();

		// TODO: add controller-wide bootstrap code
		
		// TODO: if authentiation is required for this entire controller, for example:
		// $this->RequirePermission(ExampleUser::$PERMISSION_USER,'SecureExample.LoginForm');
	}

	/**
	 * Displays a list view of Compra objects
	 */
public function Home()
	{
		$this->Render();
	}

	/**
	 * Displayed when an invalid route is specified
	 */
	public function Error404()
	{
		$this->Render();
	}

	/**
	 * Display a fatal error message
	 */
	public function ErrorFatal()
	{
		$this->Render();
	}

	public function ErrorApi404()
	{
		$this->RenderErrorJSON('An unknown API endpoint was requested.');
	}

}

?>
