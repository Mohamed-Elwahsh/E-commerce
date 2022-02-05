<?php

namespace Modules\CategoriesModule\Http\Controllers\Languages;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CategoriesModule\Http\Requests\LanguagesRequest;
use Modules\CategoriesModule\Entities\Language;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
         $languages = Language::select()->paginate(PAGINATION);         
        return view('categoriesmodule::languages.allLanguages', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('categoriesmodule::languages.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(LanguagesRequest $request)
    {
        try{
            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
                
            Language::create($request->except(['_token']));
            return redirect()->route('languages.all')->with(['success' => 'تم حفظ اللغة بنجاح']);
        }
        catch (\Exception $ex) {
            return redirect()->route('languages.all')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('categoriesmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $language = Language::select()->find($id);
        if (!$language) {
            return redirect()->route('languages.all')->with(['error' => 'هذه اللغة غير موجوده']);
        }
        return view('categoriesmodule::languages.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(LanguagesRequest $request, $id)
    {
        try {
            $language = Language::find($id);
            if (!$language) {
                return redirect()->route('languages.edit', $id)->with(['error' => 'هذه اللغة غير موجوده']);
            }


            if (!$request->has('active'))
                $request->request->add(['active' => 0]);

            $language->update($request->except('_token'));

            return redirect()->route('languages.all')->with(['success' => 'تم تحديث اللغة بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('languages.all')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try {
            $language = Language::find($id);
            if (!$language) {
                return redirect()->route('languages.all', $id)->with(['error' => 'هذه اللغة غير موجوده']);
            }
            $language->delete();

            return redirect()->route('languages.all')->with(['success' => 'تم حذف اللغة بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('languages.all')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }
}
