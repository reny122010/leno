<?php
/** @package    SISSTC::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/ProdutosComprado.php");

/**
 * ProdutosCompradoController is the controller class for the ProdutosComprado object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package SISSTC::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class ProdutosCompradoController extends AppBaseController
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
	 * Displays a list view of ProdutosComprado objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for ProdutosComprado records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new ProdutosCompradoCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Idcompra,Idproduto,Quantidade,Valor'
				, '%'.$filter.'%')
			);

			// TODO: this is generic query filtering based only on criteria properties
			foreach (array_keys($_REQUEST) as $prop)
			{
				$prop_normal = ucfirst($prop);
				$prop_equals = $prop_normal.'_Equals';

				if (property_exists($criteria, $prop_normal))
				{
					$criteria->$prop_normal = RequestUtil::Get($prop);
				}
				elseif (property_exists($criteria, $prop_equals))
				{
					// this is a convenience so that the _Equals suffix is not needed
					$criteria->$prop_equals = RequestUtil::Get($prop);
				}
			}

			$output = new stdClass();

			// if a sort order was specified then specify in the criteria
 			$output->orderBy = RequestUtil::Get('orderBy');
 			$output->orderDesc = RequestUtil::Get('orderDesc') != '';
 			if ($output->orderBy) $criteria->SetOrder($output->orderBy, $output->orderDesc);

			$page = RequestUtil::Get('page');

			if ($page != '')
			{
				// if page is specified, use this instead (at the expense of one extra count query)
				$pagesize = $this->GetDefaultPageSize();

				$produtoscomprados = $this->Phreezer->Query('ProdutosComprado',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $produtoscomprados->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $produtoscomprados->TotalResults;
				$output->totalPages = $produtoscomprados->TotalPages;
				$output->pageSize = $produtoscomprados->PageSize;
				$output->currentPage = $produtoscomprados->CurrentPage;
			}
			else
			{
				// return all results
				$produtoscomprados = $this->Phreezer->Query('ProdutosComprado',$criteria);
				$output->rows = $produtoscomprados->ToObjectArray(true, $this->SimpleObjectParams());
				$output->totalResults = count($output->rows);
				$output->totalPages = 1;
				$output->pageSize = $output->totalResults;
				$output->currentPage = 1;
			}


			$this->RenderJSON($output, $this->JSONPCallback());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method retrieves a single ProdutosComprado record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idcompra');
			$produtoscomprado = $this->Phreezer->Get('ProdutosComprado',$pk);
			$this->RenderJSON($produtoscomprado, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new ProdutosComprado record and render response as JSON
	 */
	public function Create()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$produtoscomprado = new ProdutosComprado($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $produtoscomprado->Idcompra = $this->SafeGetVal($json, 'idcompra');

			$produtoscomprado->Idproduto = $this->SafeGetVal($json, 'idproduto');
			$produtoscomprado->Quantidade = $this->SafeGetVal($json, 'quantidade');
			$produtoscomprado->Valor = $this->SafeGetVal($json, 'valor');

			$produtoscomprado->Validate();
			$errors = $produtoscomprado->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$produtoscomprado->Save();
				$this->RenderJSON($produtoscomprado, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing ProdutosComprado record and render response as JSON
	 */
	public function Update()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$pk = $this->GetRouter()->GetUrlParam('idcompra');
			$produtoscomprado = $this->Phreezer->Get('ProdutosComprado',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $produtoscomprado->Idcompra = $this->SafeGetVal($json, 'idcompra', $produtoscomprado->Idcompra);

			$produtoscomprado->Idproduto = $this->SafeGetVal($json, 'idproduto', $produtoscomprado->Idproduto);
			$produtoscomprado->Quantidade = $this->SafeGetVal($json, 'quantidade', $produtoscomprado->Quantidade);
			$produtoscomprado->Valor = $this->SafeGetVal($json, 'valor', $produtoscomprado->Valor);

			$produtoscomprado->Validate();
			$errors = $produtoscomprado->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$produtoscomprado->Save();
				$this->RenderJSON($produtoscomprado, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing ProdutosComprado record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idcompra');
			$produtoscomprado = $this->Phreezer->Get('ProdutosComprado',$pk);

			$produtoscomprado->Delete();

			$output = new stdClass();

			$this->RenderJSON($output, $this->JSONPCallback());

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}
}

?>
