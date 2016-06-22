<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Ads;
use Illuminate\Support\Facades\Input;
use Validator;



class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $ads=  Ads::all();
        $sorted=$ads->sortByDesc('updated_at');
      //  $sorted->values()->all(); 
        
        return response()->json($sorted,200) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
     $rules = array(
            'title'=>'required|min:3|max:257',
            'description'=>'required|min:10|max:3501',
            'location'=>'required|min:3|max:257',
            'price'=>'required|integer',
            'username'=>'required|min:3|max:257',
            'useremail'=>'required|min:3|max:257',
            'userphone'=>'required|integer'
        );
   //    $validator = Validator::make($request->all(), $rules); 
        $validator = Validator::make(Input::all(), $rules); 

        if ($validator->fails()) {
              return response()->json("error savinggg",500);
        } else {
            // store
            $ads = new Ads;        
            $ads->title       = Input::get('title');
            $ads->description = Input::get('description');
            $ads->location    = Input::get('location');
            $ads->price       = Input::get('price');
            $ads->username    = Input::get('username');
            $ads->useremail   = Input::get('useremail');
            $ads->userphone   = Input::get('userphone');
            $ads->save();

             return response()->json("success",201);
        }
    }
 
       
       
	
 
       // var_dump($request->input('a'));
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $ads=Ads::find($id);
	if(is_null($ads))
	{
             return response()->json("not found",404);
	    
	}
 
	return response()->json($ads,200);
        /*    return response()->json(
            [
                'title' => 'title 1',
                'description' => 'description 1'
            ]);*/
            
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
     public function update(Request $request, $id)
    {
       
  $rules = array(
           'title'=>'required|min:3|max:257',
            'description'=>'required|min:10|max:3501',
            'location'=>'required|min:3|max:257',
            'price'=>'required|integer',
            'username'=>'required|min:3|max:257',
            'useremail'=>'required|min:3|max:257',
            'userphone'=>'required|integer'
        );
       $validator = Validator::make(Input::all(), $rules); 

        if ($validator->fails()) {
              return response()->json("error savinggg",500);
        } else {
            // store
            $ads = Ads::find($id);
            $ads->title       = Input::get('title');
            $ads->description = Input::get('description');
            $ads->location    = Input::get('location');
            $ads->price       = Input::get('price');
            $ads->username    = Input::get('username');
            $ads->useremail   = Input::get('useremail');
            $ads->userphone   = Input::get('userphone');
            $ads->save();

             return response()->json("success",201);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
       $ads=Ads::find($id);
	if(is_null($ads))
	{
		return response()->json("not found",404);
	}
 
	$success=$ads->delete();
 
	if(!$success)
	{
		return response()->json("error deleting",500);
	}
 
	return response()->json("success",200);
    }
}
