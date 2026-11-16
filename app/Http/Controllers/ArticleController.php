<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show', 'byCategory', 'byUser', 'articleSearch']),
        ];
    }

    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('article.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:articles|min:5',
            'subtitle' => 'required|min:5',
            'body' => 'required|min:10',
            'image' => 'required|image',
            'category' => 'required',
            'tags' => 'required',
        ]);

        $article = Article::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'image' => $request->file('image')->store('images', 'public'),
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
        ]);

        $tags = explode(',', $request->tags);

        foreach ($tags as $tag) {
            $tag = trim($tag);

            if ($tag === '') {
                continue;
            }

            $newTag = Tag::updateOrCreate(['name' => strtolower($tag)]);
            $article->tags()->attach($newTag);
        }

        return redirect(route('homepage'))->with('message', 'Il tuo articolo è stato creato con successo');
    }

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    public function edit(Article $article)
    {
        if (Auth::id() == $article->user_id) {
            return view('article.edit', compact('article'));
        }

        return redirect(route('homepage'))->with('alert', 'Non sei autorizzato');
    }

    public function update(Request $request, Article $article)
    {
        if (Auth::id() != $article->user_id) {
            return redirect(route('homepage'))->with('alert', 'Non sei autorizzato');
        }

        $request->validate([
            'title' => 'required|min:5|unique:articles,title,' . $article->id,
            'subtitle' => 'required|min:5',
            'body' => 'required|min:10',
            'image' => 'nullable|image',
            'category' => 'required',
            'tags' => 'required',
        ]);

        $article->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'category_id' => $request->category,
            'is_accepted' => NULL,
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($article->image);
            $article->update([
                'image' => $request->file('image')->store('images', 'public'),
            ]);
        }

        $tags = explode(',', $request->tags);
        $newTags = [];

        foreach ($tags as $tag) {
            $tag = trim($tag);

            if ($tag === '') {
                continue;
            }

            $newTag = Tag::updateOrCreate(['name' => strtolower($tag)]);
            $newTags[] = $newTag->id;
        }

        $article->tags()->sync($newTags);

        return redirect(route('writer.dashboard'))->with('message', 'Articolo modificato: è tornato in revisione');
    }

    public function destroy(Article $article)
    {
        if (Auth::id() != $article->user_id) {
            return redirect(route('homepage'))->with('alert', 'Non sei autorizzato');
        }

        $article->tags()->detach();
        Storage::disk('public')->delete($article->image);
        $article->delete();

        return redirect(route('writer.dashboard'))->with('message', 'Articolo eliminato correttamente');
    }

    public function byCategory(Category $category)
    {
        $articles = $category->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.by-category', compact('category', 'articles'));
    }

    public function byUser(User $user)
    {
        $articles = $user->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.by-user', compact('user', 'articles'));
    }

    public function articleSearch(Request $request)
    {
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();

        return view('article.search-index', compact('articles', 'query'));
    }
}