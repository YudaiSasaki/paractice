<?php

namespace App\Libraries\Repositories;


use App\Models\Article;
use Illuminate\Support\Facades\Schema;

class ArticleRepository
{

	/**
	 * Returns all Articles
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Article::all();
	}

	public function search($input)
    {
        $query = Article::query();

        $columns = Schema::getColumnListing('articles');
        $attributes = array();

        foreach($columns as $attribute){
            if(isset($input[$attribute]))
            {
                $query->where($attribute, $input[$attribute]);
                $attributes[$attribute] =  $input[$attribute];
            }else{
                $attributes[$attribute] =  null;
            }
        };

        return [$query->get(), $attributes];

    }

	/**
	 * Stores Article into database
	 *
	 * @param array $input
	 *
	 * @return Article
	 */
	public function store($input)
	{
		return Article::create($input);
	}

	/**
	 * Find Article by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Article
	 */
	public function findArticleById($id)
	{
		return Article::find($id);
	}

	/**
	 * Updates Article into database
	 *
	 * @param Article $article
	 * @param array $input
	 *
	 * @return Article
	 */
	public function update($article, $input)
	{
		$article->fill($input);
		$article->save();

		return $article;
	}
}