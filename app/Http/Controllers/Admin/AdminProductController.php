<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestProduct;
use App\Models\Category;
use App\Models\Product;


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

        return view('admin.product.create', compact('categories'));
    }

   public function store(AdminRequestProduct $request)
    {
        $data = $request->except('_token');
        $data['pro_slug']     = Str::slug($request->pro_name);
        $data['created_at']   = Carbon::now();

        $id = Product::insertGetId($data);

        return redirect()->back();
      
        // dd($data);
    }

}
