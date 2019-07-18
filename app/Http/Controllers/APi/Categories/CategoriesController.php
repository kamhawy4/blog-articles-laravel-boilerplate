<?php

namespace App\Http\Controllers\Api\Categories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Categories;
use App\Repositories\Categories\CategoriesRepositories;


class CategoriesController extends Controller
{
    protected $modelCategories;

	public function __construct(Categories $categories)
	{
		$this->modelCategories  = new CategoriesRepositories($categories);	   
	}

   // Return api Categories And Return All Categories
    public function index()
    {
      $categorys = $this->modelCategories->all();
      return response()->json(['status'=>true,'code'=>200,'response'=>$categorys]);
    }

}
