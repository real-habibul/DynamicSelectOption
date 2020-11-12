<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Dynamic Select Model</title>
  </head>
  <body>
  	<div class="container">
		<div class="row mt-2 justify-content-md-center">
				
  			<div class="col-6">
	  			<div class="card">
	  				<div class="card-body">
	  					<form>
						  <div class="form-group">
						    <label for="provinsi">Provinsi</label>
						    <select class="form-control" id="provinsi" name="provinsi">
						      	<option value="">-- Pilih Provinsi --</option>
						      	<?php foreach ($provinsi as $prov): ?>
					      		<option value="<?=$prov['id'];?>"><?=$prov['nama'];?></option>
						      <?php endforeach; ?>
						    </select>
						  </div>
						  <div class="form-group">
						    <label for="kabupaten">Kabupaten</label>
						    <select class="form-control" id="kabupaten" name="kabupaten">
						      <option value="">-- Pilih Kabupaten --</option>
						    </select>
						  </div>
						  <div class="form-group">
						    <label for="kecamatan">Kecamatan</label>
						    <select class="form-control" id="kecamatan" name="kecamatan">
						      <option value="">-- Pilih Kecamatan --</option>
						    </select>
						  </div>
						  <div class="form-group">
						    <label for="desa">Desa</label>
						    <select class="form-control" id="desa" name="desa">
						      <option value="">-- Pilih Desa --</option>
						    </select>
						  </div>
						  <div class="form-group">
							<button type="button" name="ambilData" id="ambilData" class="btn btn-primary">ambilData di Console Log</button>
							<p id="allDatas"></p>
						  </div>
						</form>
	  				</div>
	  			</div>
  			</div>
		</div>
  	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script>
    	$(document).ready(function () {
			$('#provinsi').change(function() {
				var id = $(this).val();
				$.ajax({
					type: "post",
					url: "<?=base_url('select/getKabupaten')?>",
					data: {
						id:id
					},
					dataType: "JSON",
					success: function (response) {
						// console.log(response);
						$('#kabupaten').html(response);
					}
				});
			});

			$('#kabupaten').change(function() {
				var id = $(this).val();
				$.ajax({
					type: "post",
					url: "<?=base_url('select/getKecamatan')?>",
					data: {
						id:id
					},
					dataType: "JSON",
					success: function (response) {
						// console.log(response);
						$('#kecamatan').html(response);
					}
				});
			});

			$('#kecamatan').change(function() {
				var id = $(this).val();
				$.ajax({
					type: "post",
					url: "<?=base_url('select/getDesa')?>",
					data: {
						id:id
					},
					dataType: "JSON",
					success: function (response) {
						// console.log(response);
						$('#desa').html(response);
					}
				});
			});

			$('#ambilData').click(function() {
				var dataProv = $('#provinsi').val();
				var dataKab = $('#kabupaten').val();
				var dataKec = $('#kecamatan').val();
				var dataDesa = $('#desa').val();

				var allData = [dataProv, dataKab, dataKec, dataDesa];
				document.getElementById("allDatas").innerHTML = allData;
				console.log(allData);
			});
		});
    </script>
  </body>
</html>