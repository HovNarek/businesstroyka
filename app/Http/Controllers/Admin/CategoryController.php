<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::getAllCats();
        return view('admin.category.index', compact( 'cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specs = Specialization::with('categories')->orderBy('spec_title')->get();
        return view('admin.category.create', compact('specs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'cat_title' => 'required|unique:categories|min:3|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (isset($request->cat_enabled) && $request->cat_enabled === "on") {
            $enabled = 1;
        } else {
            $enabled = 0;
        }
        if (isset($request->cat_pay) && $request->cat_pay === "on") {
            $pay = 1;
        } else {
            $pay = 0;
        }
        $cat = Category::create([
            'cat_title' => $request->cat_title,
            'cat_enabled' => $enabled,
            'cat_mtitle' => $request->cat_mtitle ?? $request->cat_title,
            'cat_mkeywords' => $request->cat_mkeywords ?? $request->cat_title,
            'cat_mdescription' => $request->cat_mdescription ?? $request->cat_title,
            'cat_pay' => $pay,
            'cat_price' => $request->cat_price ?? 0,
        ]);

        $cat->specializations()->sync($request->specs);

        return redirect()->route('categories.index')->with('success', 'Категория создана');

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
    public function edit($id)
    {
        $cat = Category::getCatById($id);
        if ($cat === null) {
            return redirect()->back();
        }
        $specs = Specialization::getAllSpecs();

        return view('admin.category.edit', compact('cat', 'specs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'cat_title' => 'required|min:3|max:50',
        ]);

        $cats = Category::where('cat_title', $request->cat_title)
            ->where('id', '<>', $id)
            ->get();
        if (count($cats)) {
            return redirect()->back()
                ->with('error', 'Категория с этим именем уже существует')
                ->withInput();
        }

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (isset($request->cat_enabled) && $request->cat_enabled === "on") {
            $enabled = 1;
        } else {
            $enabled = 0;
        }

        if (isset($request->cat_pay) && $request->cat_pay === "on") {
            $pay = 1;
        } else {
            $pay = 0;
        }

        Category::where('id', $id)->update([
            'cat_title' => $request->cat_title,
            'cat_enabled' => $enabled,
            'cat_mtitle' => $request->cat_mtitle ?? $request->cat_title,
            'cat_mkeywords' => $request->cat_mkeywords ?? $request->cat_title,
            'cat_mdescription' => $request->cat_mdescription ?? $request->cat_title,
            'cat_pay' => $pay,
            'cat_price' => $request->cat_price ?? 0
        ]);

        $cat = Category::getCatById($id);
        $cat->specializations()->sync($request->specs);

        return redirect()->route('categories.index')->with('success', 'Категория обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);

        return redirect()->route('categories.index')->with('success', "Категория удалена");
    }

    public function ajaxChangeCatStatus(Request $request) {
        $cat_status = Category::find($request->id)->cat_enabled;
        if ($cat_status) {
            $status = 0;
        } else {
            $status = 1;
        }
        Category::where('id', $request->id)->update(['cat_enabled' => $status]);
        return $status;
    }
}
