<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request,[
            'name' => 'required',
            'category' => 'required',
            'image' => 'required',
            'description'=>'required',
            'price' => 'required',
        ]);

        if($request->hasfile('image')){
           $filename = $request->image->getClientOriginalName();
           $request->image->storeAs('public/upload',$filename);

                  
           $item = new Item();
           $item->name = $request -> name;
           $item->category_id = $request -> category ;
           $item->image = $filename;
           $item->description = $request -> description;
           $item->price = $request -> price;
           $item->save();
        }
            return redirect()->route('item.index')->with('successMsg','Item Successfully Saved');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $categories = Category::all();
        return view('item.edit',compact('item','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this -> validate($request,[
            'name' => 'required',
            'category' => 'required',
            'image' => 'required',
            'description'=>'required',
            'price' => 'required',
        ]);

        $item = Item::find($id);

        if($request->hasfile('image')){
           $filename = $request->image->getClientOriginalName();
           $request->image->storeAs('public/upload',$filename);

           $item->name = $request -> name;
           $item->category_id = $request -> category ;
           $item->image = $filename;
           $item->description = $request -> description;
           $item->price = $request -> price;
           $item->save();
        }
            return redirect()->route('item.index')->with('successMsg','Item Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
       //unlink('public/upload/',$item->image);
        $item->delete();
        return redirect()->back()->with('successMsg','Item Successful Deleted');
    }
}
