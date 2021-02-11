<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Session;
use App\User;
use App\post;
use App\Photo;
use \Crypt;
class bikesController extends Controller
{
    //
    function index(){
        
        $data= post::paginate('8');
        // dd($data);     
           return view('home',["data"=>$data]);
        // return view('home');
    }

    function list(){
        $data= post::where('user_id','=', Auth::user()->id)->get();
        // $data= Photo::where('post_id','=', Auth::user()->id)->get();
        // dd($data);
        return view('list',["data"=>$data]);
    }
    function add(Request $request){
        // return $req->input();
        // $post = new post;
        // $post->Name_model=$req->input('name');
        // $post->Description=$req->input('details');
        
        // $post->save();
        // $req->session()->flash('status','Restaurant entered successfully');
        // return redirect('list');

        // $input =$req->all();
        // if($file = $req->file('photo_id')){
        //    $name = time() . $file->getClientOriginalName();
        //    $file->move('images', $name);

        //    $photo= Photo::create(['file'=>$name]);
        //    $input['photo_id'] =$photo->id;
        // }

        // dd($id);
        $user = Auth::user();
       $post= new post();
       $input = $request->all();
       $post = $user->posts()->create($input);
       if($request->hasFile('photo_id')){
            $files = $request->file('photo_id');
            foreach($files as $file){
                $name = time().'-'.$file->getClientOriginalName();
                $name = str_replace(' ','-',$name);
                $file->move('images',$name);
                $post->photo()->create(['file'=>$name]);
            }
       }


        // if ($request->hasFile('photo_id')){
        //     $image_array = $request->file('photo_id');

        //     $array_len = count($image_array);

        //     for($i=0; $i<$array_len; $i++){
        //         $image = time() . $image_array[$i]->getClientOriginalName();
        //         // $image_ext =  $image_array[$i]->getClientExtension();

        //         // $new_image_name = rand(123456,999999).".".$image_ext;
        //         $image_array[$i]->move('images', $image);

        //         $photo = Photo::create(['file'=>$image,'post_id'=>$post]);
                // $post = post::find($id);
                // $post->photo()
                
        //     }
        // }
        $request->session()->flash('status','Data entered successfully');
        return redirect('list');
       
        // $post = new post;
        // $post->Name_model=$request->input('name');
        // $post->Description=$request->input('details');
        // $post->save();
        // $request->session()->flash('status','Data entered successfully');
        // return redirect('list');

       

    }

    function delete($id){
        
        $post= post::findorFail($id);
        $photo= Photo::findorfail($post->photo->post_id);
        // dd($photo);
        // unlink(public_path() . $post->photo->file);
        $img = '/images' .$post->photo->file;
        $path= str_replace('\\','/',public_path());
        // dd($path.$img);
        if(file_exists($path.$img)){
            unlink($path.$img);
            $post->delete();
            $photo->delete();
            Session::flash('status','Data has been deleted successfully');
            return redirect('list');
        }else{
            $post->delete();
            Session::flash('status','Data has been deleted successfully');
            return redirect('list');
        }
        // storage::delete('/storage/' . $post->photo->file);
    }
    function edit($id){
        $data= post::find($id);
       return view('edit',['data'=>$data]);
    }
    function details($id){
        $data= post::find($id);
        // $user= User::find('user_id');
       return view('details',['data'=>$data]);
    }
    
    function update(Request $request, $id){
        // return $req->input();
        // $post = post::find($req->id);
        // $post->Name_model=$req->input('name');
        // $post->Description=$req->input('email');
        // $post->address=$req->input('address');
        // $post->save();
        // $req->session()->flash('status','Product updated successfully');
        // return redirect('list');

        $post = post::findOrFail($id);
        $img = '/images' .$post->photo->file;
        $path= str_replace('\\','/',public_path());

        $input = $request->all();
        dd($input);
    //     $old= $request->old_photos;
    //     $user = Auth::user();
    //     if($request->hasFile('photo_id')){
    //         $files = $request->file('photo_id');
    //         // dd($input);
    //         foreach($files as $file){
    //             $name = time().'-'.$file->getClientOriginalName();
    //             $name = str_replace(' ','-',$name);
    //             $file->move('images',$name);
    //             $post->photo()->create(['file'=>$name]);
    //         }
    //    }
    //     // if($file = $request->file('photo_id')) {
    //     //     unlink($path.$img);
    //     //     // dd($old);
    //     //     // unlink(public_path() . $post->photo->file);
    //     //     $name = time() . $file->getClientOriginalName();

    //     //     $file->move('images', $name);

    //     //     $photo = Photo::create(['file'=>$name]);


    //     //     $input['photo_id'] = $photo->id;


    //     // } 
    //     Auth::user()->posts()->whereId($id)->first()->update($input);
    //      $request->session()->flash('status','Updated successfully');
    //     return redirect('list');
    }
    //    useless because of built-in auth
    function register(Request $req){
        // return $req->input();
        $user= new User;
        $user->name= $req->input('name');
        $user->email= $req->input('email');
        $user->password=Crypt::encrypt($req->input('password'));
        $user->contact= $req->input('contact');
        $user->save();
        $req->session()->put('user',$req->input('name'));
        return redirect('/');
    }
    function login(Request $req){
        $user= User::where('email',$req->input('email'))->get();
        if(Crypt::decrypt($user[0]->password)==$req->input('password'))
        {
            $req->session()->put('user', $user[0]->name);
            echo session()->get('user');
    //   return Crypt::decrypt($user[0]->password);
        return redirect('/');
        // echo $req->session()->get('user');
        }
        //  else if(Crypt::decrypt($user[0]->password)!=$req->input('password')){
        //     // <script> echo 'alert("wrong password");';</script>
        //     return redirect('/wrongdata');
        //       }
}
}
