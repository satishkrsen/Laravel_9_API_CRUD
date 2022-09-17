<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apitest;
use Validator;


class ApitestController extends Controller
{
    public function store(Request $req)
    {
        $data = new Apitest;
        $data->name = $req->name;
        $data->email = $req->email;
        $result = $data->save();
        if($result){
            return ["Result"=>"data has been saved"];
        }
        else{
            return ["result" => "Something went worng"];
        }

    }

    public function getData()
    {
        return Apitest::all();
    }

    public function update(Request $req)
    {
        $data = Apitest::find($req->id);
        $data->name = $req->name;
        $data->email = $req->email;
        $result = $data->save();
        if($result){
            return ["Result" => "Data has been updated successfully"];
        }
        else{
            return["Result" => " Something went wrong"];
        }

    }
    public function destroy($id)
    {
        $data = Apitest::find($id);
        $result = $data->delete();
        if($result){
            return["result"=>"Data has been deleted"];
        }
        else{
            return["Result"=>"Something went wrong"];
        }
    }

    public function search($name)
    {
        return Apitest::where("name","like","%".$name."%")->get();
    }

    public function testValidation(Request $req)
    {
        $rules= array(
            "name"=> "required | min:3 | max: 8",
            "email"=>"required"
        );
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails())
        {
            return $validator->errors();
        }
        else
        {
            $data = new Apitest;
            $data->name = $req->name;
            $data->email = $req->email;
            $result = $data->save();
           if($result){
               return ["Result"=>"data has been saved"];
            }
        else{
            return ["result" => "Something went worng"];
            }
        }
    }
}
