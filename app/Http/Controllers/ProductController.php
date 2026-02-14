<?php


namespace App\Http\Controllers;

use App\Http\Requests\storeProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products =Product::query()
            ->orderByRaw('stock <= alert_threshold DESC')
            ->latest()
            ->paginate(15);

        return view('index',compact('products'));
    }
    public function search(Request $request){

        $search_term=$request->input('query');

        $products =Product::query()
            ->orderByRaw('stock <= alert_threshold DESC')
            ->latest();

        if($search_term){
            $products = $products->where('name','like','%'.$search_term.'%');
        }
            $products = $products->get();

        return view('partials.product_table',compact('products'));


    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeProductRequest $request)
    {
        $validated = $request->validated();

        Product::create($validated);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
