<?php

namespace App\Http\Controllers;

use App\Article;
use App\Library\Alerts\AlertSuccess;
use App\Library\Alerts\AlertDanger;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    // \App\Article::withTrashed()
    // \App\Article::onlyTrashed()   for accessing "soft" delete

    public function index()
    {

        $articles = Article::published()->get();

        return view('bootstrap-4.blog', compact('articles'));

    }

    public function create()
    {
        try {

            $this->authorize('create', Article::class);

            return view( 'articles.create' );

        } catch( AuthorizationException $exception ) {

            return abort(403 );

        }
    }

    public function delete(Article $article)
    {
        try {

            $this->authorize('delete', Article::class);
            $article->delete();

            return redirect('/articles')
                ->with(['alert' => new AlertSuccess('article was deleted')]);

        } catch ( AuthorizationException $exception ) {

            return abort(403 );

        } catch( \Exception $exception ) {

            app('sentry')->captureException($exception);

            return redirect('/articles')
                ->with(['alert'=>new AlertDanger('it looks like something went wrong')]);

        }
    }

    public function show(Article $article)
    {
        return view('articles.static.article-' . $article->id, compact('article'));
    }

    public function store(Request $request)
    {
        try {

            $this->authorize('create', Article::class );
            $this->validate($request, [
                'title' => 'required'
            ]);

            $article = new Article();
            $article->title = $request->input('title');
            $article->save();

            return redirect(action('ArticleController@show', ['id' => $article->slug]))
                ->with([ 'alert' => new AlertSuccess('here is your new article from base template') ]);

        } catch( \Exception $exception ) {

            app('sentry')->captureException($exception);

            return redirect('/articles')
                ->with(['alert'=>new AlertDanger('it looks like something went wrong')]);

        }
    }
}
