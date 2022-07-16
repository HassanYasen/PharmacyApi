<?php

namespace App\Repository;

use App\Repository\CategoryRepository;
use App\Models\Category;

class CategoryRepository extends BaseRepository 
{
    public function __construct(){
        parent::__construct(new Category);
    }
}