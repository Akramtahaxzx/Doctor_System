	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  		<!-- Brand -->
  		<a class="navbar-brand" href="#"><?php echo $_SESSION['patient_name']; ?></a>

  		<!-- Links -->
	  	<ul class="navbar-nav">
	    	<li class="nav-item">
	      		<a class="nav-link" href="profile.php">الملف الشخصي</a>
	    	</li>
	    	<li class="nav-item">
	      		<a class="nav-link" href="dashboard.php">حجز موعد</a>
	    	</li>
	    	<li class="nav-item">
	      		<a class="nav-link" href="appointment.php">مواعيد حجزي</a>
	    	</li>
	    	<li class="nav-item">
	      		<a class="nav-link" href="logout.php">تسجيل الخروج</a>
	    	</li>
	  	</ul>
	</nav>