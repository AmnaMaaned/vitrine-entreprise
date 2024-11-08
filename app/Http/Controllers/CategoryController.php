<?php

namespace App\Http\Controllers;
use App\Category;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::all();
    
          return view('categories/all',compact('category',$category));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/categories/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $data['slug'] =Str::slug($request->name,'-');
        
        if(isset($request->status))
          $data['status']=1;
        else
           $data['status']=0;
     $cat =Category::create($data);
 if ($request->file('banner_image'))
    {
      // $path = $request->file('banner_image')->store('images/categories/' . $cat->Name);
      $path =Storage::disk('public')->put('images/category/' . $cat->Name,$request->file('banner_image'));
      $cat->banner_image =  $path;
    }
    if ($request->file('preview_image'))
    {
      $path2 =Storage::disk('public')->put('images/categories/' . $cat->Name,$request->file('banner_image'));
      $cat->preview_image =  $path2;

    }
      $cat->save();
        return redirect('/categories')->with('msg','message text');
    }
    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $cat = Category::where('slug',$slug)->get();
        if(count($cat) >0){
         // dd($app);
          return view('categories/show',['cat'=> $cat[0]]);
        }
        else
        {
          abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     *   @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        $cat = Category::find($category);
        
         return view('categories/edit',['categorycase'=> $cat]);

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,string $category)
    {
        $c= Category::find($category);
        $c->name = $request->name;
        // $c->status = $request->status;
        if ($request->status)
           $c->status = 1;
       else
           $c->status = 0;
        $c->description = $request->description;
        $c->short_description = $request->short_description;
        if ($request->file('banner_image')) {
          $path = Storage::disk('public')->put('images/categories/' . $c->name, $request->file('banner_image'));
  
          $c->banner_image =  $path;
        }
        if ($request->file('preview_image')) {
          $path2 = Storage::disk('public')->put('images/categories/' . $c->name, $request->file('preview_image'));
         
          $c->preview_image =  $path2;
        }
        $c->save();
        return redirect('/categories')->with('success', 'product is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
      
        $category = Category::findOrFail($category);
        $category->delete();
    }
}
