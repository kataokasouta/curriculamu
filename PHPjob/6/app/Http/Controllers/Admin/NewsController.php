<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\post;
use App\User;

class NewsController extends Controller
{
 public function add(){
    return view ('admin.Post.create');
 }
 public function create(Request $request){

   $this->validate($request,post::$rules);
   $news = new post;
   $form = $request->all();
   unset($form['_token']);

   $news->fill($form);
   $news->save();
   return redirect('admin/Post/create');
 }
 public function index(Request $request){
  $user = User::all();
  $post = post::orderby('created_at','desc')->get();
  return view ('admin.Post.create',['posts'=>$post,'users'=>$user]);
 }
 public function delete(Request $request){
  $post = post::find($request->id);
  $post->delete();
  return redirect('admin/Post/create');
 }
}
