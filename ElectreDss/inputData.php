<?php
    session_start();

    if (!isset($_SESSION['n1']) || !isset($_SESSION['n2'])) {
        echo '
            <script>
                alert("Jumlah Baris Belum di SET");
                document.location.href = "home.php";
            </script>
        ';
    exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Input</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>	
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<?php include 'header.html'; ?>
	<section class="main-content">
		<div class="container">
		<?php if(isset($_SESSION['barisAlt'])): ?>
			<div class="form-group">
				<div class="col-xs">

			<form method="POST" action="hitung.php">
				<?php 
					$barisAlt = $_SESSION['barisAlt'];	
					$barisCrit = $_SESSION['barisCrit'];			
				?>				
				<table class="table">	
					<tr>
						<td></td>
						<?php for($i=1;$i<=$barisCrit+1;$i++): ?>
						<tr>					
							<?php for($k=0;$k<=3;$k++): ?>							
								<?php if($i==$barisCrit+1 && $k==0): ?>
									<td>
										
									</td>								
								<?php elseif($k==0): ?>							
									<td>
										<?= $_SESSION['n2'][$i-1]; ?>
									</td>						
								<?php elseif($i==$barisCrit+1): ?>
									<td>							
										<input type="text" class="form-control" name='w[<?= "1$k" ?>]' required>	
									</td>
								<?php else: ?>
									<td>							
										<input type="text" class="form-control" name='cel[<?= "$i$k" ?>]' required>
										</div>
									</td>
								<?php endif; ?>
							<?php endfor; ?>
						</tr>	
					<?php endfor; ?>
						
					</tr>
					<?php for($i=1;$i<=$barisAlt+1;$i++): ?>
						<tr>					
							<?php for($k=0;$k<=3;$k++): ?>							
								<?php if($i==$barisAlt+1 && $k==0): ?>
									<td>
										BOBOT
									</td>								
								<?php elseif($k==0): ?>							
									<td>
										<?= $_SESSION['n1'][$i-1]; ?>
									</td>						
								<?php elseif($i==$barisAlt+1): ?>
									<td>							
										<input type="text" class="form-control" name='w[<?= "1$k" ?>]' required>	
									</td>
								<?php else: ?>
									<td>							
										<input type="text" class="form-control" name='cel[<?= "$i$k" ?>]' required>
										</div>
									</td>
								<?php endif; ?>
							<?php endfor; ?>
						</tr>	
					<?php endfor; ?>				
				</table>	
				<div class="btn btn-group-toggle btn-block" data-toggle="buttons">
					<label class="btn btn-secondary active">
				  		<input type="radio" name="options" id="option1" value="1" checked> Benefit
				  	</label>
				  	<label class="btn btn-secondary">
				    	<input type="radio" name="options" id="option2" value="2"> Cost
				  	</label>				  	
				</div>				
				<button type="submit" class="btn btn-dark btn-block" name="submit">SUBMIT</button>
			</form>
				</div>				
			</div>
		<?php else: ?>

		<?php endif; ?>
		</div>
	</section>
	<?php include 'footer.html'; ?>
</body>
</html>