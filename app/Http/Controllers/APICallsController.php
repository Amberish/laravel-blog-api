<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article as Model;

class APICallsController extends Controller
{
  protected $request,
            $model;

  /**
   * Dependency injecting Request and Model(Article) in the APICallsController.
   * @param Request $request [Request Object]
   * @param Model   $model   [Model Object]
   */
  function __construct(Request $request, Model $model) {
    $this->request = $request;
    $this->model = $model;
  }

  /**
   * This method is responsible for creating article.
   * @all [mixed] [All information related to article are provided
   *      					through request object]
   * @return [type] [description]
   */
  function createArticle() {
    $input = $this->request->all();
    $user = $this->model->create($input);
    return $user;
  }

  /**
   * This method is responsible for editing an aricle.
   * @param  [type] $id [ID of the article to be edited]
   * @return [type]     [returns a json success message]
   */
  function editArticle($id){
    $input = $this->request;

    $article = $this->model->find($id);

    $article->title = $input->title;
    $article->slug = $input->slug;
    $article->content = $input->content;
    $article->keywords = $input->keywords;

    $article->update();
    return response(json_encode(["message" => "successfully edited!!"]), "200")
              ->header("Content-Type", "application/json");
  }

  function deleteArticle() {
    $id = $this->request->id;
    $this->model->destroy($id);
    return response(json_encode(["message" => "successfully deleted!!"]), "200")
              ->header("Content-Type", "application/json");
  }

  /**
   * This method fetches details of a particular article.
   * @id [integer] [ID of the article to fetch]
   * @return [json] [Returns article json response of particular article]
   */
  function fetchArticle() {
    $id = $this->request->id;

    $article = $this->model->findOrFail($id);
    return $article;
  }

  /**
   * This method fetches range of articles.
   *
   * @skip [integer] [number of records to skip]
   * @number_of_articles [integer] [number of articles to fetch]
   * @return [type] [Returns a json response of a number of articles as requested.]
   */
  function fetchRangeOfArticles() {
    $skip = $this->request->skip;
    $number_of_articles = $this->request->number_of_articles;

    $columns_to_fetch = ['id', 'title', 'slug'];

    $articles = $this->model->select($columns_to_fetch)->skip($skip)->take($number_of_articles)->get();
    return $articles;
  }

}
