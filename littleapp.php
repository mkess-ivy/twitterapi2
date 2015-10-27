<?php 
#echo "<h2>Simple App using Twitter API</h2>";
require "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

$consumer = "7pq6tlj2EqTHZg8Sr3Za10X4v";
$consumersecret = "hdIv5vBgduzsp1Q28jhJHQG8wz2LBU5eB8bSFSGjQmjJXzFOvl";
$accesstoken = "3977441662-QuE7V6yrbXrajecvGw70CbDQQmzLnvxUCPXaDa3
";
$accesstokensecret = "ZjRTP13ruDVRIRpdXSUH7sOCrkxWxMw0qTRM7pLEvP2mC";

$twitter = new TwitterOAuth($consumer, $consumersecret, $accesstoken, $accesstokensecret);
$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=hello&result_type=recent&count=10');

?>
<html>
<head>
	<meta charset="UTF-8" />
	<title>A Simple App using Twitter API</title>
</head>
<body>
	<form action="" method="post">
		<label>Search : <input type="text" name="keyword" /></label>
	 </form>
	 <?php 
	 if (isset($_POST['keyword'])){
	 	$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q='.$_POST['keyword'].'&result_type=recent&count=10');
	 	foreach($tweets as $tweet) {
	 		foreach ($tweet as $t) {
	 			#echo $t->text.'<br>.';
	 			echo '<img src="'.$t->user->profile_image_url.'" /> '.$t->text.'<br>';
	 		}
	 	}
	 }
	 ?>
</body>
</html>