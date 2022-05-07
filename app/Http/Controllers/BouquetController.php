<?php

namespace App\Http\Controllers;

use App\Models\Bouquet;
use App\Models\Flower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BouquetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.bouquets');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.bouquet-make');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator_array = [
            'picture' => 'required|image|file',
            'name' => 'required',
            'description' => 'required',
            'price'=>'required|numeric|min:0',
            'flower'=>'distinct'
        ];
        $validator = Validator::make($request->all(), $validator_array);

        if($validator->fails()){
            return Redirect::route('pages.bouquet-make')->with([
                'error'=>true,
                'messages' => $validator->errors()->all()
            ]);
        }

        $data =  $validator->validated();

        $partial_path = $data['picture']->store('public/bouquets');
        $realpath = str_replace("public","/storage", $partial_path);

        $flowers = [];

        foreach ($data['flower'] as $key=>$value) {
            if($value > 0){
                $flowers+= [$key => $value];
            }
        }

        $b = new Bouquet([
            'name'=>$data['name'],
            'description'=>$data['description'],
            'picture' => $realpath,
            'flowers' => $flowers,
            'price'=>$data['price'],
        ]);
        $b->save();
        return \redirect('/bouquets/');
    }

    /**
     * Display the specified resource.
     *
     * @param  Bouquet $bouquet
     * @return \Illuminate\Http\Response
     */
    public function show(Bouquet $bouquet)
    {
        return view('pages.bouquet',  [
            'bouquet' =>  $bouquet
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bouquet $bouquet)
    {
        $bouquet->delete();
        return view('pages.bouquets');
    }
}
