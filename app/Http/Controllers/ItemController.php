<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::all();
        $items = item::all();
        return view('items.index', compact('items','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function itemCategory(string $category_id)
    {
        $itemCategories=Item::where('categoryId',$category_id)->get();
        return view('items.item_category',compact('itemCategories'));
    }

    public function itemCart(){
        return view('items.item_carts');
    }

    public function show(string $id)
    {
        // //dd($id);
        // $item = Item::find($id);
        // $item_categoryId = $item->categoryId;
        // //dd($item_categoryId);
        // $item_categories = Item::where('categoryId',$item_categoryId)->orderBy('id','DESC')->limit(4)->get();
        // return view('items.detail', compact('item','item_categories'));

        $item = Item::find($id);

        if ($item !== null) {
            $item_categoryId = $item->categoryId;
            
            $item_categories = Item::where('categoryId', $item_categoryId)
                                    ->where('id', '<>', $id) // Exclude the current item
                                    ->orderBy('id', 'DESC')
                                    ->limit(4)
                                    ->get();
            
            return view('items.detail', compact('item', 'item_categories'));
        }
// } else {
//     // Handle the case when the item is not found
//     return redirect()->route('items.index')->with('error', 'Item not found.');
// }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
