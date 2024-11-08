<?php

namespace App\Http\Controllers;
use App\FAQ;
use Illuminate\Http\Request;
use App\Product;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $result=FAQ::all();
        // return view('/faq/all',['faq'=>$result]);

        $faq=FAQ::all();
          return view('faq/all',compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('/faq/add');
        $products=Product::all();
       
       return view('faq/add',compact('products'));
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  dd($request->all());
        $faq=FAQ::create($request->all());
         
        return redirect('/faq')->with('msg','message text');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fq = FAQ::where('id',$id)->get();
        if(count($fq) >0){
         // dd($app);
          return view('faq/show',['faq'=> $fq[0]]);
        }
        else
        {
          abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($faq)
    {
        $fq = FAQ::find($faq);
        
        return view('faq/edit',['faqcase'=> $fq]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $faq)
    {
        $f=FAQ::find($faq);
        $f->question= $request->question;
        $f->response = $request->response;
        $f->Product_id = $request->Product_id;
        $f->save();
        
        return redirect('/faq')->with('success', 'faq is successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($faq)
    {
        $faq = FAQ::findOrFail($faq);
        $faq->delete();
    }
}
