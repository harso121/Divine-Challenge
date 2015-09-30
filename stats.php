<?php 
	require_once('config/config.php');
	
    $username = DB_USER; 
    $password = DB_PASS; 
    $host = DB_HOST; 
    $dbname = DB_NAME; 
	
    try 
    { 
        $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options); 
    } 
    catch(PDOException $ex) 
    { 
        die("Failed to connect to the database." . $ex); 
        echo "fail";
    } 
     
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
     
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);  
     
	$numberRegistered = $db->query('select count(*) from users')->fetchColumn(); 		
		
?>

<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" /> 
		<title>Stats - Divine Challenge</title> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/reset.css" />
		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<script type='text/javascript' src='js/jquery-1.11.1.min.js'></script>
		<script type='text/javascript' src='js/jquery.particleground.min.js'></script>
		<script type='text/javascript' src='js/lol.js'></script>
		<meta name="description" content="Divine Challenge Statistics">
		<meta name="author" content="Divine">

		<!-- CSS -->
		<link rel="stylesheet" href="css/style3.css">
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
			
		<!-- JS -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
			
    </head>
    <body>
	<div id="header">
		<div class="wrap">
			<p>Welcome to the</p>
			<h1>DIVINE CHALLENGE</h1>
		</div>
	</div>
	<div id="content">
		<p id="title">STATS</p>
		<div id="stats" style="height: 80%; width: 60%; margin: auto;"></div>
		<script>
			new Morris.Line({
			element: 'stats',
	
			data: [
			{ probNum: '0', curr: 20 },
			{ probNum: '1', curr: 10 },
			{ probNum: '2', curr: 5 },
			{ probNum: '3', curr: 5 },
			{ probNum: '4', curr: 20 }
			],
	
			xkey: 'probNum',

			ykeys: ['curr'],

			labels: ['Curr']
			});
		</script>
		<div id="tableForm">
			<p style="font-size: 1.1em;">REGISTERED PARTICIPANTS: <?php echo $numberRegistered; ?></p>
			<div class="datagrid">
				<table>
					<tbody>
						<tr><td>1</td><td>MeshCollider</td><td>2015410</td><td>7</td></tr>
						<tr><td>2</td><td>Nex</td><td>1234567</td><td>6</td></tr>
						<tr><td>3</td><td>Omni</td><td>1234567</td><td>6</td></tr>
					</tbody>
				</table>
			</div>
		<div id="footer">
			<p class="alignLeft">Copyright (C) Divine 2015</p>
			<p class="alignRight"> Support Thread (LINK)</p>
			<div style="clear: both;"></div>
		</div>
	</div>
    </body>
</html>
