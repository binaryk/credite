<div class="row">
	<div class="col-md-4">
		{{ $controls[0]->out() }}
	</div>
	<div class="col-md-4">
		{{ $controls[1]->out() }}
	</div>
	<div class="col-md-4">
		{{ $controls[2]->out() }}
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		{{ $controls[3]->out() }}
	</div>
	<div class="col-md-4">
		{{ $controls[4]->out() }}
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		{{ $controls[5]->out() }}
	</div>
</div>
{{
	Form::hidden('id_imobil', $imobil->id, ['id' => 'id_imobil', 'class' => 'data-source', 'data-control-source' => 'id_imobil', 'data-control-type' => 'persistent'])
}}