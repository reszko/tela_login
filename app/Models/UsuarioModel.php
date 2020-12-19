<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';

    protected $allowedFields = [
        'nome',
        'email',
        'senha'
    ];

    /**
     * Retorna um usuário pelo seu e-mail
     *
     * @param string $email
     * @return array
     */
    public function getByEmail(string $email): array
    {
        $rq =  $this->where('email', $email)->first();

        return !is_null($rq) ? $rq : [];
    }
}
