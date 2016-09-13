<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Admin | Scott Jose Fitness</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<link rel="stylesheet" href="css/datepicker.css" type="text/css" />


<script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="js/plugins/ui.spinner.min.js"></script>
<script type="text/javascript" src="js/plugins/chosen.jquery.min.js"></script>
<script type="text/javascript" src="js/plugins/datepicker.js"></script>
<script type="text/javascript" src="js/custom/general.js"></script>
<script type="text/javascript" src="js/custom/forms.js"></script>
<script type="text/javascript" src="js/plugins/jquery.alerts.js"></script>
<script type="text/javascript" src="js/plugins/tinymce/jquery.tinymce.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){

    ///// TINYMCE EDITOR /////
    jQuery('textarea.tinymce').tinymce({
    // Location of TinyMCE script
    script_url : 'js/plugins/tinymce/tiny_mce.js',

    // General options
    theme : "advanced",
    skin : "themepixels",
    plugins : "jbimages,autolink,lists,pagebreak,style,layer,table,save,advhr,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,searchreplace,print,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",
    inlinepopups_skin: "themepixels",
    // Theme options
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,outdent,indent,blockquote,formatselect,fontselect,fontsizeselect",
    theme_advanced_buttons2 : "pastetext,pasteword,|,bullist,numlist,|,undo,redo,|,link,unlink,help,code,|,preview,|,forecolor,backcolor,removeformat,|,charmap,|,fullscreen,jbimages",
    theme_advanced_buttons3 : "",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : true,

    relative_urls : false,

    // Example content CSS (should be your site CSS)
    content_css : "css/plugins/tinymce.css",

    });
        
        
    jQuery('.editornav a').click(function(){
        jQuery('.editornav li.current').removeClass('current');
        jQuery(this).parent().addClass('current');
        if(jQuery(this).hasClass('visual'))
            jQuery('#content').tinymce().show();
        else
            jQuery('#content').tinymce().hide();
        return false;
    });

        jQuery('.editornav a').click(function(){
        jQuery('.editornav li.current').removeClass('current');
        jQuery(this).parent().addClass('current');
        if(jQuery(this).hasClass('visual'))
            jQuery('#short_content').tinymce().show();
        else
            jQuery('#short_content').tinymce().hide();
        return false;
    });
});
</script>
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="css/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body class="withvernav">

