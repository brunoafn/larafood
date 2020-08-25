<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private $repository;

    public function __construct(Product $Product)
    {
        $this->repository = $Product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->repository->latest()->paginate();

        return view('admin.pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateProduct  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();

        $company = auth()->user()->company;

        if($request->hasFile('image') && $request->image->isValid()){
            $data['image'] = $request->image->store("companies/{$company->uuid}/products");
        }

        $this->repository->create($data);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$product = $this->repository->find($id)){
            return redirect()->back();
        }
        return view('admin.pages.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$product = $this->repository->find($id)){
            return redirect()->back();
        }

        return view('admin.pages.products.edit', compact('product'));

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
        if(!$product = $this->repository->find($id)){
            return redirect()->back();
        }

        $data = $request->all();

        $company = auth()->user()->company;

        if($request->hasFile('image') && $request->image->isValid()){

            if(Storage::exists($product->image)){
                Storage::delete($product->image);
            }

            $data['image'] = $request->image->store("companies/{$company->uuid}/products");
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success','Categoria atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$product = $this->repository->find($id)){
            return redirect()->back();
        }

        if(Storage::exists($product->image)){
            Storage::delete($product->image);
        }

        $product->delete();

        // Flash::message('error', 'Categoria deletada com sucesso!');
        return redirect()->route('products.index')->with('error','You have no permission for this page!');
    }

    public function search(Request $request){

        $filters = $request->only('filter');

        $products = $this->repository->where(function($query) use ($request){
            if($request->filter){
                $query->where('title', $request->filter)->orwhere('description', 'LIKE', "%{$request->filter}%");
            }

        })->latest()->paginate();


        return view('admin.pages.products.index', ['products' => $products, 'filters' => $filters]);

    }
}
