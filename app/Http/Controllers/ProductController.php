<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Unit;
use App\Models\Brand;
use App\Models\Store;
use App\Models\Product;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Nutrition;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.products.index');
    }

    /**
     * @param Request $request
     */
    public function allProducts(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'title',
            2 => 'brand',
            3 => 'category',
            4 => 'unit',
            5 => 'price',
            6 => 'store',
            7 => 'image',
            8 => 'created_at',
            9 => 'id',
        ];

        $product = Product::query();
        if (!isAdmin()) {
            $product = $product->where('store_id', auth()->user()->store_id);
        }

        $totalData = $product->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $products = $product->with('category', 'user', 'brand', 'unit', 'store', 'currency', 'types', 'nutritions')->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $products = $product->with('category', 'user', 'brand', 'unit', 'store', 'currency', 'types', 'nutritions')->where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = $product->with('category', 'user', 'brand', 'unit', 'store', 'currency', 'types', 'nutritions')->where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = [];

        if (!empty($products)) {
            foreach ($products as $product) {
                $edit   = route('admin.products.edit', $product->id);
                $delete = route('admin.products.destroy', $product->id);
                $token  = csrf_token();
                // $img    = asset( 'assets/img/uploads/products/thumbnail/' . $product->image );

                $nestedData['id']         = $product->id;
                $nestedData['title']      = $product->name;
                $nestedData['brand']      = $product->brand->name;
                $nestedData['category']   = $product->category->name;
                $nestedData['unit']       = $product->unit->name;
                $nestedData['price']      = $product->price;
                $nestedData['store']      = $product->store->name;
                $nestedData['created_at'] = $product->created_at->format('d-m-Y');
                $nestedData['actions']    = "
                    &emsp;<a href='{$edit}' title='EDIT' ><span class='far fa-edit'></span></a>
                    &emsp;<a href='#' onclick='deleteProduct({$product->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                    <form id='delete-form-{$product->id}' action='{$delete}' method='POST' style='display: none;'>
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
        $brands     = Brand::all();
        $categories = Category::all();
        $units      = Unit::all();
        $stores     = isAdmin() ? Store::all() : [auth()->user()->store];
        $currencies = Currency::all();
        $types      = Type::all();
        $nutritions = Nutrition::all();

        return view('backend.products.create', compact('brands', 'categories', 'units', 'stores', 'currencies', 'types', 'nutritions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $product            = $request->except('image', 'types', 'nutritions');
        $product['user_id'] = auth()->id();
        $product['slug']    = Str::slug($request->name);

        $product = Product::create($product);

        if ($request->hasFile('image')) {
            $this->uploadProductImage($product, $request->file('image'));
        }

        $product->types()->attach($request->types);
        $product->nutritions()->attach($request->nutritions);

        toast('Product successfully created', 'success');

        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands     = Brand::all();
        $categories = Category::all();
        $units      = Unit::all();
        $stores     = isAdmin() ? Store::all() : [auth()->user()->store];
        $currencies = Currency::all();
        $types      = Type::all();
        $nutritions = Nutrition::all();
        $product    = $product->load('types', 'nutritions');
        
        
        //return $product->images;
        return view('backend.products.edit', compact('product', 'brands', 'categories', 'units', 'stores', 'currencies', 'types', 'nutritions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Requests\ProductUpdateRequest  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        return $request;
        $productData        = $request->except('image', 'types', 'nutritions');
        $product['user_id'] = auth()->id();

        $productData['slug']    = Str::slug($request->name);
        $product->update($productData);

        if ($request->hasFile('image')) {
            $product->images()->delete();
            $this->uploadProductImage($product, $request->file('image'));
        }

        $product->types()->sync($request->types);
        $product->nutritions()->sync($request->nutritions);

        toast('Product successfully updated', 'success');

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        if (!isShopManager($product->store_id) && !isAdmin()) {
            return abort(403);
        }

        foreach ($product->images as $image) {
            $imageDirectory = 'assets/img/uploads/products/';

            deleteImage($image->image, $imageDirectory);
        }

        $product->images()->delete();
        $product->types()->detach();
        $product->nutritions()->detach();
        $product->delete();

        toast('Product successfully deleted', 'success');

        return redirect()->back();
    }

    /**
     * Upload product image
     *
     * @param Product $product
     * @param array $images
     * @return void
     */
    public function uploadProductImage($product, $images)
    {
        foreach ($product->images as $image) {
            $imageDirectory = 'assets/img/uploads/products/';

            deleteImage($image->image, $imageDirectory);
        }

        $filenames = [];

        foreach ($images as $image) {
            $filename          = generateUniqueFileName($image->getClientOriginalExtension());
            $location          = public_path('assets/img/uploads/products/' . $filename);
            $thumbnailLocation = public_path('assets/img/uploads/products/thumbnail/' . $filename);

            $filenames['image'] = $filename;

            saveImageWithThumbnail($image, $location, $thumbnailLocation);

            $product->images()->create($filenames);
        }
    }
}
