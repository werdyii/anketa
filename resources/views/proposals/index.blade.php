<!-- Zobraz všetky ankety -->

@extends('app')

@section('content')
	<h1>Otázky</h1>
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
  		@foreach($proposals as $proposal)
  		<tr>
  			<td><strong>{{ $proposal->id }}</strong></td>
  			<td>{{ $prpoposal->prpoposal }}</td>
  			<td><a class="btn btn-dangerous btn-sm" href="{{ url('/prpoposal/', $poll->id) }}" role="button">X</a>&nbsp;</td>
  		</tr>
      @endforeach

      <!-- http://laravelcollective.com/docs/5.1/html -->
      {!! Form::open(array('url' => 'proposals')) !!}
      <tr>
        <td>x</td>
        <td>
          <!-- input Name -->
            <div class="form-group">
              {!! Form::label('proposal', 'Nová otázka:'); !!}
              {!! Form::text('proposal', null, ['class'=>'form-control']); !!}
            </div>        
        </td>
        <td>
            {!! Form::submit('Pridaj ...', ['class'=>'btn btn-primary active']); !!}
        </td>
      </tr>
      {!! Form::close() !!}

      @include('errors.list')
    </tbody>
  </table>
    
@stop