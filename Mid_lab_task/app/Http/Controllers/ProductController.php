<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function manage()
    {
        $data = Product::where('status','=','existing')->get();
        $data1 = Product::where('status','=','existing')->get();
       return \view('superadmin.productmodule.manage',['data'=>$data,'data1'=>$data1]);
    }
    public function existingProducts()
    {
        $data = Product::where('status','=','existing')->get();
        return \view('superadmin.productmodule.existingProducts')->with('existingpro',$data);
    }
    public function upcomingProducts()
    {
        $data = Product::where('status','=','existing')->get();
        return \view('superadmin.productmodule.upcomingProducts')->with('upcomingpro',$data);
    }
    public function addProducts()
    {
        return \view('superadmin.productmodule.addProduct');
    }

    public function editExistingProduct($id)
    {
        $data = Product::where('id','=',$id)->get();
        return \view('superadmin.productmodule.addProduct',\compact('data',$data));
    }
}
