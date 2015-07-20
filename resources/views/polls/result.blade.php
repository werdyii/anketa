<!-- Zobraziť aktualny vysledok hlasovania  -->
@extends('app')

@section('content')
	<h1>{{ $poll->name }}</h1>
	<p>{{ $poll->description }}</p>
	<hr>

	<h3> Aktualný prehlad bodov</h3>
	<div class="row">
		<div class="col-md-6 col-xs-6">
			<canvas id="research-graph" width="600" height="300"></canvas>		
		</div>
		<div class="col-md-6 col-xs-6">
			<ul id="research-graph-label" class="list-group">
			@foreach($research_list as $list)
			<li class="list-group-item">
				<span class="glyphicon glyphicon-stop" aria-hidden="true"></span>
				{{ $list->proposal }} body ( {{ $list->total_ratio }} )
				<progress value="{{ $list->total_ratio }}" max="20" class="progress">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $list->total_ratio }}" aria-valuemin="0" aria-valuemax="100">				    
                    <span class="sr-only">{{ $list->total_ratio }} bodov</span>
                  </div>
				</progress>
			</li>
			@endforeach
			</ul>
		</div>
	</div>

	<h3> Na potazky odpovedalo celkom {{ $poll->researches->count() }}</h3>
	<div class="row">
		<div class="col-md-6 col-xs-6">
			<ul id="sex-graph-label" class="list-group">
			@foreach($sex_list as $list)
			<li class="list-group-item">
				<span class="glyphicon glyphicon-stop" aria-hidden="true"></span>
				{{ $list->sex }} body ( {{ $list->total_sex }} )
			</li>
			@endforeach
			</ul>
		</div>
		<div class="col-md-6 col-xs-6">
			<canvas id="sex-graph" width="600" height="300"></canvas>		
		</div>
	</div>

	<a class="btn btn-default btn-block" href="{{ url('/') }}" role="button">Ok</a>
@stop

@section('jscript')
<script type="text/javascript" src="/js/chart.min.js"></script>

<script type="text/javascript">
	(function () {
		var ctx1 = document.getElementById('research-graph').getContext('2d');
		var ctx2 = document.getElementById('sex-graph').getContext('2d');

		var data = <?= json_encode($research_list) ?>;
		var sex_data = <?= json_encode($sex_list) ?>;
		var colors = [ "cornflowerblue", 
	              "olivedrab", 
	              "orange", 
	              "tomato", 
	              "crimson", 
	              "purple", 
	              "turquoise", 
	              "forestgreen", 
	              "navy", 
	              "gray",
	              "cornflowerblue", 
	              "olivedrab", 
	              "orange", 
	              "tomato", 
	              "crimson", 
	              "purple", 
	              "turquoise", 
	              "forestgreen", 
	              "navy", 
	              "gray"];
	              
		var journal = [];
		
		function addEntry(value, label, color) {
		  journal.push({
		    value: value,
		    label: label,
		    color: color
		  });
		}	              
	              
		var index;
		for	(index = 0; index < data.length; index++) {
		    addEntry(data[index].total_ratio,data[index].proposal,colors[index]);
		    jQuery("ul#research-graph-label li:eq("+index+") span").css( "color", colors[index] );
		}
		
		var sex=[];
		for	(index = 0; index < sex_data.length; index++) {
			sex.push({
				value: sex_data[index].total_sex,
				label: sex_data[index].sex,
				color: colors[index]
			});
		    jQuery("ul#sex-graph-label li:eq("+index+") span").css( "color", colors[index] );
		}
		
					
		var options = {
		    //Boolean - Whether we should show a stroke on each segment
		    segmentShowStroke : true,
		
		    //String - The colour of each segment stroke
		    segmentStrokeColor : "#fff",
		
		    //Number - The width of each segment stroke
		    segmentStrokeWidth : 2,
		
		    //Number - The percentage of the chart that we cut out of the middle
		    percentageInnerCutout : 50, // This is 0 for Pie charts
		
		    //Number - Amount of animation steps
		    animationSteps : 100,
		
		    //String - Animation easing effect
		    animationEasing : "easeOutBounce",
		
		    //Boolean - Whether we animate the rotation of the Doughnut
		    animateRotate : true,
		
		    //Boolean - Whether we animate scaling the Doughnut from the centre
		    animateScale : true,
		    
		    // Boolean - whether or not the chart should be responsive and resize when the browser does.
    		responsive: true,
		
		    //String - A legend template
		    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"

		};
					
		//var myLineChart = new Chart(ctx).Line(data, options);
		var myDoughnutChart1 = new Chart(ctx1).Doughnut(journal,options);
		var myDoughnutChart2 = new Chart(ctx2).Doughnut(sex,options);
		
	})();
</script>

@stop