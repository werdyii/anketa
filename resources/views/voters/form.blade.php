	<!-- input Name	-->
    <div class="form-group">
	    {!! Form::label('name', 'Prosím zadajte svoje meno:'); !!}
	    {!! Form::text('name', null, ['class'=>'form-control']); !!}
    </div>

	<!-- ratio Sex -->
	<div class="radio">
	  <label>{!! Form::radio('sex', 'male'); !!} Muž </label>
	</div>
	<div class="radio">
	  <label>{!! Form::radio('sex', 'female'); !!} Žena</label>
	</div>

	{!! Form::submit($LabelSubmitButton, ['class'=>'btn btn-primary active']); !!}
	<a class="btn btn-default active" href="{{ action('VotersController@index') }}" role="button">Späť</a>