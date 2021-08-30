<?php
$connection = mysqli_connect('sql3.freemysqlhosting.net', 'sql3433617', 'eM9lT7XZNS', 'sql3433617');

if (!$connection) {
	exit('Невозможно подключиться к базе данных: <br>') . mysql_error();
}

$db = mysqli_select_db($connection, 'sql3433617');

if (!$db) {
	exit('Невозможно выбрать базу данных: <br>') . mysql_error();
}

$result = mysqli_query($connection, 'SELECT * FROM `users`');

if (!$result) {
	exit('Невозможно выполнить запрос к базе данных: <br>') . mysql_error();
}

// var_dump($result);
?>
<!doctype html>
<html lang="en">
  <head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous"/> -->	
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
    	<div class="row">
    		<div class="col-12">
			  <button class="btn btn-success mt-2">
			    <i class="fa fa-plus"></i>					
			  </button>
			  <table class="table">
				  <thead>
					<tr>
					  <th scope="col">#</th>
					  <th scope="col">Name</th>
					  <th scope="col">Age</th>
					</tr>
				  </thead>
				  <tbody>
					<!-- <tr>
					  <th scope="row">1</th>
					  <td>Mark</td>
					  <td>Otto</td>
					  <td>@mdo</td>
					</tr> -->	
					<?php
						while ($row = mysqli_fetch_assoc($result)) {
							echo '<tr>';
							echo '<th scope="row">1</th>';
							echo '<td>'.$row['name'].'</td>';
							echo '<td>'.$row['age'].'</td>';	
							echo '</tr>';
						}
					?>
				  </tbody>
			  </table>			  
			</div>
    	</div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>