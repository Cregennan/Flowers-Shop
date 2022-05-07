<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class FlowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.flowers');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.flower-make');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price'=> 'required|numeric|min:0',
            'description'=>'required',
            'picture' => 'required|image|file',
        ]);

        if($validator->fails()){
            return Redirect::route('pages.flower-make')->with([
                'error'=>true,
                'messages' => $validator->errors()->all()
            ]);
        }

        $data =  $validator->validated();

        $partial_path = $data['picture']->store('public/flowers');
        $realpath = str_replace("public","/storage", $partial_path);

        $f = new Flower([
            'name'=>$data['name'],
            'description'=>$data['description'],
            'picture' => $realpath,
            'price'=>$data['price'],
        ]);
        $f->save();
        return \redirect('/flowers/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flower  $flower
     * @return \Illuminate\Http\Response
     */
    public function show(Flower $flower)
    {
        return view('pages.flower', [
            'flower'=>$flower
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Flower  $flower
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flower $flower)
    {
        //
    }
}
