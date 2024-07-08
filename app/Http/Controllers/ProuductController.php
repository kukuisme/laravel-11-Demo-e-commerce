<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;

class ProuductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->getData();
        dump($data);
        return response($data);
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
            $data= $this -> getData();
            $newdata = $request->all();
            $data->push($newdata);
            dump($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       

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
        //更新參數方法
        $form = $request->all();
        $data  = $this->getData();
        $selectData = $data->where('id',$id)->first();
        $selectData = $selectData->merge(collect($form));  
        return response($selectData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->getData();
        $data = $data->filter(function($prouduct) use($id){
                return $prouduct['id']!= $id;
        });
        return response($data->values());

    }
    public function getData()
    {
        return collect([
            collect([
                'id'=>0,
                'title'=>'測試商品一',
                'content'=>'很棒的商品',
                'price'=>50
            ]),
            collect([
                'id'=>1,
                'title'=>'測試商品二',
                'content'=>'很讚的商品',
                'price'=>30
            ]),
        ]);
    }

}
