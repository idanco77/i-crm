<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class CrudController extends Controller {

    public function index(Request $request) {
        $request->session()->put('search', $request->has('search') ? $request->get('search') : ($request->session()->has('search') ? $request->session()->get('search') : ''));
        $request->session()->put('gender', $request->has('gender') ? $request->get('gender') : ($request->session()->has('gender') ? $request->session()->get('gender') : -1));
        $request->session()->put('field', $request->has('field') ? $request->get('field') : ($request->session()->has('field') ? $request->session()->get('field') : 'created_at'));
        $request->session()->put('sort', $request->has('sort') ? $request->get('sort') : ($request->session()->has('sort') ? $request->session()->get('sort') : 'desc'));
        $customers = new Customer();
        if ($request->session()->get('gender') != -1)
            $customers = $customers->where('gender', $request->session()->get('gender'));
        $customers = $customers->where('name', 'like', '%' . $request->session()->get('search') . '%')
                ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
                ->paginate(5);
        if ($request->ajax())
            return view('crud.index', compact('customers'));
        else
            return view('crud.ajax', compact('customers'));
    }

    public function create(Request $request) {
        $item_id = !empty($request['item_id']) ? ',' . $request['item_id'] : '';

        if ($request->isMethod('get'))
            return view('crud.form');
        else {
            $rules = [
                'name' => 'required|min:2|max:70',
                'user_name' => 'required|min:2|max:70',
                'password' => 'required|min:2|max:70',
                'email' => 'required|email|unique:customers,email' . $item_id,
                'phone' => 'required|numeric',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                            'fail' => true,
                            'errors' => $validator->errors()
                ]);

            $customer = new Customer();
            $customer->name = $request->name;
            $customer->user_name = $request->user_name;
            $customer->password = $request->password;
            $customer->gender = $request->gender;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->save();

            return response()->json([
                        'fail' => false,
                        'redirect_url' => url('user-admins')
            ]);
        }
    }

    public function delete($id) {
        Customer::destroy($id);
        return redirect('/user-admins');
    }

    public function update(Request $request, $id) {


        if ($request->isMethod('get'))
            return view('crud.form', [
                'customer' => Customer::find($id),
                'item_id' => $id,
            ]);
        else {
            $rules = [
                'name' => 'required|min:2|max:70',
                'user_name' => 'required|min:2|max:70',
                'password' => 'required|min:6|max:70',
                'email' => 'required|email|unique:customers,email' . ',' . $id,
                'phone' => 'required|numeric',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                            'fail' => true,
                            'errors' => $validator->errors()
                ]);
            $customer = Customer::find($id);
            $customer->name = $request->name;
            $customer->user_name = $request->user_name;
            $customer->password = $request->password;
            $customer->gender = $request->gender;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->save();
            return response()->json([
                        'fail' => false,
                        'redirect_url' => url('user-admins')
            ]);
        }
    }

     public function contacts() {
        echo view('contacts');
    }
    
    public function views() {
        echo view('views');
    }

}
