<?php

namespace Modules\CategoriesModule\Http\Controllers\Categories;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CategoriesModule\Http\Requests\MainCategoryRequest;
use Modules\CategoriesModule\Entities\MainCategory;
use DB;

class MainCategoriesController extends Controller
{
   
    public function index()
    {
        $default_lang = get_default_lang();
         $mainCategories = MainCategory::where('translation_lang', $default_lang) -> select() -> get();
         return view('categoriesmodule::maincategories.allCategories', compact('mainCategories'));
    }

   
    public function create()
    {
        return view('categoriesmodule::maincategories.create');
    }


 

    ###################################

    public function store(MainCategoryRequest $request)
    {

        try {
            //return $request;

            $main_categories = collect($request->category);

            $filter = $main_categories->filter(function ($value, $key) {
                return $value['abbr'] == get_default_lang();
            });

            $default_category = array_values($filter->all()) [0];


            $filePath = "";
            if ($request->has('photo')) {

                $filePath = uploadImage('maincategories', $request->photo);
            }

            DB::beginTransaction();

            $default_category_id = MainCategory::insertGetId([
                'translation_lang' => $default_category['abbr'],
                'translation_of' => 0,
                'name' => $default_category['name'],
                'slug' => $default_category['name'],
                'photo' => $filePath
            ]);

            $categories = $main_categories->filter(function ($value, $key) {
                return $value['abbr'] != get_default_lang();
            });


            if (isset($categories) && $categories->count()) {

                $categories_arr = [];
                foreach ($categories as $category) {
                    $categories_arr[] = [
                        'translation_lang' => $category['abbr'],
                        'translation_of' => $default_category_id,
                        'name' => $category['name'],
                        'slug' => $category['name'],
                        'photo' => $filePath
                    ];
                }

                MainCategory::insert($categories_arr);
            }

            DB::commit();

            return redirect()->route('maincategories.all')->with(['success' => 'تم الحفظ بنجاح']);

        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('maincategories.all')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
        
    }
    ####################################

  
    public function show($id)
    {
        return view('categoriesmodule::show');
    }
    
   
    public function edit($id)
    {
       $mainCategory = MainCategory::select()->find($id);
        if( !$mainCategory ){
            return redirect()->route('maincategories.all')->with(['error' => 'هذا القسم غير موجود ']);
        }
        return view('categoriesmodule::maincategories.edit', compact('mainCategory'));
    }

    
    public function update(MainCategoryRequest $request, $id)
    {
        return $request; 
        // try {
        //     $main_category = MainCategory::find($id);

        //     if (!$main_category)
        //         return redirect()->route('admin.maincategories')->with(['error' => 'هذا القسم غير موجود ']);

        //     // update date

        //     $category = array_values($request->category) [0];

        //     if (!$request->has('category.0.active'))
        //         $request->request->add(['active' => 0]);
        //     else
        //         $request->request->add(['active' => 1]);


        //     MainCategory::where('id', $id)
        //         ->update([
        //             'name' => $category['name'],
        //             'active' => $request->active,
        //         ]);

        //     // save image

        //     if ($request->has('photo')) {
        //         $filePath = uploadImage('maincategories', $request->photo);
        //         MainCategory::where('id', $mainCat_id)
        //             ->update([
        //                 'photo' => $filePath,
        //             ]);
        //     }


        //     return redirect()->route('maincategories.all')->with(['success' => 'تم ألتحديث بنجاح']);
        // } catch (\Exception $ex) {

        //     return redirect()->route('admin.maincategories.all')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        // }
    }

    public function destroy($id)
    {
        //
    }
}
