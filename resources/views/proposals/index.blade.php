<!-- Zobraz všetky ankety -->
@extends('app')

@section('content')
  <h1>{{ $poll->name }}</h1>
  <p>{{ $poll->description }}</p>
  <hr>
    <h3>Otázky</h3>
    <!-- http://laravelcollective.com/docs/5.1/html -->
    {!! Form::open(array('url' => 'proposals')) !!}
    <input type="hidden" name="poll_id" value="{{ $poll->id }}">

    <ul class="list-unstyled">
      <li>
        <div class="input-group"> 
          <!-- input type="text" class="form-control" placeholder="Search for..." -->
          {!! Form::text('proposal', null, ['class'=>'form-control input-sm']); !!}
          <span class="input-group-btn">
            <!-- button class="btn btn-default" type="button">Go!</button -->
            {!! Form::submit('Pridaj ...', ['class'=>'btn btn-primary btn-sm active']); !!}
          </span>
        </div>
      </li>
      
  		@foreach($proposals as $proposal)
			  <li>{{ $proposal->proposal }}</li>
  			<!-- td><a class="btn btn-dangerous btn-sm" href="{{ url('/proposal', $poll->id) }}" role="button">X</a>&nbsp;</td -->
      @endforeach

      @include('errors.list')
    </ul>
    {!! Form::close() !!}
@stop