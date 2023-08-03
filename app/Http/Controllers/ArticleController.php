<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    private $article;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.MU.create-article');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'author' => 'required',
            'thumbnail' => 'required|image|mimes:webp,png|max:10000',
            'trigger' => 'required',
            'body' => 'required',
        ]);

        if ($validation->fails()) {
            toast('Your article does not uploaded!', 'error');
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validation);
        }

        $image = '';

        // check if image is uploaded
        if ($request->file('thumbnail')) {
            $image = $request->file('thumbnail')->store('thumbnails');
        }

        $slug = str_replace(
            ' ',
            '-',
            strtolower(preg_replace('/[^a-zA-Z0-9\s]/', '', $request->title))
        );

        try {
            Article::create([
                'title' => $request->title,
                'author' => $request->author,
                'thumbnail' => $image,
                'trigger' => $request->trigger,
                'body' => $request->body,
                'active' => '1',
                'slug' => $slug,
            ]);
        } catch (Exception $e) {
            dd($e);
            toast(
                "Internal server error.\nYour article fail to uploaded",
                'error'
            );
            return redirect()
                ->route('dashboard.mu.articles.create')
                ->with(['error' => 'Blog gagal diupload!']);
        }

        toast('Article successfully uploaded.', 'success');
        return redirect()
            ->route('dashboard.mu.articles')
            ->with(['success' => 'Blog successfully uploaded!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $article = Article::where('slug', '=', $slug)
            ->with('trackings')
            ->first();

        $comments = 0;
        $likes = 0;
        $visits = 0;
        $lastView = 'not yet';

        if (sizeof($article->trackings) !== 0) {
            $visits = sizeof($article->trackings);
            $lastView =
                $article->trackings[sizeof($article->trackings) - 1]
                    ->created_at;
        }

        return view('dashboard.MU.detail-article', [
            'article' => $article,
            'title' => $article->title,
            'visits' => $visits,
            'lastView' => $lastView,
            'comments' => $comments,
            'likes' => $likes,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // get id article
        $id = $request->id;

        // get article with id
        $article = Article::find($id);

        // validate all input
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'author' => 'required',
            'thumbnail' => 'image|mimes:webp,png|max:10000',
            'trigger' => 'required',
            'body' => 'required',
        ]);

        // check if input is validate or not
        if ($validation->fails()) {
            toast('Your article does not updated!', 'error');
            return redirect()
                ->back()
                ->withInput();
        }

        // check thumbnail old or not
        $thumbnail = '';

        // check if there is no input file with name thumbnail
        if ($request->file('thumbnail') !== null) {
            $thumbnail = $request->file('thumbnail')->store('thumbnails');
            Storage::delete($article->thumbnail);
        } else {
            $thumbnail = $article->thumbnail;
        }

        // creating slug
        $slug = str_replace(
            ' ',
            '-',
            strtolower(preg_replace('/[^a-zA-Z0-9\s]/', '', $request->title))
        );

        try {
            Article::where('id', '=', (int) $id)->update([
                'title' => $request->title,
                'author' => $request->author,
                'thumbnail' => $thumbnail,
                'trigger' => $request->trigger,
                'body' => $request->body,
                'active' => '1',
                'slug' => $slug,
            ]);
        } catch (Exception $e) {
            toast(
                "Internal server error.\nYour article fail to updated",
                'error'
            );
            return redirect()
                ->back()
                ->with(['error' => 'Blog gagal diupload!']);
        }

        toast('Article successfully updated.', 'success');
        return back()->with([
            'success' => 'Blog successfully uploaded!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $article = Article::find($id);

        try {
            Storage::delete($article->thumbnail);
            $article->delete();
        } catch (Exception $e) {
            toast(
                "Internal server error.\nYour article fail to deleted",
                'error'
            );
            return redirect()
                ->route('dashboard.mu.articles')
                ->with(['error' => 'Blog gagal diupload!']);
        }

        toast('Article successfully deleted.', 'success');
        return redirect()
            ->route('dashboard.mu.articles')
            ->with(['success' => 'Blog successfully uploaded!']);
    }

    public function detailBlog($slug) {
        return view('articles.detail', [
            'article' => Article::where('slug', '=', $slug)->first(),
        ]);
    }
}
