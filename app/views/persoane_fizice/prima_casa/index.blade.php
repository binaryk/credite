@extends('~layouts.datatable.index')

 

@section('datatable-specific-page-jquery-initializations')
	form.aftershow = function(record,action){
		if (action == 'insert')
		{
			$('input').iCheck('uncheck');
		}
	}
	$('.action-insert-record').trigger('click');
@stop