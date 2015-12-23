UploadFile = {
    photo: function(file, setting) {
        if (file.files && file.files[0]) {
            var reader = new FileReader(),
                upload = setting.upload,
                review = setting.review, 
                source = setting.source,
                type   = setting.type;
            reader.onload = function (e) {
                var image = new Image();
                image.src = e.target.result;
                image.onload = function() {
                    $(review).css("background-image", "url(" + e.target.result + ")");
                    $(review).css("background-size", "cover");
                    $(review).css("background-position", "center center");
                    $(review).css("width", image.width);
                    $(review).css("max-width", "100%");
                    $(review).css("max-height", "30%");
                    $(review).css("opacity", "1.0");
                    $(source).val(e.target.result);
                    $(type).val($(upload).val().split('.').pop().toLowerCase());
                };
            };
            reader.readAsDataURL(file.files[0]);
        }
    },
    photos: function(uploads, setting) {
        if ('files' in uploads) {
            if (uploads.files.length !== 0) {
                $( setting.show ).html("");
                for (var i = 0; i < uploads.files.length; i++) {
                    if (uploads.files && uploads.files[i]) {
                        var current = (i + 1);
                        this.addImage(setting, uploads, i, current);
                    }
                }
            }
        }
    },
    addImage: function(setting, uploads, item, next) {
        var form = "<div id=\"" + setting.review  + "-" + next + "\" style=\"margin:5px;\">";
			form += "<input type=\"hidden\" name=\"Photos[" + item + "][type]\" id=\"" + setting.type + "-" + next + "\" />";
			form += "<input type=\"hidden\" name=\"Photos[" + item + "][source]\" id=\"" + setting.source + "-" + next + "\">";
			form += "</div>";
        $( setting.show ).append( form );
        var reader  = new FileReader(),
            review  = "#" + setting.review + "-" + next,
            source  = "#" + setting.source + "-" + next,
            type    = "#" + setting.type + "-" + next;
        reader.onload = function (e) {
            var image = new Image();
            image.src = e.target.result;
            image.onload = function() {
                $(review).css("background-image", "url(" + e.target.result + ")");
                $(review).css("background-size", "cover");
                $(review).css("background-position", "center center");
                $(review).css("opacity", "1.0");
                $(source).val(e.target.result);
                $(type).val(uploads.files[item].name.split('.').pop().toLowerCase());
            };
        };
        reader.readAsDataURL(uploads.files[item]);
    },
	upload:function (setting, url, data) {
		$.ajax({ type: "POST", url: url, data: data })
		 .done(function( link ) { 
			if(link !== null){
				$(setting.form).html("<div class=\"alert alert-success\" role=\"alert\">Upload Success. " + link + "</div><br />"); 
			} else {
				$(setting.form).html("<div class=\"alert alert-danger\" role=\"alert\">Upload Fail.</div><br />");
			}
		})
		 .fail(function() { $(setting.form).html("<div class=\"alert alert-danger\" role=\"alert\">Upload Fail.</div><br />"); });	
	},
	uploads:function (setting, url, data) {
		$.ajax({ type: "POST", url: url, data: data })
		 .done(function( json ) { 
			var decode = JSON.parse(json);
			var arr = [];
			for(var i in decode){ arr.push(decode[i]); }
			$(setting.form).html("<div class=\"alert alert-success\" role=\"alert\">Upload Success.<hr /> " + arr[1] + "</div><br />"); 
		})
		 .fail(function() { $(setting.form).html("<div class=\"alert alert-danger\" role=\"alert\">Upload Fail.</div><br />"); });	
	}
};