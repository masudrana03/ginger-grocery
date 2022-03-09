<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.categories.index');
    }

    /**
     * @param Request $request
     */
    public function allCategories(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'name',
            2 => 'image',
            3 => 'created_at',
            4 => 'id',
        ];

        //  $product->types->pluck('name')->implode(', ') : 'Not found' }}

        // $category = Product::query();
        // $categoryId = Product::pluck('category_id')->unique();
        $categoryId = Product::where('store_id', auth()->user()->store_id)->pluck('category_id');

        $category = Category::query();
        if ( !isAdmin() ) {
           $p = $category->where('id', $categoryId);
        }
        // if( isAdmin() ) {
        //    $s = $category->whereIn('id', $categoryId);
        // }


        // logger($p)->get();
        // logger($p->get());

        // if (!isAdmin()) {
             // $product = $product->where('store_id', auth()->user()->store_id)->pluck('id')->first();
        // }
        // if ($request->store) {
        //     $product = $product->where('store_id', $request->store);
        //     logger($product)->get();
        // }



        $totalData = $category->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $categories = $category->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $categories = $category->where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = $category->where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = [];

        if (!empty($categories)) {
            foreach ($categories as $category) {
                $edit   = route('admin.categories.edit', $category->id);
                $delete = route('admin.categories.destroy', $category->id);
                $token  = csrf_token();
                $img    = asset('assets/img/uploads/categories/thumbnail/' . $category->image);

                $nestedData['id']         = $category->id;
                $nestedData['name']       = $category->name;
                $nestedData['image']      = "<img src='{$img}' width='60'>";
                $nestedData['created_at'] = $category->created_at->format('d-m-Y');
                $nestedData['actions']    = "
                    &emsp;<a href='{$edit}' title='EDIT' ><span class='far fa-edit'></span></a>
                    &emsp;<a href='#' onclick='deleteCategory({$category->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                    <form id='delete-form-{$category->id}' action='{$delete}' method='POST' style='display: none;'>
                    <input type='hidden' name='_token' value='{$token}'>
                    <input type='hidden' name='_method' value='DELETE'>
                    </form>
                    ";
                $data[] = $nestedData;
            }
        }

        $json_data = [
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,
        ];

        echo json_encode($json_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|unique:categories',
            'image' => 'required|image',
        ]);

        if ($request->hasFile('image')) {
            $image             = $request->file('image');
            $filename          = generateUniqueFileName($image->getClientOriginalExtension());
            $location          = public_path('assets/img/uploads/categories/' . $filename);
            $thumbnailLocation = public_path('assets/img/uploads/categories/thumbnail/' . $filename);

            saveImageWithThumbnail($image, $location, $thumbnailLocation);
        }

        $category         = new Category();
        $category->name   = $request->name;
        $category->image  = $filename;
        $category['slug'] = Str::slug($request->name);
        $category->save();

        toast('Category successfully created', 'success');

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @param  \App\Models\Category        $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name'  => 'required|unique:categories,name,' . $category->id,
            'image' => 'image',
        ]);

        if ($request->hasFile('image')) {
            $imageDirectory = 'assets/img/uploads/categories/';

            deleteImage($category->image, $imageDirectory);

            $image             = $request->file('image');
            $filename          = generateUniqueFileName($image->getClientOriginalExtension());
            $location          = public_path('assets/img/uploads/categories/' . $filename);
            $thumbnailLocation = public_path('assets/img/uploads/categories/thumbnail/' . $filename);

            saveImageWithThumbnail($image, $location, $thumbnailLocation);

            $category->image = $filename;
        }

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        toast('Category successfully updated', 'success');

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories      $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

        if ($category->products) {
            toast('Category could not deleted as it already used', 'error');

            return back();
        }

        $imageDirectory = 'assets/img/uploads/categories/';

        deleteImage($category->image, $imageDirectory);

        $category->delete();

        toast('Category successfully deleted', 'success');

        return back();
    }
}
