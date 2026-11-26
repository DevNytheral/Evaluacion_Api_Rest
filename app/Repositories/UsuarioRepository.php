<?php
namespace App\Repositories;

class UsuarioRepository extends BaseRepository implements UsuarioInterface
{
    public function __construct(Usuario $usuario){
        parent::__construct($usuario);
    }
   
}   