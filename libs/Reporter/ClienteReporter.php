<?php
/** @package    Sisstc::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Cliente object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Sisstc::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class ClienteReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `tbcliente` table
	public $CustomFieldExample;

	public $Cpf;
	public $Nome;
	public $Email;
	public $Datadenascimento;
	public $Cep;
	public $Logradouro;
	public $Numero;
	public $Cidade;
	public $Bairro;
	public $Estado;
	public $Telefone;

	/*
	* GetCustomQuery returns a fully formed SQL statement.  The result columns
	* must match with the properties of this reporter object.
	*
	* @see Reporter::GetCustomQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomQuery($criteria)
	{
		$sql = "select
			'custom value here...' as CustomFieldExample
			,`tbcliente`.`cpf` as Cpf
			,`tbcliente`.`nome` as Nome
			,`tbcliente`.`email` as Email
			,`tbcliente`.`datadenascimento` as Datadenascimento
			,`tbcliente`.`cep` as Cep
			,`tbcliente`.`logradouro` as Logradouro
			,`tbcliente`.`numero` as Numero
			,`tbcliente`.`cidade` as Cidade
			,`tbcliente`.`bairro` as Bairro
			,`tbcliente`.`estado` as Estado
			,`tbcliente`.`telefone` as Telefone
		from `tbcliente`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();
		$sql .= $criteria->GetOrder();

		return $sql;
	}
	
	/*
	* GetCustomCountQuery returns a fully formed SQL statement that will count
	* the results.  This query must return the correct number of results that
	* GetCustomQuery would, given the same criteria
	*
	* @see Reporter::GetCustomCountQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomCountQuery($criteria)
	{
		$sql = "select count(1) as counter from `tbcliente`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>