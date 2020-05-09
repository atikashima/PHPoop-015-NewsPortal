<?php

	require_once 'core/init.php';

	if ( !$user->is_LoggedIn() ) {
		Session::flash('profile','Anda belum login');
		Redirect::To('login');
	}

	if ( Session::exists('tambah_berita')){
		echo Session::flash('tambah_berita');
	}
	$errors = array();
	$profile = $user->get_data('users','username',Session::get_session('username'));
	if(Input::get('submit'))
	{
		if( Token::check_token(Input::get('token')) )
		{
			$validation = new Validation();

			$validation = $validation->check_user(array(
		      'judul' => array(
		                    'required' => true,
		                    'min'      => 5,
		                    'max'      => 150,
		                    ),
		      'isi_berita' => array(
		                    'required' => true,
		                    'min'      => 10,
		                    'max'      => 625,
		                    )
			));
			if ( $validation->check_passed() )
			{
				$admin->tambahberita(array(
					'judul_berita' => Input::get('judul'),
					'news' => Input::get('isi_berita'),
					'date' => date('Y-m-d H:i:s'),
					'author' => Session::get_session('username')
					));
				Session::flash('tambah_berita','Berita Berhasil Di Buat');
				Redirect::To('tambahberita');
			} else {
				$errors = $validation->check_errors();
			}//end of check passed

		}//end of check_token

	}//end of input::get

	require_once 'templates/header.php';

?>
	
	<div class="profile">
		<h3 class="title-profile">Buat Berita</h3>
		<form method="post" action="tambahberita.php">
		Judul Berita : <input type="text" name="judul" style="width:400px;"><br/>
		Isi Berita : <textarea name="isi_berita" rows="10" cols="100"></textarea><br/>
		Author : <input type="text" disabled="disabled" name="username" value="<?php echo $profile['username'];?>"><br/>
		<input type="hidden" name="token" value="<?php echo Token::generate();?>">
		<ul>
		<?php
		foreach( $errors as $e ){
			echo "<li>$e</li>";
		}
		?>
		</ul>
		<input type="submit" value="SUBMIT" name="submit">
		</form>
	</div>

