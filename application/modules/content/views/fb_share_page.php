<?php
//if user come from facebook by clicking on the link, we can redirect user to the post page. 
//Referer address is the address where user comes from by clicking on the link in this case facebook is the referer.
if(isset($_SERVER['HTTP_REFERER']))
{
    echo "test";
	//a regular expression to match the facebook address from the referer address
	if(preg_match("/www.facebook.com/",$_SERVER['HTTP_REFERER']))
	{
                echo "berhasil";
		?>
		<SCRIPT type="text/javascript">
		window.location="http://www.republicof3.com/how-to-dynamically-create-a-facebook-share-button-in-php/";
		</SCRIPT>
		<?php
	}
}
$imageURL = "http://www.tekxon.com.pk/sites/all/themes/bluemasters/images/gallery/3.jpg"; 
?>
<meta property="og:title" content="How to dynamically create facebook share button in PHP" />
<meta property="og:image" content="<?php echo $imageURL;?>" />
<meta property="og:description" content="In this post I am going to tell you how to dynamically create 
	facebook share button and how facebook fetch data from the provided link on like to automatically 
	share on facebook using page meta tags." />