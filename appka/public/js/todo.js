
<script>
    function incTimer() {
        var currentMinutes = Math.floor(totalSecs / 60);
        var currentSeconds = totalSecs % 60;
        if(currentSeconds <= 9) currentSeconds = "0" + currentSeconds;
        if(currentMinutes <= 9) currentMinutes = "0" + currentMinutes;
        totalSecs++;
          $("#timer").text(currentMinutes + ":" + currentSeconds);
          setTimeout('incTimer()', 1000);
    }
    totalSecs = 0;

    $(document).ready(function() {
        $("#start").click(function() {
            incTimer();            
        });
    });    
</script>

<script>
  $(document).ready(function() {
    setTimeout(function() {
        $('#start').click();
    }, 1);
});
</script>


<script>
   $(document).ready(function() {
    setTimeout(function() {
        $('#start').click();
        myFunction();
        //alert("Vráť spať zachranne zložky!");
        //window.open('http://127.0.0.1:8000/welcomeDelete/{{$data2[0]['_id']}}');
    }, 10000);
});
</script>

<script>
   $(document).ready(function() {
    setTimeout(function() {
        $('#start').click();
        alert("Vráť spať zachranne zložky!");       
        //window.open('http://127.0.0.1:8000/welcomeDelete/{{$data2[0]['_id']}}');  // !!!!!!!!!!!!!// !!!!!!!!!!!!!
        
    }, 20000);
});
</script>

<script>
function myFunction() {
  var txt;
  if (confirm("Prajete si vyriešiť autonehodu manuálne?!")) {
    txt = "Manuálne vyriešenie nehody!";
  } else {
    txt = "Nehoda bude vyriešená automaticky!";    

      //window.open('http://127.0.0.1:8000/editedWelcome/    // !!!!!!!!!!!!! $data3[0]['_id']}}')
  }
  document.getElementById("demo").innerHTML = txt;
}
</script>


@if(isset($data['car_position']) && $data['car_position'] == 0  )<td>Na kolesách</td> @endif
    @if(isset($data['car_position']) && $data['car_position'] == 1  )<td>Na ľavom boku</td> @endif
    @if(isset($data['car_position']) && $data['car_position'] == 2  )<td>Na streche</td> @endif
    @if(isset($data['car_position']) && $data['car_position'] == 3  )<td>Na pravom boku</td> @endif