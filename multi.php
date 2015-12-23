<?php include "include/setting.php"; ?>
<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Uploading multiple files</title>
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
						<h1>Multiple files (pdo + php + ajax)</h1>
					</div>
					<form id="form-uploads" class="form-horizontal" method="POST" accept-charset="UTF-8">
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-1 control-label">Upload: </label>
							<div class="col-sm-11">
								<div id="photos-preview" style="margin:5px;">
									<label for="photos-upload" id="photos-label">Choose File</label>
									<input type="file" name="Photos[base]" id="photos-upload" multiple />
								</div>
								<div id="multi-photos"></div>
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
					"form"  : "#form-uploads",
					"show"  : "#multi-photos",
					"upload": "#photos-upload",
					"review": "photos-preview",
					"source": "photos-source",
					"type"  : "photos-type"
				};
				$( setting.upload ).change(function(){
					UploadFile.photos(this, setting);
				});
				$( setting.form ).submit(function( event ) {
					event.preventDefault();
					UploadFile.uploads(setting,baseUrl+"/upload.php",$(this).serialize());
					return false;
				});
			})(jQuery);
		</script>
    </body>
</html>

<!-- end -->