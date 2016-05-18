<?php
/** @package    Sisstc::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * ClienteCriteria allows custom querying for the Cliente object.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the ModelCriteria class which is extended from this class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @inheritdocs
 * @package Sisstc::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class ClienteCriteriaDAO extends Criteria
{

	public $Cpf_Equals;
	public $Cpf_NotEquals;
	public $Cpf_IsLike;
	public $Cpf_IsNotLike;
	public $Cpf_BeginsWith;
	public $Cpf_EndsWith;
	public $Cpf_GreaterThan;
	public $Cpf_GreaterThanOrEqual;
	public $Cpf_LessThan;
	public $Cpf_LessThanOrEqual;
	public $Cpf_In;
	public $Cpf_IsNotEmpty;
	public $Cpf_IsEmpty;
	public $Cpf_BitwiseOr;
	public $Cpf_BitwiseAnd;
	public $Nome_Equals;
	public $Nome_NotEquals;
	public $Nome_IsLike;
	public $Nome_IsNotLike;
	public $Nome_BeginsWith;
	public $Nome_EndsWith;
	public $Nome_GreaterThan;
	public $Nome_GreaterThanOrEqual;
	public $Nome_LessThan;
	public $Nome_LessThanOrEqual;
	public $Nome_In;
	public $Nome_IsNotEmpty;
	public $Nome_IsEmpty;
	public $Nome_BitwiseOr;
	public $Nome_BitwiseAnd;
	public $Email_Equals;
	public $Email_NotEquals;
	public $Email_IsLike;
	public $Email_IsNotLike;
	public $Email_BeginsWith;
	public $Email_EndsWith;
	public $Email_GreaterThan;
	public $Email_GreaterThanOrEqual;
	public $Email_LessThan;
	public $Email_LessThanOrEqual;
	public $Email_In;
	public $Email_IsNotEmpty;
	public $Email_IsEmpty;
	public $Email_BitwiseOr;
	public $Email_BitwiseAnd;
	public $Datadenascimento_Equals;
	public $Datadenascimento_NotEquals;
	public $Datadenascimento_IsLike;
	public $Datadenascimento_IsNotLike;
	public $Datadenascimento_BeginsWith;
	public $Datadenascimento_EndsWith;
	public $Datadenascimento_GreaterThan;
	public $Datadenascimento_GreaterThanOrEqual;
	public $Datadenascimento_LessThan;
	public $Datadenascimento_LessThanOrEqual;
	public $Datadenascimento_In;
	public $Datadenascimento_IsNotEmpty;
	public $Datadenascimento_IsEmpty;
	public $Datadenascimento_BitwiseOr;
	public $Datadenascimento_BitwiseAnd;
	public $Cep_Equals;
	public $Cep_NotEquals;
	public $Cep_IsLike;
	public $Cep_IsNotLike;
	public $Cep_BeginsWith;
	public $Cep_EndsWith;
	public $Cep_GreaterThan;
	public $Cep_GreaterThanOrEqual;
	public $Cep_LessThan;
	public $Cep_LessThanOrEqual;
	public $Cep_In;
	public $Cep_IsNotEmpty;
	public $Cep_IsEmpty;
	public $Cep_BitwiseOr;
	public $Cep_BitwiseAnd;
	public $Logradouro_Equals;
	public $Logradouro_NotEquals;
	public $Logradouro_IsLike;
	public $Logradouro_IsNotLike;
	public $Logradouro_BeginsWith;
	public $Logradouro_EndsWith;
	public $Logradouro_GreaterThan;
	public $Logradouro_GreaterThanOrEqual;
	public $Logradouro_LessThan;
	public $Logradouro_LessThanOrEqual;
	public $Logradouro_In;
	public $Logradouro_IsNotEmpty;
	public $Logradouro_IsEmpty;
	public $Logradouro_BitwiseOr;
	public $Logradouro_BitwiseAnd;
	public $Numero_Equals;
	public $Numero_NotEquals;
	public $Numero_IsLike;
	public $Numero_IsNotLike;
	public $Numero_BeginsWith;
	public $Numero_EndsWith;
	public $Numero_GreaterThan;
	public $Numero_GreaterThanOrEqual;
	public $Numero_LessThan;
	public $Numero_LessThanOrEqual;
	public $Numero_In;
	public $Numero_IsNotEmpty;
	public $Numero_IsEmpty;
	public $Numero_BitwiseOr;
	public $Numero_BitwiseAnd;
	public $Cidade_Equals;
	public $Cidade_NotEquals;
	public $Cidade_IsLike;
	public $Cidade_IsNotLike;
	public $Cidade_BeginsWith;
	public $Cidade_EndsWith;
	public $Cidade_GreaterThan;
	public $Cidade_GreaterThanOrEqual;
	public $Cidade_LessThan;
	public $Cidade_LessThanOrEqual;
	public $Cidade_In;
	public $Cidade_IsNotEmpty;
	public $Cidade_IsEmpty;
	public $Cidade_BitwiseOr;
	public $Cidade_BitwiseAnd;
	public $Bairro_Equals;
	public $Bairro_NotEquals;
	public $Bairro_IsLike;
	public $Bairro_IsNotLike;
	public $Bairro_BeginsWith;
	public $Bairro_EndsWith;
	public $Bairro_GreaterThan;
	public $Bairro_GreaterThanOrEqual;
	public $Bairro_LessThan;
	public $Bairro_LessThanOrEqual;
	public $Bairro_In;
	public $Bairro_IsNotEmpty;
	public $Bairro_IsEmpty;
	public $Bairro_BitwiseOr;
	public $Bairro_BitwiseAnd;
	public $Estado_Equals;
	public $Estado_NotEquals;
	public $Estado_IsLike;
	public $Estado_IsNotLike;
	public $Estado_BeginsWith;
	public $Estado_EndsWith;
	public $Estado_GreaterThan;
	public $Estado_GreaterThanOrEqual;
	public $Estado_LessThan;
	public $Estado_LessThanOrEqual;
	public $Estado_In;
	public $Estado_IsNotEmpty;
	public $Estado_IsEmpty;
	public $Estado_BitwiseOr;
	public $Estado_BitwiseAnd;
	public $Telefone_Equals;
	public $Telefone_NotEquals;
	public $Telefone_IsLike;
	public $Telefone_IsNotLike;
	public $Telefone_BeginsWith;
	public $Telefone_EndsWith;
	public $Telefone_GreaterThan;
	public $Telefone_GreaterThanOrEqual;
	public $Telefone_LessThan;
	public $Telefone_LessThanOrEqual;
	public $Telefone_In;
	public $Telefone_IsNotEmpty;
	public $Telefone_IsEmpty;
	public $Telefone_BitwiseOr;
	public $Telefone_BitwiseAnd;

}

?>