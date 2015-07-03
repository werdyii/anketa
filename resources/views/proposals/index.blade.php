<!-- Zobraz všetky ankety -->
@extends('app')

@section('content')
  <h1>{{ $poll->name }}</h1>
  <p>{{ $poll->description }}</p>
  <hr>
	<h2>Otázky</h2>
	<hr>

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No.</th>
        <th>Otázka</th>
        <th>Vymaž</th>
      </tr>
    </thead>
    <tbody>
      <!-- http://laravelcollective.com/docs/5.1/html -->
      {!! Form::open(array('url' => 'proposals')) !!}
      <input type="hidden" name="poll_id" value="{{ $poll->id }}">
      <tr>
        <td>x</td>
        <td class="form-horizontal">
          <!-- input Name -->
            <div class="form-group">
              {!! Form::label('proposal', 'Nová otázka:', ['class'=>'col-sm-2 control-label']); !!}
              <div class="col-sm-10">
                {!! Form::text('proposal', null, ['class'=>'form-control input-sm']); !!}
              </div>
            </div>        
        </td>
        <td>
            {!! Form::submit('Pridaj ...', ['class'=>'btn btn-primary btn-sm active']); !!}
        </td>
      </tr>
      {!! Form::close() !!}

  		@foreach($proposals as $proposal)
  		<tr>
  			<td><strong>{{ $proposal->id }}</strong></td>
  			<td>{{ $prpoposal->prpoposal }}</td>
  			<td><a class="btn btn-dangerous btn-sm" href="{{ url('/proposal/', $poll->id) }}" role="button">X</a>&nbsp;</td>
  		</tr>
      @endforeach

      @include('errors.list')
    </tbody>
  </table>
    
@stop