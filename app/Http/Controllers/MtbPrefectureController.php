<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MtbPrefecture;

class MtbPrefectureController extends Controller
{
    public function index(Request $request){
      $items=MtbPrefecture::all();
      return view('mtb_prefectures.index',['items'=>$items]);
    }

    public function getdata(){

      return $this->id.': '.$this->value.'('.$this->rank.')';
    }

    public function find(){
      return view('mtb_prefectures.find',['id'=>'']);
    }

    public function search(Request $request){
      $items=MtbPrefecture::where('id','>',$request->id)->get();
      return view('mtb_prefectures.find',['items'=>$items,'id'=>$request->id]);
    }

    public function add(){
      return view('mtb_prefectures.add');
    }

    public function create(Request $request){
      $this->validate($request,MtbPrefecture::$rules);
      $prefecture=new MtbPrefecture;
      $form=$request->all();
      unset($form['__token']);
      $prefecture->fill($form);
      unset($prefecture->timestamps);
      $prefecture->save();
      return redirect('/prefecture');
    }

    public function edit(Request $request){
      $prefecture=MtbPrefecture::find($request->id);
      return view('mtb_prefectures.edit',['form'=>$prefecture]);
    }

    public function update(Request $request){
      $this->validate($request,MtbPrefecture::$rules);
      $prefecture=MtbPrefecture::find($request->id);
      $form=$request->all();
      unset($form['__token']);
      $prefecture->fill($form);
      unset($prefecture->timestamps);
      $prefecture->save();
      return redirect('/prefecture');
    }

    public function delete(Request $request){
    $prefecture=MtbPrefecture::find($request->id);
    $prefecture->delete();
    return redirect('/prefecture');
    }




}
