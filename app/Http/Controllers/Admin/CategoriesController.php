<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Category;
use App\Models\Interview;
use App\Models\Lyrics;
use App\Models\News;

class CategoriesController extends DefaultAdminController
{

    public function index()
    {
        $categories = Category::paginate(self::PAGINATION_PAGE);
        return view('admin.categories.index', compact('categories'));
    }

    public function add()
    {
        return view('admin.categories.add');
    }

    public function create(CategoryRequest $request)
    {

        if($request->post()) {
            $category = new Category();

            $category->title = $request->title;
            $category->status = $request->status === 'on' ? 1 : 0;
            $category->alias = $request->alias;
            $category->save();

        }
        return redirect()->route('adminCategoryIndex')->with('status', "Категория {$category->title} добавлена.");
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {

        if($request->post()){

            $category = Category::findOrFail($id);

            $category->title = $request->title;
            $category->status = $request->status === 'on' ? 1 : 0;
            $category->alias = $request->alias;
            $category->save();

        }
        return redirect()->route('adminCategoryIndex')->with('status', "Категория {$category->title} обновлена.");
    }

    public function delete($id)
    {
        News::where('category_id', $id)->delete();
        Artist::where('category_id', $id)->delete();
        Album::where('category_id', $id)->delete();
        Interview::where('category_id', $id)->delete();
        Lyrics::where('category_id', $id)->delete();
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('status', "Категория {$category->title} удалена.");
    }

}
