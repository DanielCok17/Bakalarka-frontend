<html>
<head>
<link href="css/speedometer.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<input id="myValues" />
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/speedometer.js"></script>
<script type="text/javascript">
    document.getElementById("myValues").value = 110;
	$("#myValues").speedometer({divFact:10,eventListenerType:'keyup'});
	$("#myValues2").speedometer({divFact:30});
</script>
</html>
