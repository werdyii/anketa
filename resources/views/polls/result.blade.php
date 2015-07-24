<!-- Zobraziť aktualny vysledok hlasovania  -->
@extends('app')

@section('content')
	<h1>{{ $poll->name }}</h1>
	<p>{{ $poll->description }}</p>
	<hr>

	<h3> Aktualný prehlad bodov</h3>
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<canvas id="research-graph" width="600" height="300"></canvas>		
		</div>
		<div class="col-xs-12 col-sm-6">
			<ul id="research-graph-label" class="list-group">
			@foreach($research_list as $list)
			<li class="list-group-item">
				<span class="glyphicon glyphicon-stop" aria-hidden="true"></span>
				{{ $list->proposal }} body ( {{ $list->total_ratio }} ) <br/>
				<progress class="ratio" value="{{ $list->total_ratio }}" max="1000000" >
                    <span class="sr-only">{{ $list->total_ratio }} bodov</span>
				</progress>
			</li>
			@endforeach
			</ul>
		</div>
	</div>

	<h3> Na potazky odpovedalo celkom {{ $poll->researches->count() }}</h3>
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<ul id="sex-graph-label" class="list-group">
			@foreach($sex_list as $list)
			<li class="list-group-item">
				<span class="glyphicon glyphicon-stop" aria-hidden="true"></span>
				{{ $list->sex }} body ( {{ $list->total_sex }} )
				<progress class="sex" value="{{ $list->total_sex }}" max="1000000" >
                    <span class="sr-only">{{ $list->total_sex }} bodov</span>
				</progress>				
			</li>
			@endforeach
			</ul>
		</div>
		<div class="col-xs-12 col-sm-6">
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
	              

		var index;
		var sum_ratio = 0;
		var sum_sex = 0;
		var journal = [];
		for	(index = 0; index < data.length; index++) {
			journal.push({
				value: data[index].total_ratio,
				label: data[index].proposal,
				color: colors[index]
			});
			sum_ratio += parseInt( data[index].total_ratio, 10);
		    jQuery("ul#research-graph-label li:eq("+index+") span").css( "color", colors[index] );
		}
		
		var sex=[];
		for	(index = 0; index < sex_data.length; index++) {
			sex.push({
				value: sex_data[index].total_sex,
				label: sex_data[index].sex,
				color: colors[index]
			});
			sum_sex += parseInt( sex_data[index].total_sex, 10);
		    jQuery("ul#sex-graph-label li:eq("+index+") span").css( "color", colors[index] );
		}
		console.log("sum ratio "+ sum_ratio + " , sum sex "+sum_sex);
		jQuery("progress.ratio[value]").attr("max",sum_ratio);
		jQuery("progress.sex[value]").attr("max",sum_sex);
					
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

<style type="text/css">
	/* https://css-tricks.com/html5-progress-element/ */
	progress[value] {
	  /* Reset the default appearance */
	  -webkit-appearance: none;
	     -moz-appearance: none;
	          appearance: none;
	  
	  /* Get rid of default border in Firefox. */
	  border: none;
	  
	  /* Dimensions */
	  width: 100%;
	  height: 3px;
	  
	  /* IE 10 */
	  color: red;
	}
	progress[value]::-webkit-progress-value{
	  background-color: red;
	  border-radius: 5px;
	}
	progress[value]::-webkit-progress-bar{
	  background-color: lightgray;
	  border-radius: 5px;
	  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.25) inset;
	}
	progress[value]::-moz-progress-bar{
	  background-color: red;
	  border-radius: 5px;
	}
</style>
@stop