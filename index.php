<?php
date_default_timezone_set('Asia/Jakarta');
$thn = date('Y');
$bln = date('m');
$tgl = date('d');
$random = date('s');
$nama = "GAMBAR_".$thn.$bln.$tgl.$random;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewpor" content="width=device-width, initial-scale = 1">
	<title>Camera</title>
	<link href="inc/style.css" rel="stylesheet">
	<link href="inc/font-awesome.min.css" rel="stylesheet">
	<script src="inc/jquery-3.1.1.js"></script>
	<script src="inc/filter.js"></script>
	<script>
		$(document).ready(function() {
			$("#openFilter").click(function() {
				$(".bg,#listFilter").fadeIn(300);
			});
			$("#bukaBlur").click(function() {
				$("#listFilter").fadeOut(200);
				$("#boxBlur").fadeIn(440);
			});
			$("#bukaBright").click(function() {
				$("#listFilter").fadeOut(200);
				$("#boxBright").fadeIn(440);
			});
			$("#bukaContrast").click(function() {
				$("#listFilter").fadeOut(200);
				$("#boxContrast").fadeIn(440);
			});
			$("#bukaGray").click(function() {
				$("#listFilter").fadeOut(200);
				$("#boxGray").fadeIn(440);
			});
		});
	</script>
</head>
<body>

<input type="hidden" id="filterku" value="">

<video id="video"></video>

<div class="kanan">
	<img src="gambar/filterIcon.jpeg" class="tblKanan" id="openFilter">
	<button id="tblSnap" class="tblKanan" onclick="snap()"><i class="fa fa-camera"></i></button><br />
</div>

<div class="bg" id="bg"></div>
<div class="preview" id="preview">
	<div class="bagTombol">
		<button id="btlDownload"><i class="fa fa-close"></i></button><br />
		<a class="tbl" id="okDownload"><i class="fa fa-check"></i></a>
	</div>
	<canvas id="canvas"></canvas>
</div>

<div class="popup" id="listFilter">
	<img src="gambar/blur.png" class="iconFilter" id="bukaBlur">
	<img src="gambar/brightness.png" class="iconFilter" id="bukaBright"><br />
	<img src="gambar/contrast.png" class="iconFilter" id="bukaContrast">
	<img src="gambar/grayscale.png" class="iconFilter" id="bukaGray">
</div>

<div class="boxFilter" id="boxBlur">
	<h3>Blur</h3>
	<form>
		<input type="range" min="0" max="15" id="valueBlur" value="0" step="any"><br />
		<button id="batalBlur" type="button">Batal</button>
		<button id="okeBlur" type="button">Oke</button>
	</form>
</div>

<div class="boxFilter" id="boxBright">
	<h3>Brightness</h3>
	<form>
		<input type="range" min="100" max="190" id="valueBright" value="0" step="any"><br />
		<button id="batalBright" type="button">Batal</button>
		<button id="okeBright" type="button">Oke</button>
	</form>
</div>

<div class="boxFilter" id="boxGray">
	<h3>Grayscale</h3>
	<input type="range" min="100" max="190" id="valueGray" value="0" step="any"><br />
	<button id="bagTombol" type="button">Batal</button>
	<button id="okeGray" type="button">Oke</button>
</div>

<script>
	var video = document.getElementById('video');
	var canvas = document.getElementById('canvas');
	var context = canvas.getContext('2d');

	navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

	if(navigator.getUserMedia) {
		navigator.getUserMedia({video: true}, streamWebCam, throwError);
	}

	function streamWebCam(stream) {
		video.src = window.URL.createObjectURL(stream);
		video.play();
	}

	function throwError(e) {
		console.log("error. ", e);
	}

	function snap() {
		// Default
		canvas.width = video.clientWidth;
		canvas.height = video.clientHeight;
		video.style.display = "none";
		document.getElementById('tblSnap').style.display = 'none';
		document.getElementById('bg').style.display = 'block';
		document.getElementById('preview').style.display = 'block';
		document.getElementById('canvas').style.display = 'block';

		// Add filter
		var filterr = document.getElementById('filterku').value;
		context.filter = filterr;

		// Eksekusi gambar
		context.drawImage(video, 0, 0, 1165, 768);
	}

	function downloadCanvas(link, canvas, filename) {
		link.href = document.getElementById(canvas).toDataURL();
		link.download = filename;
	}

	document.getElementById('okDownload').addEventListener('click', function() {
		console.log(this)
		downloadCanvas(this, 'canvas', '<?php echo $nama; ?>');
		document.location = './';
	}, false);

	document.getElementById("btlDownload").addEventListener("click", function() {
		document.location = "./";
	});

</script>

</body>
</html>