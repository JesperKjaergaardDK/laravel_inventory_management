<?php

namespace App\Http\Controllers;

use App\Models\StorageItem;
use Illuminate\Http\Request;

class StorageItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = StorageItem::all();
        return view('storage.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('storage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        StorageItem::create($validated);

        return redirect()->route('storage.index')->with('success', 'Successfully created a product');
    }

    /**
     * Display the specified resource.
     */
    public function show(StorageItem $storageItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    { 
        $item = StorageItem::findOrFail($id);
        return view('storage.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $item = StorageItem::findOrFail($id);
        $item->update($validated);

        return redirect()->route('storage.index')->with('success', 'Successfully Updated a product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = StorageItem::findOrFail($id);
        $item->delete();

        return redirect()->route('storage.index')->with('success', 'storage item has been deleted');
    }
}
