<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SpecializationController extends Controller
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
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cat' => ' integer|min:0'
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        }

        if (isset($request->cat)) {
            $cat_id = $request->cat;
        } else {
            $cat_id = 0;
        }
        if ($cat_id == 0) {
            $specs = Specialization::getAllSpecs();
        } else {
            $specs = Specialization::getSpecsByCategoryId($cat_id);
        }

        $cats = Category::with('specializations')->get();

        $current_cat = Category::getCatById($cat_id);
        if ($current_cat === null) {
            $current_cat_id = 0;
        } else {
            $current_cat_id = $cat_id;
        }

        return view('admin.specialization.index', compact('specs', 'cats', 'current_cat_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.specialization.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'spec_title' => 'required|unique:specializations|min:3|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (isset($request->spec_enabled) && $request->spec_enabled === "on") {
            $enabled = 1;
        } else {
            $enabled = 0;
        }
        Specialization::create([
            'spec_title' => $request->spec_title,
            'spec_enabled' => $enabled,
            'spec_mtitle' => $request->spec_mtitle ?? $request->spec_title,
            'spec_mkeywords' => $request->spec_mkeywords ?? $request->spec_title,
            'spec_mdescription' => $request->spec_mdescription ?? $request->spec_title
        ]);

        return redirect()->route('specializations.index')->with('success', 'Специализация создана');
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
        $spec = Specialization::getSpecById($id);
        if ($spec === null) {
            return redirect()->back();
        }
        return view('admin.specialization.edit', compact('spec'));
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
            'spec_title' => 'required|min:3|max:50',
        ]);

        $specs = Specialization::where('spec_title', $request->spec_title)
                            ->where('id', '<>', $id)
                            ->get();
        if (count($specs)) {
            return redirect()->back()
                ->with('error', 'Специализация с этим именем уже существует')
                ->withInput();
        }

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (isset($request->spec_enabled) && $request->spec_enabled === "on") {
            $enabled = 1;
        } else {
            $enabled = 0;
        }
        Specialization::where('id', $id)->update([
            'spec_title' => $request->spec_title,
            'spec_enabled' => $enabled,
            'spec_mtitle' => $request->spec_mtitle ?? $request->spec_title,
            'spec_mkeywords' => $request->spec_mkeywords ?? $request->spec_title,
            'spec_mdescription' => $request->spec_mdescription ?? $request->spec_title
        ]);

        return redirect()->route('specializations.index')->with('success', 'Специализация обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Specialization::destroy($id);

        return redirect()->route('specializations.index')->with('success', "Специализация удалена");
    }

    public function ajaxChangeSpecStatus(Request $request) {
        $spec_status = Specialization::find($request->id)->spec_enabled;
        if ($spec_status) {
            $status = 0;
        } else {
            $status = 1;
        }
        Specialization::where('id', $request->id)->update(['spec_enabled' => $status]);
        return $status;
    }

}
