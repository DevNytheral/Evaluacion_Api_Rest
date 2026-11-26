<?php

namespace App\Repositories;
use App\Models\Rol;

class RolRepository extends BaseRepository implements RolInterface
{
    public function __construct(Rol $rol)
    {
        parent::__construct($rol);
    }

}

