<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Category::class, 'category');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->view('category.index', ['categories' => Category::paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        Log::info('Created category', ['category' => $category, 'user' => $request->user()]);
        Session::push('toasts', 'Category created successfully!');
        return response()->redirectToRoute('categories.show', $category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return response()->view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request $request
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Category $category)
    {
        Log::info('Edited category', ['category' => $category, 'user' => $request->user()]);
        Session::push('toasts', 'Category edited successfully!');
        return response()->view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CategoryRequest $request
     * @param  \App\Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
        return response()->redirectToRoute('categories.show', $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @param  \App\Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request, Category $category)
    {
        $category->delete();
        Log::info('Deleted category', ['category' => $category, 'user' => $request->user()]);
        Session::push('toasts', 'Category deleted successfully!');
        return redirect()->route('categories.index');
    }
}
