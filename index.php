<!DOCTYPE html>
<html>
  <head>
    <?php include "head.php" ?>
    <!-- styles -->
    <link href="css/styles2.css" rel="stylesheet">   
   
  </head>
  <body>
	 <!--  -->

	<div class="page-content container">
		<br><br>
		<h3> Mesin Penerjemah Statitik </h3>
		<div class="row" >
			
			<div class="col-md-12 mb-1 row">
				
				<div class="col-md-4">
				<select name="algoritma" class="form-control" form="aksi" required>
				  <option>-- Pilih Algoritma --</option>
				  <option value="witten-bell">Witten Bell</option>
				  <option value="kneser-ney">Kneser-Ney</option>
				  <option value="modified-kn">Modified Kneser-Ney</option>
				  <option value="back-off">Back Off</option>
				</select>
				</div>

				<div class="col-md-4">
				<select name="bahasa" class="form-control" form="aksi" required>
				  <option>-- Pilih Bahasa --</option>
				  <option value="1">Indonesia >> Melayu Sambas</option>
				  <option value="2">Melayu Sambas >> Indonesia</option>
				</select>
				</div>

				<div class="col-md-4">
				<div class="form-check">
				  <input form="aksi" class="form-check-input" type="radio" name="gram-number" id="exampleRadios1" value="3" checked>
				  <label class="form-check-label" for="exampleRadios1">
				    3 N-gram
				  </label>
				</div>
				<div class="form-check">
				  <input form="aksi" class="form-check-input" type="radio" name="gram-number" id="exampleRadios2" value="5">
				  <label class="form-check-label" for="exampleRadios2">
				    5 N-gram
				  </label>
				</div>
				</div>

				
			</div>
			<div class="col-md-6 text-justify">
	            <div class="card" id="tentang">
	                <div class="card-body">
				        <div class="box">
				            <div class="content-wrap">
				               <h5>Ketik Disini</h5>
				               <hr>
								<form id="aksi" method="post">
								   	<div class="form-group">
										<div class="col-md-4">
											<textarea name="isi" cols="45" rows="8" class="form-
									 			control"></textarea>
									 		<br><br>
											<button class="btn btn-primary signup" type="submit" name="Kirim">Terjemahkan</button>
										</div>		
									</div>		
								</form>
	             			</div>
				        </div>
				    </div>
				</div>
			</div>
			
			<div class="col-md-6 text-justify">
             	<div class="card" id="tentang">
               		<div class="card-body">
			        	<div class="box">
			            	<div class="content-wrap">
			               	<h5>Hasil Terjemahan</h5>
			               	<hr>
			               	<form action="index.php" method="post">
							   	<div class="form-group">
									<div class="col-md-4">
										<textarea id="hasil" name="hasil" cols="45" rows="8" class="form-
								 			control"></textarea>
								 		<br><br>
								 		<input class="btn btn-primary signup" type="submit" value="Refresh">
									</div>		
								</div>			
             				</div>
			        	</div>
			   		</div>
				</div>
			</div>
		</div>
	</div>

	<?php
		include "footer.php"; 
	?>
  </body>
</html>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.offline.js"></script>
    <!-- <script src="jquery/jquery.js" ></script> -->

    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    
<script language="JavaScript">
    	$("#aksi").on('submit',(function(e){
    		e.preventDefault();
    		var myForm = document.getElementById('aksi');
    		console.log(myForm);
    		$.ajax({
    			url:"aksi.php",
    			type :"POST",
    			data : new FormData(myForm),
    			contentType : false,
    			cache : false,
    			processData : false,
    			beforeSend :function(){
    				// alert("ade jalan");
    		},
    			success : function(data){
    				document.getElementById("hasil").value = data;
    			},
    			error : function(data){

    			}
    		});
    	}));
    </script>