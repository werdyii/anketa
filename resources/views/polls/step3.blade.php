<!-- Ohodnoť vybrate 3 varianty -->

@extends('app')

@section('content')

	<h2>{{ $voter['name'] }} <small>{{ $voter['sex'] }}</small></h2>

	<h4>Oboduj otázočky čim 3 body najviac 1 bod najmenej</h4>
	<table class="table">
		<thead>
			<th>3</th>
			<th>2</th>
			<th>1</th>
			<th>Voľba</th>
		</thead>
		<tbody>
		{!! Form::open(array('url' => 'step3')) !!}
		@foreach($proposals as $proposal)
			<tr>
	  			<td><input type="radio" name="ratio[{{ $proposal->id }}]" data-col="3" value="3"></td>
	  			<td><input type="radio" name="ratio[{{ $proposal->id }}]" data-col="2" value="2"></td>
	  			<td><input type="radio" name="ratio[{{ $proposal->id }}]" data-col="1" value="1"></td>
	  			<td>{{ $proposal->proposal }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	<div class="row">
  		<div class="col-lg-6 col-md-6 col-xs-6">
		<a class="btn btn-default btn-block" href="{{ url('step2') }}" role="button">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		späť
		</a>
		</div>
  		<div class="col-lg-6 col-md-6 col-xs-6">
		<button type="submit" value="Submit" class="btn btn-default btn-block">
		  pokračuj
		  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		</button>
		</div>
	</div>
		{!! Form::close() !!}

	@include('errors.list')
	    
@stop


@section('jscript')
<script type="text/javascript">
	var col, el;

	jQuery("input[type=radio]").click(function() {
	   el = $(this);
	   col = el.data("col");
	   $("input[data-col=" + col + "]").prop("checked", false);
	   el.prop("checked", true);
	});
</script>
@stop