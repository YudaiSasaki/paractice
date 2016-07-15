<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateArticleRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\ArticleRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class ArticleController extends AppBaseController
{

	/** @var  ArticleRepository */
	private $articleRepository;

	function __construct(ArticleRepository $articleRepo)
	{
		$this->articleRepository = $articleRepo;
	}

	/**
	 * Display a listing of the Article.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->articleRepository->search($input);

		$articles = $result[0];

		$attributes = $result[1];

		return view('articles.index')
		    ->with('articles', $articles)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Article.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('articles.create');
	}

	/**
	 * Store a newly created Article in storage.
	 *
	 * @param CreateArticleRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateArticleRequest $request)
	{
        $input = $request->all();

		$article = $this->articleRepository->store($input);

		Flash::message('Article saved successfully.');

		return redirect(route('articles.index'));
	}

	/**
	 * Display the specified Article.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$article = $this->articleRepository->findArticleById($id);

		if(empty($article))
		{
			Flash::error('Article not found');
			return redirect(route('articles.index'));
		}

		return view('articles.show')->with('article', $article);
	}

	/**
	 * Show the form for editing the specified Article.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$article = $this->articleRepository->findArticleById($id);

		if(empty($article))
		{
			Flash::error('Article not found');
			return redirect(route('articles.index'));
		}

		return view('articles.edit')->with('article', $article);
	}

	/**
	 * Update the specified Article in storage.
	 *
	 * @param  int    $id
	 * @param CreateArticleRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateArticleRequest $request)
	{
		$article = $this->articleRepository->findArticleById($id);

		if(empty($article))
		{
			Flash::error('Article not found');
			return redirect(route('articles.index'));
		}

		$article = $this->articleRepository->update($article, $request->all());

		Flash::message('Article updated successfully.');

		return redirect(route('articles.index'));
	}

	/**
	 * Remove the specified Article from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$article = $this->articleRepository->findArticleById($id);

		if(empty($article))
		{
			Flash::error('Article not found');
			return redirect(route('articles.index'));
		}

		$article->delete();

		Flash::message('Article deleted successfully.');

		return redirect(route('articles.index'));
	}

}
