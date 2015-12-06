<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Fun-Porsche</title>
    <link href="./style/style.css" rel="stylesheet">
	<?  //session_start(); ?>
</head>
<body bgproperties = "fixed">
<div id="st" align="center">
    <pre>                             </pre>
<nav class="menu">
    <ul>
        <li><a href="./index.php?action=index">Home</a></li>
        <li><a href="./index.php?action=news">News</a>
            <ul>
                <li><a href="./index.php?action=top">Top</a></li>
                <li><a href="./index.php?action=new">New</a></li>
                <li><a href="./index.php?action=other">Other</a>
                    <ul>
                        <li><a href="./index.php?action=buy">Buy car</a></li>
                        <li><a href="./index.php?action=rent">Rent car</a></li>
                        <li><a href="./index.php?action=repair">Repair car</a></li>
                        <li><a href="./index.php?action=other_n">Other</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="./index.php?action=gallery">Gallery</a>
            <ul>
                <li><a href="./index.php?action=movie">Movie</a></li>
                <li><a href="./index.php?action=photo">Photo</a></li>
            </ul>
        </li>
        <li><a href="./index.php?action=about">About us</a></li>
    </ul>
</nav>
<!--    <pre>  </pre>
    <nav class="menu"><ul><li><a href="./index.php?action=login">login</a>
	<!--
	//if(isset($_SESSION['auth']) && $_SESSION['auth'] == true):
	//<a href="./index.php?action=logout">logout</a>    endif; 
				//require_once("./view/out.php");
			//else
			//<a href="./index.php?action=login">login</a> endif;
				//require_once("./view/in.php"); 
	</li></ul></nav>-->
</div>
<!--
<ul id="nav">
    <li><a href="#">Home</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Contact</a></li>
</ul>-->
<!--
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript">
    $("#nav").addClass("js").before('<div id="menu">&#9776;</div>');
    $("#menu").click(function(){
        $("#nav").toggle();
    });
    $(window).resize(function(){
        if(window.innerWidth > 768) {
            $("#nav").removeAttr("style");
        }
    });
</script>
</body>
</html>-->