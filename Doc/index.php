<!DOCTYPE html>
<html>
<head>
	<title>Documentation du projet</title>
	<style type="text/css">
		*{font-family: Verdana;}
		
		.object{
			font-style: italic;
			color: blue;
			font-size: 0.8em;
			font-weight: 400;
		}
		.objectref{
			font-style: italic;
			color: blue;
			font-weight: 600;
			text-decoration: underline;
		}
		.attr{
			color:rgb(120,180,180);
			font-weight: 600;
		}
		a{
			text-decoration: none;
			color: black;
		}
		.static{
			font-style: italic;
			color: blue;
		}
	</style>
</head>
<body>
	<h1>Wild Knight Fever - Doc</h1>
		<nav>
			<ul>
				<li><a href="?class=Objets">Objets</a></li>
				<li><a href="?class=Models">Models</a></li>
			</ul>
		</nav>
		<?php 
			if (key_exists('class', $_GET)) {
				if (!key_exists('value', $_GET)) 
					include ucfirst($_GET['class']).'/index.php';
				else
					include	ucfirst($_GET['class']).'/'.ucfirst($_GET['value']).'info.php';
			} 
		?>
</body>
</html>