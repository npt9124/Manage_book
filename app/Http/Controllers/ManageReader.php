<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Reader;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;

class ManageReader extends Controller
{
    public function all_reader()
    {
        $all_reader = Reader::all();
        return view('All_reader', compact('all_reader'));
    }

    public function create()
    {
        return view('Add_reader');
    }

    public function store(Request $request)
    {

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['gender'] = $request->gender ;
        $data['phone_number'] = $request->phone_number ;
        $data['total_num_books_borrowed'] = $request->total_num_books_borrowed ;
        $data['birthday'] = $request->birthday ;
        $data['status'] = $request->status ;

        DB::table('readers')->insert($data);
        Session::put('message','Add reader successful ');
        return Redirect::to('all-reader');

    }

    public function edit($reader_id)
    {
        $reader = Reader::findOrFail($reader_id);
        return view('edit_reader', compact('reader'));
    }


    public function update(Request $request, $reader_id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'gender' => 'required|string',
            'phone' => 'required|string',
            'total_num_books_borrowed'=> 'required|integer',
            'birthday' => 'required|date'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $reader = Reader::findOrFail($reader_id);
        $reader->name = $request->name;
        $reader->email = $request->email;
        $reader->address = $request->address;
        $reader->gender = $request->gender;
        $reader->phone = $request->phone;
        $reader->total_num_books_borrowed = $request->total_num_books_borrowed;
        $reader->birthday = $request->birthday;
        $reader->save();

        Session::put('message','Cập nhật thông tin thành công');
        return Redirect::route('all-reader');
    }

    public function destroy($reader_id)
    {
        $reader = Reader::findOrFail($reader_id);
        $reader->delete();

        Session::put('message','Xóa thông tin thành công');
        return Redirect::route('all-reader');
    }
}
