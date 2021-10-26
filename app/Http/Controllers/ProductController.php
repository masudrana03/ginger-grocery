<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Product;
use App\Models\Store;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index');
    }

    /**
     * @param Request $request
     */
    public function allProducts ( Request $request ) {
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

        $totalData = Product::count();

        $totalFiltered = $totalData;

        $limit = $request->input( 'length' );
        $start = $request->input( 'start' );
        $order = $columns[$request->input( 'order.0.column' )];
        $dir   = $request->input( 'order.0.dir' );

        if ( empty( $request->input( 'search.value' )) ) {
            $products = Product::with('category', 'user', 'brand', 'unit', 'store', 'currency')->offset( $start )
                ->limit( $limit )
                ->orderBy( $order, $dir )
                ->get();
        } else {
            $search = $request->input( 'search.value' );

            $products = Product::with('category', 'user', 'brand', 'unit', 'store', 'currency')->where( 'id', 'LIKE', "%{$search}%" )
                ->orWhere( 'name', 'LIKE', "%{$search}%" )
                ->offset( $start )
                ->limit( $limit )
                ->orderBy( $order, $dir )
                ->get();

            $totalFiltered = Product::with('category', 'user', 'brand', 'unit', 'store', 'currency')->where( 'id', 'LIKE', "%{$search}%" )
                ->orWhere( 'name', 'LIKE', "%{$search}%" )
                ->count();
        }

        $data = [];

        if ( !empty( $products ) ) {
            foreach ( $products as $product ) {
                $edit   = route( 'categories.edit', $product->id );
                $delete = route( 'categories.destroy', $product->id );
                $token  = csrf_token();
                // $img    = asset( 'assets/img/uploads/categories/thumbnail/' . $product->image );

                $nestedData['id']         = $product->id;
                $nestedData['title']      = $product->title;
                $nestedData['brand']      = $product->brand->name;
                $nestedData['category']   = $product->category->name;
                $nestedData['unit']       = $product->unit->name;
                $nestedData['price']      = $product->price;
                $nestedData['store']      = $product->store->name;
                $nestedData['created_at'] = $product->created_at->format('d-m-Y');
                $nestedData['actions']    = "
                    &emsp;<a href='{$edit}' title='EDIT' ><span class='far fa-edit'></span></a>
                    &emsp;<a href='#' onclick='deleteCategory({$product->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                    <form id='delete-form-{$product->id}' action='{$delete}' method='POST' style='display: none;'>
                    <input type='hidden' name='_token' value='{$token}'>
                    <input type='hidden' name='_method' value='DELETE'>
                    </form>
                    ";
                $data[] = $nestedData;
            }
        }

        $json_data = [
            "draw"            => intval( $request->input( 'draw' ) ),
            "recordsTotal"    => intval( $totalData ),
            "recordsFiltered" => intval( $totalFiltered ),
            "data"            => $data,
        ];

        echo json_encode( $json_data );
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
        $stores     = Store::all();
        $currencies = Currency::all();

        return view('products.create', compact('brands', 'categories', 'units', 'stores', 'currencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $product = $request->except('image');
        $product['user_id'] = auth()->id();

        $product = Product::create($product);

        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $filenames = [];

            foreach ($images as $image) {
                $filename          = generateUniqueFileName($image->getClientOriginalExtension());
                $location          = public_path('assets/img/uploads/products/' . $filename);
                $thumbnailLocation = public_path('assets/img/uploads/products/thumbnail/' . $filename);

                $filenames['image'] = $filename;

                saveImageWithThumbnail($image, $location, $thumbnailLocation);
            }

            $product->images()->create($filenames);

            toast( 'Product successfully created', 'success' );

            return redirect()->route( 'products.index' );
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
