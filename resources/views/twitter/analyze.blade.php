@extends('layouts.app')

@section('content')

<style>
    img {
      border-radius: 50%;
    }
</style>

<h1>Analysis of your Twitter Images</h1>

<div class="w3-container">

    @if($mood =="positive")
      
        <div class="w3-display-container" style="height:600px;">
            
            <div class="w3-display-middle">
                
                    <img src="{{ asset('images/happy.jpg') }}" style="width:350px; height:350px;" alt="" title="">
               
    
               
            </div>
            <div class="w3-display-bottommiddle w3-hide-small">The sentiment of your images give a {{$mood}} sentiment</div>
          
        </div>
        @else
    
    <div class="w3-display-container" style="height:600px;">
            
            <div class="w3-display-middle">
    
               
                    <img src="{{ asset('images/sad.jpg') }}" style="width:350px; height:350px;"alt="" title="">
               
            </div>
            <div class="w3-display-bottommiddle w3-hide-small">The sentiment of your images give a {{$mood}} sentiment</div>
          
        </div>
    
    
    @endif
        <div class="w3-display-container" style="height:100px;">   
          <div id="piechart"></div>

          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

          <script type="text/javascript">
          // Load google charts
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          // Draw the chart and set the chart values
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Sentiment', 'Value'],
            ['Positive', {{$positive}}],
            ['Negative', {{$negative}}],

          ]);

            // Optional; add a title and set the width and height of the chart
            var options = {'title':'Image Sentiment Statistics', 'width':1000, 'height':400};

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
          }
          </script>
        </div>  
</div>






@endsection