$(document).ready(function() {
	$(".bg").click(function() {
		$(".bg,.boxFilter,.boxInsertText").fadeOut(300);
	});
	$("#normal").click(function() {
		$("#video").css({"-webkit-filter":"none","filter":"none"});
		$("#filterku").val('none');
	});
	
	$("#blur").click(function() {
		$(".bg,#boxBlur").fadeIn(400);
	});
	$("#okeBlur").click(function() {
		var value = $("#valueBlur").val();
		if(value == '') {
			$("#valueBlur").css({"background":"#e74c3c"});
			return false;
		}
		var filterr = "blur("+value+"px)";
		$("#filterku").val(filterr);
		$("#video").css({
			"-webkit-filter":"blur("+value+"px)",
			"filter":"blur("+value+"px)"
		});
		$(".boxValue").val('');
		$(".bg,#boxBlur").fadeOut(400);
	});
	$("#brightness").click(function() {
		$(".bg,#boxBright").fadeIn(400);
	});
	$("#okeBright").click(function() {
		var value = $("#valueBright").val();
		if(value == '') {
			$("#valueBright").css({"background":"#e74c3c"});
			return false;
		}
		var filterr = "brightness("+value+"%)";
		$("#filterku").val(filterr);
		$("#video").css({
			"-webkit-filter":"brightness("+value+"%)",
			"filter":"brightness("+value+"%)"
		});
		$(".boxValue").val('');
		$(".bg,#boxBright").fadeOut(400);
	});
	$("#grayscale").click(function() {
		$(".bg,#boxGray").fadeIn(400);
	});
	$("#okeGray").click(function() {
		var value = $("#valueGray").val();
		if(value == '') {
			$("#valueGray").css({"background":"#e74c3c"});
			return false;
		}
		var filterr = "grayscale("+value+"%)";
		$("#filterku").val(filterr);
		$("#video").css({
			"-webkit-filter":"grayscale("+value+"%)",
			"filter":"grayscale("+value+"%)"
		});
		$(".boxValue").val('');
		$(".bg,#boxGray").fadeOut(400);
	});
	$("#okText").click(function() {
		var text = $("#teksnya").val();
		var x = $("#posX").val()+'px';
		var y = $("#posY").val()+'px';
		$("#prevText").html(text);
		$("#prevText").css({"top":y,"left":x});
		$(".bg,.boxInsertText").fadeOut(400);
		return false;
	});
	$("#text").click(function() {
		$(".bg,.boxInsertText").fadeIn(400);
	});
});