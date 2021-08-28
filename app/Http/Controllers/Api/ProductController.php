<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class ProductController extends BaseController
{
    public function getItems()
    {
        $item = Product::all();
        return $item;
    }

    public function postItem(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required'
        ]);

        $item = Product::create($request->all());
        return $item;
    }

    public function putItem(Request $request, $id)
    {
        $item = Product::find($id);
        $item->update($request->all());
        return $item;
    }

    public function deleteItem($id)
    {
        try {
            $item = Product::find($id);
            $item->delete();
            return "success";
        } catch (\Exception $e) {
            return "false";
        }
    }
}
