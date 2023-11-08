<?php 
	session_start();	

	if(isset($_POST['submit'])){
		$_SESSION['barisAlt'] = $_POST['barisAlt'];
		$barisAlt = $_SESSION['barisAlt'];

		$_SESSION['barisCrit'] = $_POST['barisCrit'];
		$barisCrit = $_SESSION['barisCrit'];
	}	

	if(isset($_POST['kirim'])){
		
		if (isset($_POST['barisAlt']) && isset($_POST['barisCrit'])) {
			// Set the session variables 'barisAlt' and 'barisCrit'
			$_SESSION['barisAlt'] = $_POST['n1'];
			$_SESSION['barisCrit'] = $_POST['n2'];

			// Loop to store the values in two separate session variables
			for ($i = 0; $i < min($_SESSION['barisAlt'], $_SESSION['barisCrit']); $i++) {
				$_SESSION['nt1'][$i] = $_POST['n1'];
				$_SESSION['nt2'][$i] = $_POST['n2'];
			}

			// // Redirect to another page after processing
			header("Location: inputData.php");
			exit;
		
		} else {
			echo '
				<script>
					alert("N1 and/or N2 is missing in the form data");
					document.location.href = "home.php";
				</script>
			';
			exit;
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Electre Method</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>	
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<?php include 'header.html'; ?>
	<section class="main-content">
		<div class="container">
			<!-- Button Submit -->
			<?php if(isset($_POST['submit'])): ?>
				<h4>Input The Data</h4>

				<form class="text-center" method="POST" action="">	
					<table>
					<table class="table">
						<tr>
							<th>ALTERNATIF</th>
							<th>NAMA</th>
						</tr>
						<?php for($i=0;$i<$barisAlt;$i++): ?>
						<tr>
							<td><?= $i+1 ?></td>
							<td>
								<input type="text" class="form-control" name="n[<?= $i ?>]" required>
							</td>
						</tr>
						<?php endfor ?>					
					</table>
					<br>
					<table class="table">
						<tr>
							<th>Criteria</th>
							<th>NAMA</th>
						</tr>
						<?php for($i=0;$i<$barisCrit;$i++): ?>
						<tr>
							<td><?= $i+1 ?></td>
							<td>
								<input type="text" class="form-control" name="n[<?= $i ?>]" required>
							</td>
						</tr>
						<?php endfor ?>					
					</table>
					</table>			
					
					<button type="submit" class="btn btn-dark" name="kirim">KIRIM</button>
				</form>
				
			<?php else: ?>

			<!-- Button trigger modal -->
			<button type="button" class="btn btn-dark btn-block" data-toggle="collapse" data-target="#exampleModal">MULAI</button>
			<br>

			<!-- Modal -->
			<div class="collapse" id="exampleModal">

				<!-- Modal Alternatif -->
        		<h5 id="exampleModalLabel">Jumlah Alternatif dan Criteria</h5>
				    <form class="text-center" method="POST" action="">			
						<input type="text" class="form-control" name="barisAlt" placeholder="jumlah baris Alternatif" required>
						<br>
						<input type="text" class="form-control" name="barisCrit" placeholder="jumlah baris Criteria" required>
						<br>
						<button type="submit" class="btn btn-dark" name="submit">Submit</button>
					</form>	    
				<br>
					
			</div>	
		
			<?php endif; ?>
		</div>
	</section>
	<?php include 'footer.html'; ?>
</body>
</html>