<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	public function insere()
	{
		$dados = [
			'nome' => 'Maria Joaquina',
			'email' => 'maria@joaquina.com',
			'senha' => password_hash('654321', PASSWORD_DEFAULT)
		];

		(new UsuarioModel())->save($dados);
	}

	//--------------------------------------------------------------------

}
