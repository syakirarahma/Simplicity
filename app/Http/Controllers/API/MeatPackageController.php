<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MeatPackage;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\MeatPackageRequest;
use Illuminate\Support\Str;

class MeatPackageController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $title = $request->input('title');
        $slug = $request->input('slug');
        $type = $request->input('type');
        $about = $request->input('about');
        $price = $request->input('price');

        if($id)
        {
            $items = MeatPackage::with('galleries')->find($id);

            if($items)
                return ResponseFormatter::success($items,'Data produk berhasil diambil');
            else
                return ResponseFormatter::error(null,'Data produk tidak ada', 404);
        }


        if($slug)
        {
            $items = MeatPackage::with('galleries')
                ->where('slug', $slug)
                ->first();

            if($items)
                return ResponseFormatter::success($items,'Data produk berhasil diambil');
            else
                return ResponseFormatter::error(null,'Data produk tidak ada', 404);
        }

        $items = MeatPackage::with('galleries');

        if($title)
            $items->where('title', 'like', '%' . $title .'%');

        if($type)
            $items->where('type', 'like', '%' . $type .'%');

        return ResponseFormatter::success(
            $items->paginate($limit),
            'Data list produk berhasil diambil'
        );
    }

    public function create(Request $request)
    {
        try {
            $data = new MeatPackage;
            $data->title = $request->input('title');
            // $data->slug = $request->input('slug');
            $data->type = $request->input('type');
            $data->stock = $request->input('stock');
            $data->about = $request->input('about');
            $data->price = $request->input('price');
            $data['slug'] = Str::slug($request->title);
            // $data['image'] = $request->file('image')->store(
            //     'assets/gallery', 'public'
            // );
    
            $data->save();

        if($data)
        {

            if($data)
                return ResponseFormatter::success($data, 'Data Academy berhasil diambil');
            else
                return ResponseFormatter::error(null, 'Data Academy tidak ada', 404);
        }

        } catch (Exception $error) {
            return ResponseFormatter::error(null, 'Data Academy tidak ada', 404);
        }

    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $data = MeatPackage::find($id);
        $data->update($input);
        $data->slug =Str::slug($request->title);
        $data->save();
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Post Berhasil Diupdate!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post Gagal Diupdate!',
            ], 500);
    }
    }

    public function delete($id)
    {
            $item = MeatPackage::findOrFail($id)->delete();
            // $data->delete();
            

        if($item)
        {

            if($item)
                return ResponseFormatter::success($item, 'Data Academy berhasil diambil');
            else
                return ResponseFormatter::error(null, 'Data Academy tidak ada', 404);
        }

    }
}
