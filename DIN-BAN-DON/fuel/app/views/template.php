<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-black.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">	
</head>

<body id="myPage">
	<!-- Navbar -->
	<div class="w3-top">
	 <ul class="w3-navbar w3-theme-d2 w3-left-align w3-large">
	  <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
	    <a class="w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
	  </li>
	  <li><a href="/" class="w3-teal"><i class="fa fa-home w3-margin-right"></i>Logo</a></li>
	  
	  <!--若登入成功，在每一頁印出使用者名稱 & 才可以執行insert等功能 -->
		<?php if(Session::get('user')) {?>
			<li class="w3-hide-small"><a href="/store" class="w3-hover-white">新增店家</a></li>
			<li class="w3-hide-small"><a href="/menu" class="w3-hover-white">新增菜單</a></li>
			<li class="w3-hide-small"><a href="/show_store" class="w3-hover-white">修改資料</a></li>
			<li class="w3-hide-small"><a href="/create" class="w3-hover-white">開團訂購</a></li>
			<li class="w3-hide-small"><a href="#" class="w3-hover-white">Hello~ <?= Session::get('user') ?></a></li>
			<li class="w3-hide-small"><a href="/logout" class="w3-hover-white">Logout</a></li>
		<?php }else{ ?>
			<li class="w3-hide-small"><a class="w3-hover-white">Guest</a></li>
		<?php } ?>
	 </ul>
	</div>

	<!-- Navbar on small screens -->
	<!--<div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:43px;">
	  <ul class="w3-navbar w3-left-align w3-large w3-theme">
	    <li><a href="#">Link 1</a></li>
	    <li><a href="#">Link 2</a></li>
	    <li><a href="#">Link 3</a></li>
	  </ul>
	</div>-->

	<div class="w3-display-container w3-animate-opacity">
	  <img class="testimg" src="img_sailboat.jpg" alt="boat" style="width:100%;min-height:50px;max-height:600px;">
	  <div class="w3-container w3-display-bottomleft w3-margin-bottom">  
	  </div>
	</div>

	<!--Alert Error-->
	<?php if(Session::get_flash('error')){?>
		<div class="w3-container w3-section w3-red">
			<span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
			<h3>Error!</h3>
			<p><?= Session::get_flash('error')?></p>
		</div>
	<?php }?>

	<!--Alert success-->
	<?php if(Session::get_flash('success')){?>
		<div class="w3-container w3-section w3-green">
			<span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
			<h3>Success!</h3>
			<p><?= Session::get_flash('success')?></p>
		</div>
	<?php } ?>


	<!--如果還沒登入，呈現下方兩個表格-->
	<?php if(!Session::get('user')){?>
	<!-- Container -->
		<div class="w3-container w3-padding-64 w3-center">
			<?= $login ?>
		</div>
		<!-- Container -->
		<div class="w3-container w3-padding-64 w3-center">
			<?= $register ?>
		</div>
	<!--如果我登入了才執行下方的動作-->
	<?php } else{?>
		<?= $content ?>
	 <?php } ?>


	<!-- Footer -->
	<footer class="w3-container w3-padding-32 w3-theme-d1 w3-center">
	  <h4>Follow Us</h4>
	  <a class="w3-btn-floating w3-teal" href="javascript:void(0)" title="Facebook"><i class="fa fa-facebook"></i></a>
	  <a class="w3-btn-floating w3-teal" href="javascript:void(0)" title="Twitter"><i class="fa fa-twitter"></i></a>
	  <a class="w3-btn-floating w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-google-plus"></i></a>
	  <a class="w3-btn-floating w3-teal w3-hide-small" href="javascript:void(0)" title="Linkedin"><i class="fa fa-linkedin"></i></a>

	  <div style="position:relative;bottom:100px;z-index:1;" class="w3-tooltip w3-right">
	    <span class="w3-text w3-padding w3-teal w3-hide-small">Go To Top</span>   
	    <a class="w3-btn w3-theme" href="#myPage"><span class="w3-xlarge">
	    <i class="fa fa-chevron-circle-up"></i></span></a>
	  </div>
	</footer>
	<script>
	function w3_open() {
	    var x = document.getElementById("mySidenav");
	    x.style.width = "300px";
	    x.style.textAlign = "center";
	    x.style.fontSize = "40px";
	    x.style.paddingTop = "10%";
	    x.style.display = "block";
	}
	function w3_close() {
	    document.getElementById("mySidenav").style.display = "none";
	}

	// Used to toggle the menu on smaller screens when clicking on the menu button
	function openNav() {
	    var x = document.getElementById("navDemo");
	    if (x.className.indexOf("w3-show") == -1) {
	        x.className += " w3-show";
	    } else { 
	        x.className = x.className.replace(" w3-show", "");
	    }
	}
	</script>

</body>
</html>