<div class="bodywrapper">
    <div class="topheader">
        <div class="left">
            <h1 class="logo">Scott<span>Jose</span></h1>
            <span class="slogan">admin</span>
            
            <br clear="all" />

        </div><!--left-->

    </div><!--topheader-->
    
    
    <div class="header">
        <ul class="headermenu">
            <li><a href="manageblog.php"><span class="icon icon-speech" aria-hidden="true"></span>Manage Blog</a></li>
            <li class="current"><a href="manageretreat.php"><span class="icon icon-pencil" aria-hidden="true"></span>Manage Retreats</a></li>
    </ul>
    </div><!--header-->
    
    <div class="vernav">
        <ul>
            <li><a href="newretreat.php">Create New Retreat</a></li>
        </ul>
        <ul>
            <li><a href="manageretreat.php" class="editor">All Retreats </a></li>
            <li><a href="live_retreats.php">Live Retreats</a></li>
            <li><a href="draft_retreats.php">Draft Retreats</a></li>
            <li><a href="archived_retreats.php">Archived Retreats </a></li>
            <li><a href="trash_retreats.php">Trash </a></li>
        </ul>
        <ul>
            <li><a href="bookedspaces.php">Training Orders</a></li>
            <li><a href="openspaces.php">Retreat Bookings </a></li>
        </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu-->
    
    <div class="centercontent">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">Edit Retreat</h1>
            
        </div><!--pageheader-->
        <?php 
    echo $config['upload_path'];
            include 'model/m_events.php';
            $Posts = new Posts();
            $retreats = $Posts->get_retreats($_GET['id'], '');

            foreach ($retreats as $retreatArray) {
            ?>
        
        <div id="contentwrapper" class="contentwrapper">
        	
        	<div id="basicform" class="subcontent">
                    
					<form class="stdform stdform2" method="post" action="save_retreat.php" enctype="multipart/form-data" name="form" novalidate>
                    	<p>
                        	<label>Location</label>
                            <span class="field"><input type="text" name="location" value="<?php echo $retreatArray['location']; ?>" class="longinput" required /></span>
                        </p>
                        
                        <p>
                        	<label>Hotel name</label>
                            <span class="field"><input type="text" name="hotel" value="<?php echo $retreatArray['hotel']; ?>" class="longinput" required/></span>
                        </p>
                        <p>
                            <label>Type</label>
                            <span class="field"><input type="text" name="type" value="<?php echo $retreatArray['type']; ?>" class="longinput" required/></span>
                        </p>
                        <p>
                            <label>Short Content <small>This is formattable text, what you type here is what you will see on the blog pages</small></label>
                            <span class="field"><textarea cols="80" rows="5" name="short_content" id="short_content" class="tinymce" required><?php echo $retreatArray['short_text']; ?></textarea></span>
                        </p>

                        <p>
                            <label>Content <small>This is formattable text, what you type here is what you will see on the blog pages</small></label>
                            <span class="field"><textarea cols="80" rows="10" name="content" id="content" class="tinymce" required><?php echo $retreatArray['long_text']; ?></textarea></span>
                        </p>
                        <p>
                            <label for="">Departure</label>
                            <span class="field input-daterange travel-date-group" id="travel-date-group">
                            <input type="text" class="longinput" value="<?php echo $retreatArray['date']; ?>" name="date" placeholder="mm/dd/yyyy">
                            </span>
                        </p>
                        <p>
                            <label>Full Price</label>
                            <span class="field"><input type="text" name="fullprice" value="<?php echo $retreatArray['fullprice']; ?>" class="longinput" required/></span>
                        </p>
                        <p>
                            <label>Deposit</label>
                            <span class="field"><input type="text" name="deposit" value="<?php echo $retreatArray['deposit']; ?>" class="longinput" required/></span>
                        </p>
                        <p>
                            <label>Total Spaces</label>
                            <span class="field"><input type="text" name="open" value="<?php echo $retreatArray['open']; ?>" class="longinput" required/></span>
                        </p>
                        <p>
                            <label>Filled Spaces <small>Are there any manual bookings already? </small></label>
                            <span class="field"><input type="text" name="filled" value="<?php echo $retreatArray['filled']; ?>" class="longinput" required/></span>
                        </p>
                        <p>
                            <label>Hero Image<small>This is required</small></label>
                            <span class="field">
                                <input type="file" name="hero" required/>
                            </span>
                        </p>
                        <p>
                            <label>Main Image<small>This is required</small></label>
                            <span class="field">
                                <input type="file" name="main" required/>
                            </span>
                        </p>
                        <p>
                            <label>Image 1</label>
                            <span class="field">
                                <input type="file" name="image1"/>
                            </span>
                        </p>
                        <p>
                        <label>Image 2</label>
                            <span class="field">
                                <input type="file" name="image2"/>
                            </span>
                        </p>
                        <p>
                        <label>Image 3</label>
                            <span class="field">
                                <input type="file" name="image3"/>
                            </span>
                        </p>
                        <p>
                        <label>Image 4</label>
                            <span class="field">
                                <input type="file" name="image4"/>
                            </span>
                        </p>
                        <input type="hidden" value="<?php echo $retreatArray['id']; }?>" name="id"/>                 
                        <p class="stdformbutton">
                        	<input type="submit" class="submit radius2" name="submit" id="live" value="Live" />
                            <input type="submit" class="submit1 radius2" name="submit" id="draft" value="Draft" />
                        </p>

                        
                    </form>
					
                    <br />

            </div><!--subcontent-->
        
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->
    
    
</div><!--bodywrapper-->

    <script type="text/javascript">
        jQuery(function() {
            jQuery('.travel-date-group').datepicker({
                autoclose: true,
                startDate: "today"
            });
        });
    </script>

</body>
</html>
