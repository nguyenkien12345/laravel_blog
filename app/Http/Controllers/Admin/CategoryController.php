<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use Log;
use DB;


class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->all();
        return view('admin.category.list', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        // B1: Validate input
        $rules = [
            'name' => 'required|min:3|max:64'
        ];

        $message = [
            'name.required' => 'Vui lòng nhập Category Name',
            'name.min' => 'Độ dài tối thiểu của Category Name là 3',
            'name.max' => 'Độ dài tối đa của Category Name là 64',
        ];

        $request->validate($rules, $message);
        try {
            DB::beginTransaction();

            $name = $request->name;
            $slug = Str::slug($name);

            // B2: Check if slug is exists
            // $checkSlugIsExists = Category::where('slug', $slug)->first();

            // while ($checkSlugIsExists) {
            //     $slug = $checkSlugIsExists->slug . Str::random(5);
            // };

            // B3: Save into db
            Category::create([
                'name' => $name,
                'slug' => $slug
            ]);

            Log::channel('create_category_log_history')->info(
                'Create Category Success.',
                [
                    'route' => 'admin.category.store',
                    'controller' => 'CategoryController',
                    'category' => [
                        'name' => $name,
                        'slug' => $slug,
                    ],
                    'time' => date('d-m-Y H:i:s')
                ]
            );

            DB::commit();

            // B4: Return to List
            return redirect()->route('admin.category.index')->with('success', 'Create Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // B1: Validate input
        $rules = [
            'name' => 'required|min:3|max:64'
        ];

        $message = [
            'name.required' => 'Vui lòng nhập Category Name',
            'name.min' => 'Độ dài tối thiểu của Category Name là 3',
            'name.max' => 'Độ dài tối đa của Category Name là 64',
        ];

        $request->validate($rules, $message);
        try {
            DB::beginTransaction();

            $name = $request->name;
            $slug = Str::slug($name);

            // B2: Check if slug is exists
            // $checkSlugIsExists = Category::where('slug', $slug)->first();

            // while ($checkSlugIsExists) {
            //     $slug = $checkSlugIsExists->slug . Str::random(5);
            // }

            // // B3: Find category in db
            // $category = Category::find($id);

            // // B4: Update and Save into db
            // $category->update([
            //     'name' => $name,
            //     'slug' => $slug
            // ]);

            // B3 + B4: Find category in db, Update and Save into db
            Category::where('id', $id)->update([
                'name' => $name,
                'slug' => $slug
            ]);

            Log::channel('update_category_log_history')->info(
                'Update Category Success.',
                [
                    'route' => 'admin.category.update',
                    'controller' => 'CategoryController',
                    'category' => [
                        'name' => $name,
                        'slug' => $slug,
                    ],
                    'time' => date('d-m-Y H:i:s')
                ]
            );

            DB::commit();

            // B5: Return to this Category
            return redirect()->route('admin.category.index')->with('success', 'Update Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();

            // // B1: Find category in db
            // $category = Category::find($id);
            // // B2: Update and Save into db
            // $category->delete();

            // B1 + B2: Find category in db, Delete and Save into db
            Category::where('id', $id)->delete();

            Log::channel('delete_category_log_history')->info(
                'Delete Category Success.',
                [
                    'route' => 'admin.category.delete',
                    'controller' => 'CategoryController',
                    'id' => $id,
                    'time' => date('d-m-Y H:i:s')
                ]
            );

            DB::statement("ALTER TABLE categories AUTO_INCREMENT = 1");

            DB::commit();

            // B3: Return to List
            return back()->with('success', 'Delete Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }
}
