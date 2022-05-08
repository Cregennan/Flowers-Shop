<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{

    public function store(Request $request){
        $validator_array = [
            'name' => 'required',
            'text' => 'required',
            'rate' => 'required|numeric|min:1|max:5'
        ];
        $validator = Validator::make($request->all(), $validator_array);
        if($validator->fails()){
            return Redirect::route('pages.review')->with([
                'error'=>true,
                'messages' => $validator->errors()->all()
            ]);
        }
        $data = $validator->validated();

        $r = new Review([
            'name'=>$data['name'],
            'text'=>$data['text'],
            'rate'=>$data['rate']
        ]);
        $r->save();

        return Redirect::route('pages.main');

    }
}
