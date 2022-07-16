<?php

namespace App\Repository;

use App\Repository\DrugsRepository;
use App\Models\Drugs;

class DrugsRepository extends BaseRepository 
{
    public function __construct(){
        parent::__construct(new Drugs);
    }
}