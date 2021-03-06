<?php
/** @package Sisstc::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("PagamentoMap.php");

/**
 * PagamentoDAO provides object-oriented access to the tbpagamento table.  This
 * class is automatically generated by ClassBuilder.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the Model class which is extended from this DAO class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Sisstc::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class PagamentoDAO extends Phreezable
{
	/** @var int */
	public $Id;

	/** @var int */
	public $Cpfcliente;

	/** @var float */
	public $Valor;

	/** @var date */
	public $Data;

	/** @var string */
	public $Tipo;


	/**
	 * Returns the foreign object based on the value of Cpfcliente
	 * @return Tbcliente
	 */
	public function GetCpfclienteTbcliente()
	{
		return $this->_phreezer->GetManyToOne($this, "tbpagamento_ibfk_1");
	}


}
?>