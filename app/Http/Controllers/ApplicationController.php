<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;


class ApplicationController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $applications = Application::all();

    //dd($applications);
    return view('applications/all', compact('applications', $applications));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

    $products = Product::all();
    $y = 3;
    $x = compact('products', 'y');
    //dd($x);
    $category = Category::all();

    return view('applications/ajout', compact('category', 'products'));
  }
  public function saveProductToApp(Request $request)
  {

    $applications = Application::find($request->application_id);
    if (!$applications)
      return abort('404');

    $applications->products()->attach($request->product_id);
    //$applications->products()->syncWithoutDetaching($request->product_id);
    //$applications->products()->sync($request->product_id);

    return ("success");
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $data = $request->all();
    $data['slug'] = Str::slug($request->name, '-');
    if (isset($request->status))
      $data['status'] = 1;
    else
      $data['status'] = 0;

    $app = Application::create(($data));
    if ($request->file('banner_image')) {
      $path = Storage::disk('public')->put('images/applications/' . $app->name, $request->file('banner_image'));
      // $path = $request->file('banner_image')->store('images/applications/' . $app->name);
      $app->banner_image =  $path;
    }
    if ($request->file('preview_image')) {
      $path2 = Storage::disk('public')->put('images/applications/' . $app->name, $request->file('banner_image'));
      // $path2 = $request->file('preview_image')->store('images/applications/' . $app->name);
      $app->preview_image =  $path2;
    }
    //   $app=new Application();
    //   $app->name=$request->name;
    //   $app->description=$request->description;
    //   $app->status=$request->status;

    //   $id = $app->save();
    $app->products()->attach($request->products);
    $app->category()->attach($request->categories);

    //  $id= Application::create($request->all());

    $app->save();

    return redirect('/applications')->with('msg', 'message text');
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Application  $application
   * @return \Illuminate\Http\Response
   */
  public function edit($application)
  {
    $ap = Application::find($application);

    return view('applications/edit', ['applicationcase' => $ap]);
  }


  /**
   * Show the form for showing the specified resource.
   *
   * @param  string  $slug
   * @return \Illuminate\Http\Response
   */
  public function show($slug)
  {
    $app = Application::where('slug', $slug)->get();
    if (count($app) > 0) {
      // dd($app);
      return view('applications/show', ['application' => $app[0]]);
    } else {
      abort(404);
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Application  $application
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, String $application)
  {
    // dd($request->all());
    $app = Application::find($application);
    $app->name = $request->name;
    if ($request->status)
      $app->status = 1;
    else
      $app->status = 0;

    // $app->categorie = $request->categorie;
    $app->description = $request->description;
    $app->short_description = $request->short_description;
    // if ($request->file('banner_image')) {
    //   $path = Storage::disk('public')->put('images/applications/' . $app->name, $request->file('banner_image'));
    //   // $path = $request->file('banner_image')->store('images/applications/' . $app->name);
    //   $app->banner_image =  $path;
    // }
    // if ($request->file('preview_image')) {
    //   $path2 = Storage::disk('public')->put('images/applications/' . $app->name, $request->file('preview_image'));
    //   // $path2 = $request->file('preview_image')->store('images/applications/' . $app->name);
    //   $app->preview_image =  $path2;
    // }
    if ($request->file('banner_image')) {
      $path = Storage::disk('public')->put('images/applications/' .  $app->name, $request->file('banner_image'));

      $app->banner_image =  $path;
    }
    if ($request->file('preview_image')) {
      $path2 = Storage::disk('public')->put('images/applications/' .  $app->name, $request->file('preview_image'));
     
      $app->preview_image =  $path2;
    }

    $app->products()->sync($request->products);
    $app->category()->sync($request->categories);
    $app->save();
    return redirect('/applications')->with('success', 'application is successfully updated');
  }

  public function testApp()
  {
    $x = Application::find(1);
    $prds = $x->products()->get();
    //dd($prds);

    $y = Product::find(6);

    $app = $y->applications()->get();
    dd($app);
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($application)
  {
    $app = Application::findOrFail($application);
    $app->delete();
  }
}
