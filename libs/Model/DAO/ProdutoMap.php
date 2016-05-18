<?php
/** @package    Sisstc::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ProdutoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ProdutoDAO to the tbproduto datastore.
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
class ProdutoMap implements IDaoMap, IDaoMap2
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
			self::$FM["Idproduto"] = new FieldMap("Idproduto","tbproduto","Idproduto",true,FM_TYPE_INT,11,null,true);
			self::$FM["Codigodebarras"] = new FieldMap("Codigodebarras","tbproduto","codigodebarras",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Nome"] = new FieldMap("Nome","tbproduto","nome",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Preco"] = new FieldMap("Preco","tbproduto","preco",false,FM_TYPE_DECIMAL,10.2,null,false);
			self::$FM["Custo"] = new FieldMap("Custo","tbproduto","custo",false,FM_TYPE_DECIMAL,10.2,null,false);
			self::$FM["Quantidade"] = new FieldMap("Quantidade","tbproduto","quantidade",false,FM_TYPE_INT,11,null,false);
			self::$FM["Unidade"] = new FieldMap("Unidade","tbproduto","unidade",false,FM_TYPE_VARCHAR,255,null,false);
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
			self::$KM["tbprodutosparacompra_ibfk_1"] = new KeyMap("tbprodutosparacompra_ibfk_1", "Idproduto", "Tbprodutosparacompra", "Idproduto", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
		}
		return self::$KM;
	}

}

?>