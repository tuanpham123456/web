<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestProduct;
use App\Models\Category;
use App\Models\Product;
use App\Models\Attribute;

class AdminProductController extends Controller
{
    public function index(){
        $products = Product::paginate(10);

        $viewData = [
            'products' => $products
        ];
        return view('admin.product.index',$viewData);
    }

    public function create()
    {   
      
        $categories = Category::all();
            $attributes = Attribute::orderByDesc('atb_type')
            ->get();

        return view('admin.product.create', compact('categories','attributes'));
    }

    public function store(AdminRequestProduct $request)
    {
        $data = $request->except('_token','pro_avatar');
        $data['pro_slug']     = Str::slug($request->pro_name);
        $data['created_at']   = Carbon::now();

        if ($request->pro_avatar) {
            $image = upload_image('pro_avatar');
            if ($image['code'] == 1) 
                $data['pro_avatar'] = $image['name'];
        } 

        $id = Product::insertGetId($data);

        return redirect()->back();
    }
    public function edit($id) 
    {
        $categories = Category::all();
        $attributes = Attribute::orderByDesc('atb_type')
        ->get();
        $product = Product::findOrFail($id);
        return view('admin.product.update', compact('categories','product','attributes'));
    }
    
    public function update(AdminRequestProduct $request, $id)
    {
        $product           = Product::find($id);
        $data               = $request->except('_token','pro_avatar');
        $data['pro_slug']     = Str::slug($request->pro_name);
        $data['updated_at'] = Carbon::now();

        if ($request->pro_avatar) {
            $image = upload_image('pro_avatar');
            if ($image['code'] == 1) 
                $data['pro_avatar'] = $image['name'];
        } 

        $product->update($data);
        return redirect()->back();
    }
    public function hot($id){
        $product = Product::find($id);

        $product ->pro_hot = ! $product->pro_hot;
        $product->save();
        return redirect()->back();

    }
    public function active($id){
        $product = Product::find($id);

        $product ->pro_active = ! $product->pro_active;
        $product->save();
        return redirect()->back();
    }
    public function delete($id){
        $product = Product::find($id);

        if ($product) $product->delete();
        return redirect()->back();
    }

}
