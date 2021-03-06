<?php
    array_map('unlink', glob("../Predict/*"));
?>

<html>
	<head>
	    <meta name="viewport" content="width=device-width">
	   
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<script src="./jquery.signaturepad.min.js"></script> 
		<script src="https://github.com/niklasvh/html2canvas/releases/download/0.4.1/html2canvas.js"></script>
		
		<script src='utils.js'></script>
		
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
		<link href="./css/basic.css" rel="stylesheet" />
	</head>
	<body>
		<div id="signArea" >
			
			<h3 class="tag-ingo">Predict signature</h3>

			<div class="sig sigWrapper" style="height:auto;">
				<div class="typed"></div>
				<canvas class="sign-pad" id="sign-pad" width="200px" height="125px"></canvas>
			</div>			
			
			<br />
			<button id="btnSaveSign">Predict signature</button>
			<button id="clearCanvas">Clear signature</button>
			<br />
			<br />
			
			<a href='./'>Back to main</a>
		</div>
		
		<script>
			$(document).ready(function() {
			    draw_counter = 0;
			    signs_counter = 0;
			    canvas_counter = 0;
			    imgs_data = [];
			    
				var pad = $('#signArea').signaturePad({
					drawOnly:true,
					penWidth : 5,
					lineColour : '#fff',
					penColour : '#ff1a1a',
					onDraw: function () {					    
						let img = pad.getSignatureImage();
						saveCanvas(imgs_data, canvas_counter++, img);
    				},
    				onDrawEnd: function () {
    				    console.log('Draw ended.');
    				}
				});
				
    			$("#clearCanvas").click(function() {
    			    window.location.reload();
                });
                
                $("#btnSaveSign").click(function(e){
                	html2canvas([document.getElementById('sign-pad')], {
                		onrendered: function (canvas) {
                    		save2Image(imgs_data, '');
                		}
                	});
                });
			});
		</script>
	</body>
</html>
