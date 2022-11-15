<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MeatPackageRequest;
use App\Models\MeatPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class MeatPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = MeatPackage::all();
        

        return view('pages.admin.meat-package.index',[
            'items' =>$items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.meat-package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MeatPackageRequest $request)
    {
        // $data = $request->all();
        // $data['slug'] = Str::slug($request->title);

        // MeatPackage::create($data);
        
        // return redirect()->route('meat-package.index');

        $response = Http::asform()->post('http://127.0.0.1:8080/api/meat_packages/', [
            'title' => $request->input('title'),
            // 'slug' => $request->input('slug'),
            'type' => $request->input('type'),
            'stock' => $request->input('stock'),
            'about' => $request->input('about'),
            'price' => $request->input('price')
            // $data['slug'] = Str::slug($request->title);
        ]);
        $response = $response->object();
        return redirect()->route('meat-package.index', [
            'item' => $response->data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = MeatPackage::findOrFail($id);

        return view('pages.admin.meat-package.edit', [
            'item' => $item
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $data = $request->all();
        // $data['slug'] = Str::slug($request->title);

        // $item = MeatPackage::findOrFail($id);

        // $item->update($data);
        // return redirect()->route('meat-package.index');

        $response = Http::asForm()->post("http://127.0.0.1:8080/api/meat_packages/" . $id . '?_method=PUT', [
            'title' => $request->input('title'),
            'type' => $request->input('type'),
            'stock' => $request->input('stock'),
            'about' => $request->input('about'),
            'price' => $request->input('price'),
            // $data['slug'] = Str::slug($request->title);
        ]);
        $response = $response->object();
        return redirect()->route('meat-package.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $item = MeatPackage::findOrFail($id);
        // $item->delete();

        Http::asForm()->delete("http://127.0.0.1:8080/api/meat_packages/".$id);
        return redirect()->route('meat-package.index');
    }
}
