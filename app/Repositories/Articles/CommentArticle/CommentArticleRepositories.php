<?php

namespace App\Repositories\Articles\CommentArticle;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\RepositoryInterface;
use Auth;


class CommentArticleRepositories implements RepositoryInterface
{	

	// model property on class instances
    protected $model;

	function __construct(Model $model)
	{
		$this->model = $model;
	}

    public function show($id)
    {
       return $this->model->where('article_id',$id)->get();
    }

    public function all(){}

    public function store($data){}

    public function update($data,$id){}

    public function delete($id){}

}


?>