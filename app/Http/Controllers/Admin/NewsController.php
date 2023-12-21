<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\NewsFormRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $news_data = News::all();
        $categories = Category::all();
        return view('admin.news.news', [
            "news_data" => $news_data,
            "categories" => $categories,
        ]);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    // ДОБАВИТЬ НОВОСТЬ
    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create_news', [
            "categories" => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



public function store(NewsFormRequest $request)
{
    $data = $request->validated();

    if ($request->has("image")) {
        $image = str_replace("public/news", "", $request->file("image")->store("public/news"));
        $data["images"] = $image;
    }

    $news = News::create($data);
    return redirect(route('admin.news.index'));
}




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function show($id)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    // РЕДАКТИРОВАТЬ НОВОСТЬ
    public function edit($id)
    {
        $news = News::findOrFail($id);
        $categories = Category::all();
        return view('admin.news.edit_news', [
            'news' => $news,
            "categories" => $categories,
        ]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function update(NewsFormRequest $request, $id)
    {
        $news = News::findOrFail($id);

        $data = $request->validated();

        if ($request->has("image")) {
            $image = str_replace("public/news", "", $request->file("image")->store("public/news"));
            $data["image"] = $image;
        }

        $news->update($data);

        return redirect(route('admin.news.index'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    // УДАЛЕНИЕ НОВОСТИ
    public function destroy($id)
    {
        News::destroy($id);
        return redirect(route('admin.news.index'));
    }
}
