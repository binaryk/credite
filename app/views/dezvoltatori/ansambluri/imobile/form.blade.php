<div class="row">
	<div class="col-md-6">
		{{$controls[0]->out()}}
	</div>	

	<div class="col-md-6">
		{{$controls[1]->out()}}
	</div>	

	<div class="col-md-6">
		{{$controls[2]->out()}}
	</div>

	<div class="col-md-6">
		{{$controls[3]->out()}}
	</div>
</div>
{{
	Form::hidden('id_ansamblu', $ansamblu->id, ['id' => 'id_ansamblu', 'class' => 'data-source', 'data-control-source' => 'id_ansamblu', 'data-control-type' => 'persistent'])
}}