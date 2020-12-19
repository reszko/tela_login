<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Login extends BaseController
{
	public function index()
	{
		return view('login');
	}

	public function signIn()
	{
		$email = $this->request->getPost('inputEmail');
		$password = $this->request->getPost('inputPassword');

		$usuarioModel = new UsuarioModel();

		$dadosUsuario = $usuarioModel->getByEmail($email);
		if (count($dadosUsuario) > 0) {
			$hashUsuario = $dadosUsuario['senha'];
			if (password_verify($password, $hashUsuario)) {
				session()->set('isLoggedIn', true);
				session()->set('nome', $dadosUsuario['nome']);
				return redirect()->to(base_url());
			} else {
				session()->setFlashData('msg', 'Usuário ou Senha incorretos');
				return redirect()->to('/login');
			}
		} else {
			session()->setFlashData('msg', 'Usuário ou Senha incorretos');
			return redirect()->to('/login');
		}
	}

	public function signOut()
	{
		session()->destroy();
		return redirect()->to(base_url());
	}

	//--------------------------------------------------------------------

}
