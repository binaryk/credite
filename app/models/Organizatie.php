<?php
namespace Imobiliare;
class Organizatie extends \Eloquent {
	protected $table = 'organizatii';
	protected $fillable = [
							'denumire',
							'telefon',
							'fax',
							'adresa',
							'email',
							'anul_infiintarii',]; 


	public static function getRecord( $id )
	{
	    return self::find($id);
	}

	public static function createRecord($data )
	{
	    return self::create($data);
	}

	public static function updateRecord($id, $data)
	{
	    $record = self::find($id);
	    if( ! $record )
	    {
	        return false;
	    }
	    return $record->update($data);
	}

	public static function deleteRecord($id, $data)
	{
	    $record = self::find($id);
	    if( ! $record )
	    {
	        return false;
	    }
	    return $record->delete();
	}

	public static function toCombobox()
	{
	    return [0 => ' -- Selectaţi organizatie --'] + self::orderBy('nume')->lists('nume', 'id');
	}
}