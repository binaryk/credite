@extends('~layouts.datatable.actions')

@section('actions-items')
	<li><a href="{{URL::route('apartament_cladire_photo', ['id' => 'apartament_cladire_photo', 'id_apartament' => $record->id])}}">Vezi poze</a></li>
	<li class="divider"></li>
	<li class="action-update-record" data-id="{{$record->id}}"><a href="#"><i class="fa fa-edit"></i> <span>Editare</span></a></li>
	<li class="action-delete-record" data-id="{{$record->id}}"><a href="#"><i class="fa fa-eraser text-red"></i> <span class="text-red">Ştergere</span></a></li>
@stop