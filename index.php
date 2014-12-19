<html>
<head>
<title>Matthew Morrone</title>
<meta charset="UTF-8" />
<link href="/psi.ico" 										rel="shortcut icon" type="image/x-icon" />
<link href="/reset.css" 									rel="stylesheet" 	type="text/css" />
<!-- <link href="/bootstrap/css/bootstrap.css" 					rel="stylesheet" type="text/css"></link> -->
<link href="/style.css" 									rel="stylesheet" 	type="text/css" />
<link href="/jquery.ui.css" 								rel="stylesheet" 	type="text/css" />
<link href="/fonts/font-awesome/css/font-awesome.min.css" 	rel="stylesheet" 	type="text/css" />

<script src="/jquery.js"></script>
<script src="/jquery.ui.js"></script>

<script>
Array.prototype.randomElement = function() {return this[Math.floor(Math.random()*this.length)]}
String.prototype.rot13 = function()
{
	return (this ? this : this).split('').map(function(_)
	{
		if (!_.match(/[A-za-z]/)) {return _}
		c = Math.floor(_.charCodeAt(0) / 97)
		k = (_.toLowerCase().charCodeAt(0) - 83) % 26 || 26
		return String.fromCharCode(k + ((c == 0) ? 64 : 96))
	}).join('')
}
function loadpage(url)
{
	$.post(url, function(data)
	{
		$("#content").fadeOut(150, function()
		{
			$("#content").html(data)
			layout()

			$("#content").attr("src", url)
		})
		$("#content").fadeIn(300)
	})
}
function layout()
{
	$("nav, aside").height(Math.max($("nav").height(), $("aside").height()));
	$("nav, aside").outerWidth($("#wrapper").outerWidth()/10);
	$("aside").width("auto");
}
$(function()
{
	layout()
	$(window).resize(function() {layout})
	$("a").click(function(e)
	{
		e.preventDefault()
		if ($(this).hasClass("email"))
		{
			window.open("znvygb:znggurjzbeebar1@tznvy.pbz".rot13())
			return
		}
		else if ($(this).hasClass("project"))
		{
			$(".modal, .overlay").remove()
			$("body").append("<div class='modal'><div class='overlay'><iframe src='"+$(this).attr('href')+"' class='background'></iframe></div></div>")
			$(".overlay").fadeIn()
			$(".modal").click(function(e)
			{
				$(".modal, .overlay").fadeOut(function() {$(".modal, .overlay").remove()})
				$("nav, #content, aside").removeAttr("style")
			})
			return
		}
		else if (!$(this).attr("target"))
		{
			loadpage($(this).attr("href"))
			return
		}
		else
		{
			window.open($(this).attr("href"))
		}
	})
	if (window.location.pathname.substring(1) == "")
	{
		loadpage("/pages/contact.html")
	}
	else
	{
		loadpage("/pages/"+window.location.pathname.substring(1)+".html")
	}
})

</script>
</head>
<body>
<div id="wrapper">
	<header>
		<h1><a href="/">Matthew Morrone</a></h1>
	</header>
	<nav>
		<h1>Projects</h1>
		<ul>
			<li><a class="project" href="/portfolio/colorpicker.html">Color</a></li>
			<li><a class="project" href="/portfolio/counter.html">Counter</a></li>
			<!-- <li><a class="project" href="/portfolio/dicewars.html">Dicewars</a></li> -->
			<li><a class="project" href="/portfolio/graph.html">Graph</a></li>
			<li><a class="project" href="/ipa-chart">IPA</a></li>
			<!-- <li><a class="project" href="/portfolio/browser/lingo">Lingo</a></li> -->
			<li><a class="project" href="/morse-code">Morse</a></li>
			<li><a class="project" href="/spreadsheet">Sheet</a></li>
			<li><a class="project" href="/portfolio/triangle.html">Triangle</a></li>
		</ul>
	</nav>
	<div id="content"></div>
	<aside>
		<h1>Pages</h1>
		<ul>
			<li><a href="/pages/home.html" 		title="Home">Home</a></li>
			<li><a href="/pages/about.html" 	title="About">About</a></li>
			<li><a href="/pages/school.html" 	title="Education">School</a></li>
			<li><a href="/pages/work.html" 		title="Work">Work</a></li>
			<li><a href="/pages/skills.html" 	title="Skills">Skills</a></li>
			<!-- <li><a href="/pages/classes.html" 	title="Classes">Classes</a></li> -->
			<!-- <li><a href="/pages/interests.html" title="interests">Interests</a></li> -->
			<!-- <li><a href="/pages/more.html" 		title="More">More</a></li> -->
			<li><a href="/pages/fun.html" 		title="Fun">Fun</a></li>
			<li><a href="/pages/contact.html" 	title="Contact">Contact</a></li>
		</ul>
	</aside>
	<footer>
		<span><a href="/"><img id="icon" src="psi.ico" height="18" width="18" style="vertical-align: middle;"></a></span>
		<span><a class="email" 									title="copyright"	target="_blank">&copy;2014 Matthew Morrone</a></span>
		<span>&nbsp;|&nbsp;</span>
		<span><a href="http://lnkd.in/C7Unz6" 					title="LinkedIn" 	target="_blank"><i class="icon-linkedin icon-large" id="li"></i></a></span>
		<span>&nbsp;|&nbsp;</span>
		<span><a href="https://github.com/matthewmorrone1" 		title="GitHub" 		target="_blank"><i class="icon-github 	icon-large" id="gh"></i></a></span>
		<span>&nbsp;|&nbsp;</span>
		<span><a href="https://facebook.com/matthewmorrone" 	title="Facebook" 	target="_blank"><i class="icon-facebook icon-large" id="fb"></i></a></span>
	</footer>
</div>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','http://www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-42927190-1', 'apexmentis.com');
ga('send', 'pageview');
</script>
</body>
</html>