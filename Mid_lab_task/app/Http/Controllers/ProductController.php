<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

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
        $category = Category::all();
        return \view('superadmin.productmodule.addProduct',compact('category',$category));
    }

    public function editExistingProduct($id)
    {
        $data = Product::find($id);
        $category = Category::all();
        return \view('superadmin.productmodule.editProduct',['data'=>$data,'category'=>$category]);
    }

    public function updateExistingProduct(Request $req)
    {
        $req->validate([
            'product_name' => 'required|min:5|max:30',
            'unit_prics' => 'required|min:3|max:50',
            'category_id' => 'required',
            'status' => 'required',
        ]);

        $value = Product::find($req->id);
        
        $value->product_name = $req->product_name;
        $value->unit_prics = $req->unit_prics;
        $value->category_id = $req->category_id;
        $value->quantity = $req->quantity;
        $value->status = $req->status;
        $value->vendor_id = $req->vendor_id;
        $value->save();
        return \redirect('system/product_management/existing_products')->with('success','Product added successfully');
    }
}
