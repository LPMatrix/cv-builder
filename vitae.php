<?php 	include 'settings/session.php';
	include 'header.php';

	include 'settings/config.php';
	$db = DB();
	include 'settings/library.php';
	$app = new library;

	$stmt = $app->runQuery("SELECT * FROM users_info JOIN users ON users_info.user = users.user_id WHERE users_info.user = 1");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
	<article class="resume-wrapper text-center position-relative">
	    <div class="resume-wrapper-inner mx-auto text-left bg-white shadow-lg"  id="print_content">
		    <header class="resume-header pt-4 pt-md-0">
			    <div class="media flex-column flex-md-row">
				    <!-- <img class="mr-3 img-fluid picture mx-auto" src="assets/images/profile.jpg" alt=""> -->
				    <div class="media-body p-4 d-flex flex-column flex-md-row mx-auto mx-lg-0">
					    <div class="primary-info">
						    <h1 class="name mt-0 mb-1 text-white text-uppercase text-uppercase"><?= $row['name'] ?></h1>
						    <div class="title mb-3"><?= $row['email'] ?></div>
						    <ul class="list-unstyled">
							    <li class="mb-2"><a href="#"><i class="fa fa-globe fa-fw mr-2" data-fa-transform="grow-3"></i><?= $row['website'] ?></a></li>
						    </ul>
					    </div><!--//primary-info-->
					    
				    </div><!--//media-body-->
			    </div><!--//media-->
		    </header>
		    <div class="resume-body p-5">
			    <section class="resume-section summary-section mb-5">
				    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Career Summary</h2>
				    <div class="resume-section-content">
					    <p class="mb-0"><?= $row['about'] ?></p>
				    </div>
			    </section><!--//summary-section-->
			    <div class="row">
				    <div class="col-lg-12">
					    <section class="resume-section experience-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Work Experience</h2>
						    <div class="resume-section-content">
							    <div class="resume-timeline position-relative">
								    <article class="resume-timeline-item position-relative pb-5">
									    
									    <div class="resume-timeline-item-header mb-2">
										    <div class="d-flex flex-column flex-md-row">
										        <h3 class="resume-position-title font-weight-bold mb-1">Lead Developer</h3>
										        <div class="resume-company-name ml-auto">Startup Hub</div>
										    </div><!--//row-->
										    <div class="resume-position-time">2018 - Present</div>
									    </div><!--//resume-timeline-item-header-->
									    <div class="resume-timeline-item-desc">
										    <p>Role description goes here ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Donec pede justo, fringilla vel.</p>
									    </div><!--//resume-timeline-item-desc-->

								    </article><!--//resume-timeline-item-->
								    
								    
							    </div><!--//resume-timeline-->
							    
							    				    
							    
						    </div>
					    </section><!--//experience-section-->

					    <section class="resume-section skills-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Skills &amp; Tools</h2>
						    <div class="resume-section-content">
						        <div class="resume-skill-item">
							        <ul class="list-inline">
									    <li class="list-inline-item"><span class="badge badge-primary badge-pill">Angular</span></li>
									    <li class="list-inline-item"><span class="badge badge-primary badge-pill">Python</span></li>
									    <li class="list-inline-item"><span class="badge badge-primary badge-pill">jQuery</span></li>
									    <li class="list-inline-item"><span class="badge badge-primary badge-pill">Webpack</span></li>
									    <li class="list-inline-item"><span class="badge badge-primary badge-pill">HTML/SASS</span></li>
									    <li class="list-inline-item"><span class="badge badge-primary badge-pill">PostgresSQL</span></li>
								    </ul>
						        </div><!--//resume-skill-item-->
						     
						    </div><!--resume-section-content-->
					    </section><!--//skills-section-->
					    <section class="resume-section education-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Education</h2>
						    <div class="resume-section-content">
							    <ul class="list-unstyled">
								    <li class="mb-2">
								        <div class="resume-degree font-weight-bold"><?= $row['education'] ?> in <?= $row['title'] ?></div>
								        <div class="resume-degree-org">University College London</div>
								        <div class="resume-degree-time">2010 - 2011</div>
								    </li>
							    </ul>
						    </div>
					    </section><!--//education-section-->
					    <section class="resume-section reference-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Awards</h2>
						    <div class="resume-section-content">
							    <ul class="list-unstyled resume-awards-list">
								    <li class="mb-2 pl-4 position-relative">
								        <i class="resume-award-icon fas fa-trophy position-absolute" data-fa-transform="shrink-2"></i>
								        <div class="resume-award-name">Award Name Lorem</div>
								        <div class="resume-award-desc">Award desc goes here, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo.</div>
								    </li>
								    <li class="mb-0 pl-4 position-relative">
								        <i class="resume-award-icon fas fa-trophy position-absolute" data-fa-transform="shrink-2"></i>
								        <div class="resume-award-name">Award Name Ipsum</div>
								        <div class="resume-award-desc">Award desc goes here, ultricies nec, pellentesque.</div>
								    </li>
							    </ul>
						    </div>
					    </section><!--//interests-section-->
				    </div>

					    
					    
			    </div><!--//row-->
		    </div><!--//resume-body-->
		    
		    
	    </div>
    </article>
	<div class="d-flex justify-content-center"><button class="btn btn-primary" onclick="Clickheretoprint()">Download PDF</button></div>
<?php include 'footer.php'; ?>
<script language="javascript">
	function Clickheretoprint()
	{ 
	  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
	      disp_setting+="scrollbars=yes,width=400, height=400, left=100, top=25"; 
	  var content_vlue = document.getElementById("print_content").innerHTML; 
	  
	  var docprint=window.open("","",disp_setting); 
	   docprint.document.open(); 
	   docprint.document.write('<html><head><title>CVPro</title>');
	   docprint.document.write('<link rel="stylesheet" href="css/font-awesome.min.css">');
	   docprint.document.write('<link rel="stylesheet" href="css/bootstrap.css">');
	   docprint.document.write('<link rel="stylesheet" href="css/pillar-1.css">'); 
	   docprint.document.write('</head><body onLoad="self.print()">');          
	   docprint.document.write(content_vlue);          
	   docprint.document.write('</body></html>'); 
	   docprint.document.close(); 
	   docprint.focus(); 
	}
</script>