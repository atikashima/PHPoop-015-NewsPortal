<?php

	require_once 'core/init.php';

	if ( !$user->is_LoggedIn() ) {
		Session::flash('profile','Anda belum login');
		Redirect::To('login');
	}

	$video = $admin->get_video('video');
	require_once 'templates/header.php';

?>


<?php
	$no = 1;
	while ($data = $video->fetch_array() ){
			echo "<h2>$no . ".$data['nama_video']."<h2>";
			echo "<h4>".$data['isi_news']."<h4><br>";
			$no++;

	}
	echo "<h2>BERIKUT VIDEO TERKAIT (DITAMPILKAN SESUAI URUTAN NOMER):<h2>";
	?>	

<?php  
$row;	 
foreach($video as $row):
	?>	
	<iframe src="<?=$row["link_video"] ?>" frameborder=0></iframe>
                    
   <br>
<?php  endforeach?>
	



  
	
