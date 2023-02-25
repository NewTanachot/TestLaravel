<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Validator;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index() {

        $productName = Product::paginate(10);

        return view('product.index')->with('product', $productName);
    }

    public function AddProduct(Request $request)
    {
        // error_log('');
        // error_log(url()->current());
        // error_log('');

        $rules = [
            'name' => 'required|max:10',
            'price' => 'required',
            'detail' => 'required|max:10',
        ];
        $messages = [
            'name.required' => 'name is required.',
            'name.max' => 'name may not be greater than 50 characters.',
            'price' => 'price is required.',
            'detail.required' => 'detail is required.',
            'detail.max' => 'detail may not be greater than 50 characters.',
        ];

        // $validator = Validator::make($request->all(), $rules, $messages);
        // if ($validator->fails()) {
        //     // return response()
        //     //     ->json(['validator'=>$validator->messages(),'MessageType'=>'validate'], 404);

        //     return redirect()->back()->with('error', $messages);
        // }

        $request->validate($rules, $messages);

        // Eloquent ORM Method

        // $Product = new Product;

        // $Product->name = $request->name;
        // $Product->price = $request->price;
        // $Product->detail = $request->detail;

        // $Product->save();

        // Query Builder
        $Product = array();

        $Product['name'] = $request->name;
        $Product['price'] = $request->price;
        $Product['detail'] = $request->detail;
        $Product['created_at'] = now();
        $Product['updated_at'] = now();

        DB::table('products')->insert($Product);

        // return redirect()->action('ProductController@index');
        return redirect()->back()->with('success', 'Import Done!!');
    }

    public function DeleteProduct($id) {
        error_log($id);

        $Product = Product::find($id);
        $Product->delete();

        return redirect()->action('ProductController@index');
    }

    public function UpdateProduct(Request $request, $id) {

        error_log($id);
        error_log($request->name);
        error_log($request->price);
        error_log($request->detail);

        // Eloquent

        $Product = Product::find($id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'detail' => $request->detail
        ]);

        // Query Builder

        // $Product = Product::find($id);

        // $Product->name = $request->name;
        // $Product->price = $request->price;
        // $Product->detail = $request->detail;

        // $Product->save();

        return redirect()->action('ProductController@index');
    }

}
