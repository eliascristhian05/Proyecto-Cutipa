<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::with("category")->paginate(15);
        return view("articles.index", compact("articles"),[
            "categories"=>Category::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::get();
        $article=new Article;
        $title= __("Añadir Articulo");
        $textButton=__("Crear");
        $route=route("articles.store");
        return view("articles.create", compact("title", "textButton", "route","article","categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "Description"=>"required|max:90",
            "shopping_price"=>"required",
            "sale_price"=>"required",
            "id_category"=>"required"
        ]);
        Article::create($request->only("Description","shopping_price","sale_price","id_category"));
        return redirect(route("articles.index"))
            ->with("success", __("Articulo registrado!"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $update=true;
        $title= __("Editar datos del Articulo");
        $categories=Category::get();
        $textButton= __("Actualizar");
        $route=route("articles.update",["article"=>$article]);
        return view("articles.edit", compact("update","title","categories","article","textButton","route"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->validate($request,[
            "Description"=>"required|max:90",
            "shopping_price"=>"required",
            "sale_price"=>"required",
            "id_category"=>"required"
        ]);
        $article->fill($request->only("Description","shopping_price","sale_price","id_category"))->save();
        return redirect(route("articles.index"))->with("success", __("Datos actualizados"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return back()->with("success", __("Datos del articulo eliminados"));
    }
}
