<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin:700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
</head>

<body id="page-top">
    <nav class="navbar navbar-light navbar-expand-md navbar navbar-expand-lg fixed-top" id="mainNav">
        <div class="container"><a class="navbar-brand js-scroll-trigger" href="#main">Scp Foundation</a><button data-toggle="collapse" class="navbar-toggler navbar-toggler-right" data-target="#navbarResponsive" type="button" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation" value="Menu"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item nav-link js-scroll-trigger" role="presentation"><a class="nav-link active js-scroll-trigger" href="#database">Database</a></li>
                    <li role="presentation" class="nav-item nav-link js-scroll-trigger"><a class="nav-link active js-scroll-trigger" href="#create">Create</a></li>
                    <li class="nav-item nav-link js-scroll-trigger" role="presentation"><a class="nav-link js-scroll-trigger" href="#about">about</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php include 'connection.php'?>
    <header class="masthead" style="background-image:url('assets/img/intro-bg.jpg');">
        <div id="main" class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h1 class="brand-heading">Welcome to scp</h1>
                        <p class="intro-text">SCP Foundation is responsible for locating and containing individuals, entities, locations, and objects that violate natural law.<br></p><a class="btn btn-link btn-circle" role="button" href="#database"><i class="fa fa-angle-double-down animated"></i></a></div>
                </div>
            </div>
        </div>
    </header>
    <section id="database" class="content-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>SCP Database</h2>
                </div>
            </div>
        </div>
<!-- menu row -->
    <div class="row">

        <div  class="col">

            <ul class="nav justify-content-center">
            <!-- loop through db and get item_no field and use as menu text and link -->
             <?php foreach($result as $menu_item): ?>

                <li class="nav-item">
                    <a class="nav-link active" href="index.php?scp='<?php echo $menu_item['Item_no']; ?>'">
                    <?php echo $menu_item['Item_no']; ?>
                    
                    </a>
                </li>

              <?php endforeach; ?>

            </ul>
        </div>
    </div>

    <!-- Display record in div below -->
<div class="row">
        <div  class="col">
                <?php
                    // check if the subject get value exits
                    if(isset($_GET['scp']))
                    {
                        // remove single quotes from scp get value
                        $item_number = trim($_GET['scp'], "'");

                        // run sql command to select record based on get value
                        $record = $connection->query("select * from scp where Item_no='$item_number'") or die($connection->error());

                        // convert $record into an array for us to echo out on screen
                        $row = $record->fetch_assoc();
                        
                        

                        // create variables that hold data from db fields
                        $Item_no = $row['Item_no'];
                        $object_class = $row['Object_Class'];
                        $subject_image = $row['subject_image'];
                        $special_containment_procedure = $row['Special_Containment_Procedure'];
                        $image = $row['image'];
                        $description = $row['Description'];
                        $Reference = $row['Reference'];
                        $ad1 = $row['Addendum_003_01'];
                        $ad2 = $row['Addendum_003_02'];
                        $ad3 = $row['Addendum_003_03'];
                        $ad4 = $row['Addendum_003_04'];
                        $ad5 = $row['Addendum_003_05'];
                        $ch = $row['Chronological_History'];
                        $sta = $row['Space_Time_Anomalies'];
                        $Additional_Notes = $row['Additional_Notes'];
                        $appA = $row['Appendix_A_Mental_Health_Effects_of_SCP_004_12'];
                        $appB = $row['Appendix_B_Additional_Information'];
                        
                        


                        // strip out \n and replace with linebreaks
                        $special_containment_procedure = str_replace('\n', '<br><br>', $special_containment_procedure);
                        $subject_image = str_replace('\n', '<br><br>',$subject_image);
                        $description = str_replace('\n', '<br><br>',$description);
                        $Reference = str_replace('\n', '<br><br>',$Reference);
                        $ad1 = str_replace('\n', '<br><br>',$ad1);
                        $ad2 = str_replace('\n', '<br><br>',$ad2);
                        $ad3 = str_replace('\n', '<br><br>',$ad3);
                        $ad4 = str_replace('\n', '<br><br>',$ad4);
                        $ad5 = str_replace('\n', '<br><br>',$ad5);
                        $ch = str_replace('\n', '<br><br>',$ch);
                        $sta = str_replace('\n', '<br><br>',$sta);
                        $Additional_Notes = str_replace('\n', '<br><br>',$Additional_Notes);
                        $appA = str_replace('\n', '<br><br>',$appA);
                        $appB = str_replace('\n', '<br><br>',$appB);
                        

                        // Display db subject record to screen

                        echo "<h2>Item_# {$Item_no}</h2>
                              <h3>{$object_class}</h3>
                              <h3>Special Containment Procedure</h3>
                              <p>{$special_containment_procedure}</p>
                              <h3>Description</h3>
                              <p><img src='{$subject_image}'></p>
                              <p>{$description}</p>
                              <h3>Reference</h3>
                              <h3>{$Reference}</h3>
                              <h3>Addendum 003 01</h3>
                              <p>{$ad1}</p>
                              <h3>Addendum 003 02</h3>
                              <p>{$ad2}</p>
                              <h3>Addendum 003 03</h3>
                              <p>{$ad3}</p>
                              <h3>Addendum 003 04</h3>
                              <p>{$ad4}</p>
                              <h3>Addendum 003 05</h3>
                              <p>{$ad5}</p>
                              <h3>Chronological History</h3>
                              <p>{$ch}</p>
                              <h3>Space_Time_Anomalies</h3>
                              <p>{$sta}</p>
                              <h3>Additional Notes</h3>
                              <p>{$Additional_Notes}</p>
                              <h3>Appendix A Mental Health Effects of SCP 004 12</h3>
                              <p>{$appA}</p>
                              <h3>Appendix B Additional Information</h3>
                              <p>{$appB}</p>";
                              
                              
                              
                              
   
                    }
                    

                ?>
        </div>
    </div>
        
        
        
        
      </section>
