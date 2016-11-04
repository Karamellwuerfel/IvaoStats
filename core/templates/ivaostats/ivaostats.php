<div id="data" style="padding: 30px;">

	<h2 style="padding-bottom: 10px;">IVAO Online Users</h2>
	<br>
	<div class="container">
	
		<table>
		  <tr>
			<td><b>Clients peak 24h</b></td>
			<td><?php echo $clients;?></td>
		  </tr>
		  <tr>
			<td><b>Servers</b></td>
			<td><?php echo $servers;?></td>
		  </tr>
		  <tr>
			<td><b>Airports</b></td>
			<td><?php echo $airports;?></td>
		  </tr>
		  <tr>
			<td></td>
			<td></td>
		  </tr>
		  <!-- maybe issue
		  <tr>
			<td><b>Controllers & Others</b></td>
			<td><?php echo $controllers;?></td>
		  </tr>
		  -->
		  <tr>
			<td><b>Pilots</b></td>
			<td><?php echo $pilots;?></td>
		  </tr>
		  <tr>
			<td><b>Observers</b></td>
			<td><?php echo $observers;?></td>
		  </tr>
		    
		</table>
		
	</div>
<div>

<!-- To refresh the content -->
<script type="text/javascript">
	function liveflight(){
	  $("#data").load(location.href + " #data>*", "");
	}
	setInterval(function(){liveflight()}, 10000);
</script>

<style>
	
	
	table {
    border-collapse: collapse;
    width: 30%;
	}

	th, td {
		padding: 8px;
		text-align: left;
		border-bottom: 1px solid #ddd;
	}

	tr:hover{background-color:#e5e5e5}
	
</style>