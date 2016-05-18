<?php
/** @package    Sisstc::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ClienteMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ClienteDAO to the tbcliente datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Sisstc::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class ClienteMap implements IDaoMap, IDaoMap2
{

	private static $KM;
	private static $FM;
	
	/**
	 * {@inheritdoc}
	 */
	public static function AddMap($property,FieldMap $map)
	{
		self::GetFieldMaps();
		self::$FM[$property] = $map;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function SetFetchingStrategy($property,$loadType)
	{
		self::GetKeyMaps();
		self::$KM[$property]->LoadType = $loadType;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetFieldMaps()
	{
		if (self::$FM == null)
		{
			self::$FM = Array();
			self::$FM["Cpf"] = new FieldMap("Cpf","tbcliente","cpf",true,FM_TYPE_BIGINT,20,null,false);
			self::$FM["Nome"] = new FieldMap("Nome","tbcliente","nome",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Email"] = new FieldMap("Email","tbcliente","email",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Datadenascimento"] = new FieldMap("Datadenascimento","tbcliente","datadenascimento",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Cep"] = new FieldMap("Cep","tbcliente","cep",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Logradouro"] = new FieldMap("Logradouro","tbcliente","logradouro",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Numero"] = new FieldMap("Numero","tbcliente","numero",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Cidade"] = new FieldMap("Cidade","tbcliente","cidade",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Bairro"] = new FieldMap("Bairro","tbcliente","bairro",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Estado"] = new FieldMap("Estado","tbcliente","estado",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Telefone"] = new FieldMap("Telefone","tbcliente","telefone",false,FM_TYPE_VARCHAR,255,null,false);
		}
		return self::$FM;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetKeyMaps()
	{
		if (self::$KM == null)
		{
			self::$KM = Array();
			self::$KM["tbcompra_ibfk_1"] = new KeyMap("tbcompra_ibfk_1", "Cpf", "Tbcompra", "Cpfcliente", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["tbpagamento_ibfk_1"] = new KeyMap("tbpagamento_ibfk_1", "Cpf", "Tbpagamento", "Cpfcliente", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
		}
		return self::$KM;
	}

}

?>