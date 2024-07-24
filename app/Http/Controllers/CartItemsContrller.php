<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\updateCartItem;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;

class CartItemsContrller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $messages = [
            'required'=>':attribute 是必要的'
        ];

        $validator=Validator::make($request->all(),[
            'cart_id'=>'required|integer',//必填與只能int型態
            'product_id'=>'required',
            'quantity'=>'required|integer|between:1,10'
        ],$messages);
        if($validator->fails()){
            return response($validator->errors(),400);
        }
        
        $validtedDate = $validator->validate();
        $product = Product::find($validtedDate['product_id']);
        if(!$product->checkQuantity($validtedDate['quantity'])){
            return response($product->title . '數量不足',400);
        }

        $cart   =   Cart::find($validtedDate['cart_id']);
        $result =   $cart->cartItems()->create(['product_id' => $product->id,
                                                'quantity' => $validtedDate['quantity']]);

        // DB::table('cart_items')->insert([
        //     'cart_id' => $validtedDate['cart_id'],
        //     'product_id' => $validtedDate['product_id'],
        //     'quantity' => $validtedDate['quantity'],
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(updateCartItem $request, string $id)
    {

        $form =$request->validated();
        $item = CartItem::find($id);
        $item->fill(['quantity'=>$form['quantity']]);
        $item->save();//update就不用save
    
        // DB::table('cart_items')->where('id',$id)
        //                         ->update([
        //                         'quantity' => $form['quantity'],
        //                         'updated_at' => now()]);
        return response()->json($item);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {

        CartItem::find($id)->delete(); //forecDelete()跳過model直接刪除DB
        return response()->json(true);
    }
}
