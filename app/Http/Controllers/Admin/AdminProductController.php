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
use App\Models\Keyword;

class AdminProductController extends Controller
{
    public function index(){
        $products = Product::with('category:id,c_name')
        ->paginate(10);

        $viewData = [
            'products' => $products
        ];
        return view('admin.product.index',$viewData);
    }

    public function create()
    {

        $categories = Category::all();

        $attributeOld  = [];

        $attributes = $this->syncAttributeGroup();
        $keywords = Keyword::all();

        return view('admin.product.create', compact('categories','attributeOld','attributes','keywords'));
    }

    public function store(AdminRequestProduct $request)
    {
        $data = $request->except('_token','pro_avatar','attribute');
        $data['pro_slug']     = Str::slug($request->pro_name);
        $data['created_at']   = Carbon::now();

        if ($request->pro_avatar) {
            $image = upload_image('pro_avatar');
            if ($image['code'] == 1)
                $data['pro_avatar'] = $image['name'];
        }

        $id = Product::insertGetId($data);

        if ($id) {
            $this->syncAttribute($request->attribute, $id);

        }

        return redirect()->back();
    }
    public function edit($id)
    {
        $categories = Category::all();
        $attributes = $this->syncAttributeGroup();

        $product = Product::findOrFail($id);
        $keywords = Keyword::all();

        $attributeOld = \DB::table('products_attributes')
        ->where('pa_product_id',$id)
        ->pluck('pa_attribute_id')
        ->toArray();

        if(!$attributeOld) $attributeOld = [];
        return view('admin.product.update', compact('categories','product','attributes','attributeOld','keywords'));
    }

    public function update(AdminRequestProduct $request, $id)
    {
        $product           = Product::find($id);
        $data               = $request->except('_token','pro_avatar','attribute');
        $data['pro_slug']     = Str::slug($request->pro_name);
        $data['updated_at'] = Carbon::now();

        if ($request->pro_avatar) {
            $image = upload_image('pro_avatar');
            if ($image['code'] == 1)
                $data['pro_avatar'] = $image['name'];
        }

        $update = $product->update($data);
        if ($update){
            $this->syncAttribute($request->attribute, $id);

        }


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

    protected function syncAttribute($attributes , $idProduct)
    {
        if (!empty($attributes)) {
            $datas = [];
            foreach ($attributes as $key => $value) {
                $datas[] = [
                    'pa_product_id'   => $idProduct,
                    'pa_attribute_id' => $value
                ];
            }
            if (!empty($datas)) {
                \DB::table('products_attributes')->where('pa_product_id', $idProduct)->delete();
                \DB::table('products_attributes')->insert($datas);
            }
        }
    }

    public function syncAttributeGroup()
    {
        $attributes     = Attribute::get();
        $groupAttribute = [];

        foreach ($attributes as $key => $attribute) {
            $key = $attribute->gettype($attribute->atb_type)['name'];
            $groupAttribute[$key][] = $attribute->toArray();
        }

        return $groupAttribute;
    }









}
