<!-- Zobraz všetky ankety -->

@extends('app')

@section('content')
	<h1>Ankety</h1>
	<hr>

  <ul id="myTabs" class="nav nav-tabs nav-justified" role="tablist">
    <li role="presentation" ><a href="#preview" id="preview-tab" role="tab" data-toggle="tab" aria-controls="preview" aria-expanded="true">Preview</a></li>
    <li role="presentation" class="active"><a href="#run" id="run-tab" role="tab" data-toggle="tab" aria-controls="run" aria-expanded="false" >Run</a></li>
    <li role="presentation"><a href="#end" id="end-tab" role="tab" data-toggle="tab" aria-controls="end" aria-expanded="false" >End</a></li>
  </ul>
  <div id="myTabContent" class="tab-content">
    <div role="tabpanel" class="tab-pane fade" id="preview" aria-labelledby="preview-tab">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Meno</th>
            <th>Popis</th>
            <th>Status</th>
            <th>Limit</th>
            <th>Začiatok ankety</th>
            <th>Spusti anketu</th>
          </tr>
        </thead>
        <tbody>
      @foreach($polls_preview as $poll)
      <tr>
        <td><strong>{{ $poll->name }}</strong></td>
        <td>{{ $poll->description }}</td>
        <td><small>[ {{$poll->status}} ]</small></td>
        <td>{{ $poll->limit }}</td>
        <td>{{ $poll->published_at }}</td>
        <td><a class="btn btn-default btn-sm" href="{{ url('/proposals', $poll->id) }}" role="button">Pridaj svoj navrh do ankety</a>&nbsp;</td>
      </tr>
      @endforeach
        </tbody>
      </table>
    </div>
    <div role="tabpanel" class="tab-pane fade active in" id="run" aria-labelledby="run-tab">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Meno</th>
            <th>Popis</th>
            <th>Status</th>
            <th>Limit</th>
            <th>Spusti anketu</th>
          </tr>
        </thead>
        <tbody>
      @foreach($polls_run as $poll)
      <tr>
        <td><strong>{{ $poll->name }}</strong></td>
        <td>{{ $poll->description }}</td>
        <td><small>[ {{$poll->status}} ]</small></td>
        <td>{{ $poll->limit }}</td>
        <td><a class="btn btn-default btn-sm" href="{{ url('/step1', $poll->id) }}" role="button">Spusti Anketu</a>&nbsp;</td>
      </tr>
      @endforeach
        </tbody>
      </table>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="end" aria-labelledby="end-tab">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Meno</th>
            <th>Popis</th>
            <th>Expires At</th>
          </tr>
        </thead>
        <tbody>
      @foreach($polls_end as $poll)
      <tr>
        <td><strong>{{ $poll->name }}</strong></td>
        <td>{{ $poll->description }}</td>
        <td><small>[ {{$poll->expires_at}} ]</small></td>
      </tr>
      @endforeach
        </tbody>
      </table>
    </div>
  </div>
  	    
@stop