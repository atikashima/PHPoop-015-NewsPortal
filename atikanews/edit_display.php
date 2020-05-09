<?php

	require_once 'core/init.php';

	if ( !$user->is_LoggedIn() ) {
		Session::flash('profile','Anda belum login');
		Redirect::To('login');
	}

	if ( Input::get('submit') )
	{
		if( Token::check_token(Input::get('token')) )
		{
			if(Input::get('header'))
			{
				if($admin->change_navbar('navbar_title','navbar_header',Input::get('header'),'id_navbar','1'))
				echo "<h3>Sukses Mengganti Judul Navbar</h3>";
			}
		}
	}
	require_once 'templates/header.php';

?>

	<h2>Ganti Judul Website</h2>
	<form method="post" action="edit_display.php">
		<input type="text" name="header">
		<input type="hidden" name="token" value="<?php echo Token::generate();?>">
		<input type="submit" value="Submit" name="submit">
	</form>
