<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $products = Product::all();
    //  dd($products);
    return view('products/all', compact('products', $products));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('products/forum');
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // dd($request->status);
    $data = $request->all();
    $data['slug']  = Str::Slug($request->name, '-');
 
    if (isset ($request->status )){
      $data['status'] = 1;
    } else
      $data['status'] = 0;
    //  dd($data);

    $product = Product::create($data);
    //dd($request->file('banner_image'));
    if ($request->file('banner_image'))
    {
      // $path = $request->file('banner_image')->store('images/products/' . $product->name);
      $path =Storage::disk('public')->put('images/products/' . $product->name,$request->file('banner_image'));

      $product->banner_image =  $path;
    }
    if ($request->file('preview_image'))
    {
      $path2 =Storage::disk('public')->put('images/products/' . $product->name,$request->file('banner_image'));

      $product->preview_image =  $path2;

    }

   

    $product->save();
    return redirect('/products')->with('msg', 'message text');
  }

  /**
   * Display the specified resource.
   *
   *    * @param  string  $slug
   * @param  \App\Product  $slug
   * @return \Illuminate\Http\Response
   */
  public function show( $slug)
  {
    
        $product = Product::where('slug',$slug)->get();
        if(count($product) >0){
         
          return view('products/show',['product'=> $product[0]]);
        }
        else
        {
          abort(404);
        }
      }

  

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function edit($product)
  {
    //view('edit')->with('products',$products)
    //  dd($product->id);
    $pro = Product::find($product);
    //  dd($pro);
    return view('products/edit', ['productcase' => $pro]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, String $product)
  {
    //dd('update function');

    // dd($request->all());
    $oldpro = Product::find($product);
    $oldpro->name = $request->name;
    if (isset ($request->status )){
      $oldpro->status= 1;
    } else
    $oldpro->status = 0;
   
    $oldpro->description = $request->description;
    $oldpro->short_description = $request->short_description;
    if ($request->file('banner_image')) {
      $path = Storage::disk('public')->put('images/products/' .  $oldpro->name, $request->file('banner_image'));

      $oldpro->banner_image =  $path;
    }
    if ($request->file('preview_image')) {
      $path2 = Storage::disk('public')->put('images/products/' .  $oldpro->name, $request->file('preview_image'));
     
      $oldpro->preview_image =  $path2;
    }
    $oldpro->save();

    return redirect('/products')->with('success', 'product is successfully updated');
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function destroy($product)
  {
    //  dd('delete function');
    $products = Product::findOrFail($product);
    $products->delete();
    // return redirect('/products')->with('success', 'product  is successfully deleted');
  }
}
