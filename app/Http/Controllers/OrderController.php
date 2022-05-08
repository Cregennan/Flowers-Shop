<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function create(){
        return view('pages.order-make');
    }

    public function store(Request $request){
        $validator_array = [
            'phone' => ['required', new PhoneNumber],
            'name' => 'required',
            'is_custom' => 'required',
            'flower'=>'required|distinct',
            'bouquet' => 'required',
        ];
        $validator = Validator::make($request->all(), $validator_array);
        if($validator->fails()){
            return Redirect::route('pages.order-make')->with([
                'error'=>true,
                'messages' => $validator->errors()->all()
            ]);
        }

        $data = $validator->validated();
        $is_custom = $data['is_custom'] == 'on';

        $flowers = [];
        if($is_custom){
            foreach ($data['flower'] as $key=>$value) {
                if($value > 0){
                    $flowers+= [$key => $value];
                }
            }
        }

        $order = new Order([
            'client_name'=> $data['name'],
            'client_phone'=>$data['phone'],
            'is_custom'=>$is_custom,
            'bouquet'=>$data['bouquet'],
            'custom_data'=>$flowers,
        ]);
        $order->save();

        return Redirect::route('pages.order-make')->with([
            'status'=>'success'
        ]);
    }

    public function index(){
        return view('pages.orders');
    }

    public function  show(Order $order){
        return view('pages.order', [
            'order' => $order
        ]);
    }

    public function destroy(Order $order){
        $order->delete();
        return Redirect::route('pages.orders');
    }
}
