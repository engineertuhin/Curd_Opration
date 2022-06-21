<?php

namespace App\Http\Controllers;

use App\Models\userCreare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Image;

class UserCreareController extends Controller
{
    public function index(){
       $data= userCreare::all();
        return view('index',compact('data'));
    }
    public function userCreare(){
        return view('createUser');
    }
    public function userinsert(){
       request()->validate([
            'name'=> 'required',
            'email'=> 'required|email',
            'number'=> 'required|numeric|digits:11',
            'image'=> 'required|mimes:png,jpg|max:1024',
       ]);
       if(request()->hasFile('image')){
    $GetExtension=request('image')->getClientOriginalExtension();
    $GetName=request('image')->getClientOriginalName();
    $DublicateRemove=time().rand().$GetName;
    $Encripted=md5($DublicateRemove).'.'.$GetExtension;
 $send=userCreare::create([
'name' => request('name'),
'email' => request('email'),
'number' => request('number'),
'image' => $Encripted,
    ]);
    if($send==true){
    $image = Image::make(request('image')->getrealPath());
    $image->resize(300, 300);
    $image->save(public_path('image/'.$Encripted));
    Session::flash("success",'Data Insert successFull');
    return redirect('/');
    }

       }
    }
    public function userEdit($id){
        $get=userCreare::where('id',$id)->first();
        return view('edit',compact('get'));
    }
    public function updateUser($id){
        request()->validate([
            'name'=> 'required',
            'email'=> 'required|email',
            'number'=> 'required|numeric|digits:11',
            'newimage'=> 'mimes:png,jpg|max:1024',
       ]);
       if(empty(request('newimage'))){
      $image=request('oldimage');
       }else{
        if(request()->hasFile('newimage')){
            $GetExtension=request('newimage')->getClientOriginalExtension();
            $GetName=request('newimage')->getClientOriginalName();
            $DublicateRemove=time().rand().$GetName;
            $image=md5($DublicateRemove).'.'.$GetExtension;
               }
            }
          $object=userCreare::find($id);
          $object->name=request('name');
          $object->email=request('email');
          $object->number=request('number');
          $object->image=$image;
        $send=$object->save();

            if($send==true){
                if(!empty(request('newimage'))){
                    unlink('image/'.request('oldimage'));
                    $set = Image::make(request('newimage')->getrealPath());
                    $set->resize(300, 300);
                    $set->save(public_path('image/'.$image));
                }
                Session::flash("success",'Data Update successFull');
                return redirect()->back();
            }
      
    }
    public function deleteuser($id){
$delete= userCreare::find($id)->delete();
if($delete==true){
    unlink('image/'.request('image'));
    return redirect()->back();
}


    }
}
