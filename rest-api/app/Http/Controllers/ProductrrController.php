<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return response()->json(['product' => $product], 200);
    }
    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json(['product' => $product], 200);
        } else {
            return response()->json(['message' => 'No record found'], 404);
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'description' => 'required|max:191',
            'price' => 'required|max:191',
            'qty' => 'required|max:191'
        ]);

        $product = new  Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->save();
        return response()->json(['message' => 'Product Added Successfully'], 200);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|max:191',
            'description' => 'required|max:191',
            'price' => 'required|max:191',
            'qty' => 'required|max:191'
        ]);

        $product = Product::find($id);
        if ($product) {
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->qty = $request->qty;
            $product->update();
            return response()->json(['message' => 'Product Updated Successfully'], 200);
        } else {
            return response()->json(['message' => 'No Record Found'], 404);
        }
    }

    public function destroy($id){
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json(['message' => 'Product Deleted Successfully'], 200);
        }else{
            return response()->json(['message' => 'No Record Found'], 404);
        }
    }
}
