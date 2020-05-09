<?php

	require_once 'core/init.php';

	if ( !$user->is_LoggedIn() ) {
		Session::flash('profile','Anda belum login');
		Redirect::To('login');
	}

	if ( Session::exists('register')){
		echo Session::flash('register');
	}

	$profile = $user->get_data('users','username',Session::get_session('username'));
	require_once 'templates/header.php';

?>
	
	<div class="profile">
	<?php
	if(Session::exists('update_profile'))
	{
		echo '<i>' . Session::flash('update_profile') . '</i>';
	}
	?>
		<h3 class="title-profile">Profil</h3>
		Nama : <?php echo $profile['nama_lengkap'];?><br/>
		Alamat : <?php echo $profile['alamat'];?><br/>
		Username : <?php echo $profile['username'];?><br/>

		<a href="change-profile.php">Perbaharui Data</a>
	</div>