<section id="create" class="content-section text-center">
    <div class="col-lg-8 mx-auto">
        <h2>SCP Form</h2>
    </div>
	<div class ="form-group">
    <form action="connection.php" method = "POST">

    <label>Item No</label>
    <br>
    <input type ="text" name = "Item_no" placeholder = "Item Number Here" class = "form-control">
    <br><br>
    <label>Object Class</label>
    <br>
    <input type ="text" name = "Object_Class" placeholder = "Object Class Here" class = "form-control">
    <br><br>
    <label>Special Containment Procedure</label>
    <br>
    <textarea type ="text" name = "Special_Containment_Procedure" placeholder = "Special Containment Procedure Here"  class = "form-control"></textarea>
    <br><br>
    <label>Image</label>
    <br>
    <input type ="text" name = "image" name="image"  placeholder = "Use following format: images/image_name.(gif, jpg, png)" class = "form-control">
    <br><br>
    <label>Description</label>
    <br>
    <textarea type ="text" name = "Description" placeholder = "Description Here"  class = "form-control"></textarea>
    <br><br>
    <label>Reference</label>
    <br>
    <textarea type ="text" name = "Reference" placeholder = "Reference Here"  class = "form-control"></textarea>
    <br><br>
    <label>Member Since</label>
    <br>
    <input type ="text" name = "Member_Since" placeholder = "Member Since Here"  class = "form-control">
    <br><br>
    <label>Addendum 003-01</label>
    <br>
    <input type ="text" name = "Addendum_003_01" placeholder = "Addendum 003-01 Here"  class = "form-control">
    <br><br>
    <label>Addendum 003-02</label>
    <br>
    <input type ="text" name = "Addendum_003_02" placeholder = "Addendum 003-02 Here"  class = "form-control">
    <br><br>
    <label>Addendum 003-03</label>
    <br>
    <input type ="text" name = "Addendum_003_03" placeholder = "Addendum 003-03 Here"  class = "form-control">
    <br><br>
    <label>Addendum 003-04</label>
    <br>
    <textarea type ="text" name = "Addendum_003_04" placeholder = "Addendum 003-04 Here"  class = "form-control" ></textarea>
    <br><br>
    <label>Addendum 003-05</label>
    <br>
    <input type ="text" name = "Addendum_003_05" placeholder = "Addendum 003-05 Here"  class = "form-control">
    <br><br>
    <label>Chronological History</label>
    <br>
    <input type ="text" name = "Chronological_History" placeholder = "Chronological History Here"  class = "form-control">
    <br><br>
    <label>Space-Time Anomalies</label>
    <br>
    <input type ="text" name = "Space_Time_Anomalies" placeholder = "Space-Time Anomalies Here"  class = "form-control">
    <br><br>
    <label>Additional Notes</label>
    <br>
    <input type ="text" name = "Additional_Notes" placeholder = "Additional Notes Here"  class = "form-control">
    <br><br>
    <label>Appendix A: Mental Health Effects of SCP-004-12</label>
    <br>
    <input type ="text" name = "Appendix_A_Mental_Health_Effects_of_SCP_004_12" placeholder = "Appendix A: Mental Health Effects of SCP-004-12 Here"  class = "form-control">
    <br><br>
    <label>Appendix B: Additional Information</label>
    <br>
    <input type ="text" name = "Appendix_B_Additional_Information" placeholder = "Appendix B: Additional Information Here"  class = "form-control">
    <br><br>
    <button type = "submit"  class = "btn-primary" style="width: 73px;color: rgb(255,255,255);" >submit</button>


    </form>
</section>


<section id="about" class="download-section content-section text-center" style="background-image:url('assets/img/downloads-bg.jpg');">
    <div class="container">
        <div class="col-lg-8 mx-auto">
            <h1><strong>ABOUT SCP FOUNDATION</strong><br /></h1>
            <p></p>
        </div>
    </div>
    <p>The SCP Foundation[note 3] is a fictional organization documented by the web-based collaborative-fiction project of the same name. Within the website&#39;s fictional setting, the SCP Foundation is responsible for locating and containing individuals,
        entities, locations, and objects that violate natural law (referred to as SCPs). The real-world website is community-based and includes elements of many genres such as horror, science fiction, and urban fantasy.</p>
    <p>On the SCP Foundation <a href="https://en.wikipedia.org/wiki/Wiki">wiki</a>, the majority of works consist of &quot;special containment procedures&quot;: structured internal documentation that describes an SCP object and the means of keeping it contained.
        The website also contains thousands of &quot;Foundation Tales&quot;, short stories set within the universe of the SCP Foundation. The series has been praised for its ability to convey horror through its scientific and academic writing style, as
        well as for its high standards of quality.<br /></p>
    <p>The Foundation has inspired numerous spin-off works, including the horror <a href="https://en.wikipedia.org/wiki/Indie_game">indie video game</a><a href="https://en.wikipedia.org/wiki/SCP_%E2%80%93_Containment_Breach"><em>SCP – Containment Breach</em></a>.<br
        /></p>
</section>
    <footer id="footer">
        <div class="container text-center">
            <p>Copyright © Avishka Bandara Deldeniya (30014295) 2020</p>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
</body>

</html>