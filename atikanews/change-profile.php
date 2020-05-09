<?php

	require_once 'core/init.php';

	if ( !$user->is_LoggedIn() ) {
		Session::flash('profile','Anda belum login');
		Redirect::To('login');
	}

	if ( Session::exists('register')){
		echo Session::flash('register');
	}
	$errors = array();
	$profile = $user->get_data('users','username',Session::get_session('username'));
	if(Input::get('submit'))
	{
		if( Token::check_token(Input::get('token')) )
		{
			$validation = new Validation();

			$validation = $validation->check_user(array(
		      'nama' => array(
		                    'required' => true,
		                    'min'      => 5,
		                    'max'      => 30,
		                    ),
		      'alamat' => array(
		                    'required' => true,
		                    'min'      => 5,
		                    'max'      => 30,
		                    )
			));
			if ( $validation->check_passed() )
			{
				$user->update('users',array(
					'nama_lengkap' => Input::get('nama'),
					'alamat' => Input::get('alamat')
					),'username',Session::get_session('username'));
				Session::flash('update_profile','Profile Berhasil Di Perbaharui');
				Redirect::To('profile');
			} else {
				$errors = $validation->check_errors();
			}//end of check passed

		}//end of check_token

	}//end of input::get

	require_once 'templates/header.php';

?>
	
	<div class="profile">
		<h3 class="title-profile">Profil</h3>
		<form method="post" action="change-profile.php">
		Nama : <input type="text" name="nama" value="<?php echo $profile['nama_lengkap'];?>"><br/>
		Alamat : <input type="text" name="alamat" value="<?php echo $profile['alamat'];?>"><br/>
		Username : <input type="text" disabled="disabled" name="username" value="<?php echo $profile['username'];?>"><br/>
		<input type="hidden" name="token" value="<?php echo Token::generate();?>">
		<input type="submit" value="SUBMIT" name="submit">
		</form>
	</div>

