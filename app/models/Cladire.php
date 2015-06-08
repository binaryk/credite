<?php

namespace Imobiliare;

use \Illuminate\Database\Eloquent\SoftDeletingTrait;

class Cladire extends \Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'cladiri';
    protected $fillable = [ 
      'id_imobil',
      'id_localitate',
      'id_tip_destinatie',
      'id_tip_regim_inaltime',
      'id_tip_stadiu',
      'nr_spatii_indivize',
      'nume',
      'ascensor',
      'adresa',
      'telefon',
      'email',
      'carte_funciara',

    ];

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
        return [0 => ' -- Selectaţi cladire --'] + self::orderBy('nume')->lists('nume', 'id');
    }
}