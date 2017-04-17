<?

?>

<html>
<head>
<title>Matthew Morrone</title>
<link rel="import" href="load.html" onload="" onerror="">
<script>
(function() {
	var i, len, methods = Object.getOwnPropertyNames(Array.prototype)
	for (i = 0, len = methods.length; i < len; i += 1) {
		if (arguments.constructor.prototype.hasOwnProperty(methods[i]) === false) {
			arguments.constructor.prototype.define(methods[i], Array.prototype[methods[i]])
		}
		if (NodeList.prototype.hasOwnProperty(methods[i]) === false) {
			NodeList.prototype.define(methods[i], Array.prototype[methods[i]])
		}
	}
}())
$(function() {
	$.post("api.php", {mode: "ls", handle: ".", dataType: "html:table", "debug": true}, function(data) {
		$("body").hide().html(data)
		var $name, $link
		$("body").find("tr").each(function() {
			$name = $(this).find("th, td").eq(1)
			$link = $(this).find("th, td").eq(2)
			$name.html($name.text().link($link.text()))
			$link.remove()
		})
		$("body").fadeIn(1000)
	})
})
var log = console.log.bind(console)

var konamiKeys = [], konami = "38,38,40,40,37,39,37,39,66,65";
$(document).keydown(function(e) {
	konamiKeys.push(e.keyCode)
	if (konamiKeys.toString().indexOf(konami) >= 0) {
		$(document).unbind('keydown', arguments.callee)
		alert("god mode enabled")
		var cmd = prompt("type a command")
		// var cmd = "agent"
		$.post("api.php", {mode: cmd, dataType: "html", "debug": true}, function(data) {
			$("body").hide().html(data).fadeIn(1000)
		})

	}
})

</script>
</head>
<body>

</body>
</html>

