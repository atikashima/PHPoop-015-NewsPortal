<?php

	require_once 'core/init.php';

	if ( !$user->is_LoggedIn() ) {
		Session::flash('profile','Anda belum login');
		Redirect::To('login');
	}

	$berita = $admin->get_berita('news');
	require_once 'templates/header.php';

?>
	
	<?php
	$no = 1;
	while ($data = $berita->fetch_array() ){
			echo "<h2>$no . ".$data['judul_berita']."<h2>";
			echo "<h4>".$data['news']."<h4><br>";
			$no++;
	}
	?>	

