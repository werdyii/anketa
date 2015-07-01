	<!-- input Name	-->
    <div class="form-group">
	    {!! Form::label('name', 'Názov ankety:'); !!}
	    {!! Form::text('name', null, ['class'=>'form-control']); !!}
    </div>

	<!-- input Description	-->
    <div class="form-group">
	    {!! Form::label('description', 'Popis:'); !!}
	    {!! Form::textarea('description', null, ['class'=>'form-control']); !!}
    </div>

	<!-- input Status	-->
    <div class="form-group">
	    {!! Form::label('status', 'Status:'); !!}
	    {!! Form::select('status', array(
	    	'preview'=>'Pred zverejnením príma nové návrhy',
	    	'run'=>'Anketa práve prebieha',
	    	'end'=>'Anketa už skončila'
	    ), ['class'=>'form-control']); !!}
    </div>

	<!-- input Limit	-->
    <div class="form-group">
	    {!! Form::label('limit', 'Minimalny poče návrhov:'); !!}
	    {!! Form::number('limit', null, ['class'=>'form-control']); !!}
    </div>

	<!-- input Published At	-->
    <div class="form-group">
	    {!! Form::label('published_at', 'Zverejnenie ankety:'); !!}
	    {!! Form::date('published_at', date('Y-m-d'), ['class'=>'form-control']); !!}
    </div>

	<!-- input Expires At	-->
    <div class="form-group">
	    {!! Form::label('expires_at', 'Koniec ankety:'); !!}
	    {!! Form::input('date','expires_at', date('Y-m-d'), ['class'=>'form-control']); !!}
    </div>

	{!! Form::submit($LabelSubmitButton, ['class'=>'btn btn-primary active']); !!}
	<a class="btn btn-default active" href="{{ action('Admin\PollsController@index') }}" role="button">Späť</a>