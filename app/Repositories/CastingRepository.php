<?php

namespace App\Repositories;

class CastingRepository extends BaseRepository
{
    public string $tableName = 'casting';
    public string $OrderBy = 'movie_id';
}