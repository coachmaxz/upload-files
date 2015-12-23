<?php include "include/setting.php"; ?>
<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Uploading single files</title>
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/style.css">
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    </head>
    <body>
    	<span id="setting" style="display:none;" data-base-url="<?php echo $baseUrl; ?>"></span>
        <div class="container">
			<div class="row">
				<div class="col-lg-12 text-right"><br />
					<a href="index.php" class="btn btn-success">Single</a> <a href="multi.php" class="btn btn-success">Multiple</a> 
				</div>
				<div class="col-lg-12">
					<div class="page-header">
						<h1>Single file (pdo + php + ajax)</h1>
					</div>
					<form id="form-upload" class="form-horizontal" method="POST" accept-charset="UTF-8">
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-1 control-label">Upload: </label>
							<div class="col-sm-11">
								<div id="photo-preview" style="margin:5px;">
									<label for="photo-upload" id="photo-label">Choose File</label>
									<input type="file" name="Photo[name]" id="photo-upload" />
									<input type="hidden" name="Photo[type]" id="photo-type" />
									<input type="hidden" name="Photo[source]" id="photo-source">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-1 col-sm-11"><hr />
								<button type="submit" class="btn btn-success" style="width: 150px;">UPLOAD</button>
							</div>
						</div>
					</form>
				</div>	
			</div>
		</div>
		<script src="assets/upload.js"></script>
		<script>
			$(function($) {
				var baseUrl = $("#setting").attr("data-base-url");
				var setting = {
					"form"   : "#form-upload",
					"upload" : "#photo-upload",
					"review" : "#photo-preview",
					"source" : "#photo-source",
					"type"   : "#photo-type"
				};
				$( setting.upload ).change(function(){
					UploadFile.photo(this, setting);
				});
				$( setting.form ).submit(function( event ) {
					event.preventDefault();
					UploadFile.upload(setting,baseUrl+"/upload.php",$(this).serialize());
					return false;
				});
			})(jQuery);
		</script>
    </body>
</html>

<!-- end -->