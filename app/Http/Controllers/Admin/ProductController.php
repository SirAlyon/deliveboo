<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response    
     */
    public function index()
    {
        //$products = Product::orderByDesc('id')->get();
        $products = Product::where('user_id','=', Auth::id())->orderByDesc('id')->get();
        //dd($products);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, Product $product)
    {
        //dd($request->all());

        $val_data = $request->validated();

        if($request->has('visibility')){

            $val_data['visibility'] = 0;
        }
        //dd($val_data);
        //Verifico se la richiesta contiene dei file
        if($request->hasFile('image')){ //ddd($request->hasFile('cover_image'))  == ALTRA VERSIONE CON API DI LARAVEL

            //Valido il file
            $request->validate([
                'image' => 'nullable|image|max:250'
            ]);

            //Salvo il file nel filesystem
            //ddd($request->all());
            $path = Storage::put('product_images', $request->image);

            //passo il percorso all'array di dati valiati per il salvataggio della risorsa
            $val_data['image'] = $path;
        }

        $val_data['user_id'] = Auth::id();
        //dd($val_data);
        Product::create($val_data);

        return redirect()->route('admin.products.index')->with('message','Product Created Successfully!');
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, User $user)
    {
        if ($user->can('view', $product)) {
            return view('admin.products.show', compact('product'));

            
          } else {
            return Redirect::to('/admin');
          }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, User $user)
    {
        if ($user->can('update', $product)) {
            return view('admin.products.edit', compact('product'));

          } else {
            return Redirect::to('/admin');
          }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //dd($request->all());

        //$val_data = $request->validated();

        $val_data = $request->validate([
            'name' => ['required', Rule::unique('products')->ignore($product), 'max:50'],
            'price' => ['required', 'numeric', 'between:0,999.99'],
            'image' => ['nullable'],
            'description' => ['nullable']

        ]);
        //dd($val_data);

        if($request->hasFile('image')){ //ddd($request->hasFile('image'))  == ALTRA VERSIONE CON API DI LARAVEL

            //Valido il file
            $request->validate([
                'image' => 'nullable|image|max:250'
            ]);
            //Salvo il file nel filesystem
            Storage::delete($product->image);
            //ddd($request->all());
            $path = Storage::put('product_images', $request->image);

            //recupero il percorso

            //passo il percorso all'array di dati valiati per il salvataggio della risorsa
            $val_data['image'] = $path;
        }

        $product->update($val_data);
        return redirect()->route('admin.products.index')->with('message',"$product->name Updated Successfully!");

        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('message', "$product->name deleted successfully");
    }
}
