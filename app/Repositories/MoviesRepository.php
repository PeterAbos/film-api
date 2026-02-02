<?php

namespace App\Repositories;

class MoviesRepository extends BaseRepository
{
    public string $tableName = 'movies';
    public string $OrderBy = 'title';
}