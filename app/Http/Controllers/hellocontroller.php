<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class hellocontroller extends Controller
{
  function index(Request $request,Response $response) {

    $html="request:<pre>".$request."</pre><br>response:<pre>".$response."</pre><br>";
    $response->setContent($html);
    return $response;


    // $response->setContent(1);
    // return $response->status()."<br>".$response->content()."<br>".
    //         $request->url()."<br>".$request->fullurl()."<br>".$request->path()."<br>";

    }

  function form(){
    $data=['msg'=>'名前を入力してください。';
    return view('hello.form',$data);
  }

  function post(Request $request){
    $msg=$request->msg;
    $data=['msg'=>'welcome,'.$msg];
    return view('hello.form',$data);
  }



}
