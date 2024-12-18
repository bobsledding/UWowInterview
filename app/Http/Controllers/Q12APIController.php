<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Q12APIController extends Controller
{
    public function create(CreateArticleRequest $request, Article $article_model)
    {
        try {
            $article = new $article_model;
            $article->image_url = $request->input('image_url');
            $article->title = $request->input('title');
            $article->content = $request->input('content');
            $article->save();

            return response(null, Response::HTTP_CREATED);
        } catch (Exception $e) {
            return response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(UpdateArticleRequest $request, Article $article_model, string $id)
    {
        try {
            $article = $article_model::find($id);
            $article->image_url = $request->input('image_url', $article->image_url);
            $article->title = $request->input('title', $article->title);
            $article->content = $request->input('content', $article->content);
            $article->save();

            return response(null, Response::HTTP_NO_CONTENT);
        } catch (ModelNotFoundException $e) {
            return response($e->getMessage(), Response::HTTP_NOT_FOUND);
        } catch (Exception $e) {
            return response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function delete(Article $article_model, string $id)
    {
        try {
            $article = $article_model::find($id);
            $article->delete();

            return response(null, Response::HTTP_NO_CONTENT);
        } catch (ModelNotFoundException $e) {
            return response($e->getMessage(), Response::HTTP_NOT_FOUND);
        } catch (Exception $e) {
            return response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function search(Request $request, Article $article_model)
    {
        $keyword = $request->input('keyword', '');
        $result = $article_model::select(['id', 'image_url', 'title', 'content'])
            ->where('is_active', true)
            ->where(function ($query) use ($keyword) {
                $query->where('title', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('content', 'LIKE', '%' . $keyword . '%');
            })->get();
        return response()->json($result->toArray(), Response::HTTP_OK);
    }

    public function setActive(Article $article_model, string $id)
    {
        try {
            $article = $article_model::find($id);
            $article->is_active = true;
            $article->save();

            return response(null, Response::HTTP_NO_CONTENT);
        } catch (ModelNotFoundException $e) {
            return response($e->getMessage(), Response::HTTP_NOT_FOUND);
        } catch (Exception $e) {
            return response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function setInactive(Article $article_model, string $id)
    {
        try {
            $article = $article_model::find($id);
            $article->is_active = false;
            $article->save();

            return response(null, Response::HTTP_NO_CONTENT);
        } catch (ModelNotFoundException $e) {
            return response($e->getMessage(), Response::HTTP_NOT_FOUND);
        } catch (Exception $e) {
            return response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function sort()
    {
        // 不確定具體定義所以未實作
    }

    public function ordering()
    {
        // 不確定具體定義所以未實作
    }
}
