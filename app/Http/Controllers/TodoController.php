<?php

namespace App\Http\Controllers;

use App\Models\addtodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TodoController extends Controller
{

/*Index controller start */
   public function index(){
    return view('index');
   }

/*Index controller End */

/*AllTodo controller start */
   public function alltodo(){

      $alltodos = addtodo::latest()->paginate(5);
      return view('alltodo', compact('alltodos'));
     }
/*AllTodo controller end */

/*AddTodo controller start */

     public function addtodo(){
      return view('addtodo');
     }

/*AddTodo controller end */


/*Insert controller start */
     public function insert(Request $request){

         $request->validate([

            'title'=>'required|max:30',
            'details'=>'required|max:100',
            'image'=>'required|image|max:2048'

         ]);

      $imageName = Str::uuid()->toString().'.'.$request->image->getClientOriginalExtension();
      $request->image->storeAs('image', $imageName, 'public');

      $insert = new addtodo();
      $insert->title = $request->title;
      $insert->details = $request->details;
      $insert->image = $imageName;
      $insert->save();

      return redirect()->route('addtodo')->with('success', 'successfully added!');
     }

     /*Insert controller end */

 /*Edit controller start */
     public function edit($id){
      $singleData = addtodo::find($id);
      return view('edit',compact('singleData'));
     }
/*Edit controller End */

/*update controller start */

     public function update(Request $request, $id){

      $request->validate([

         'title'=>'required|max:30',
         'details'=>'required|max:100',
         'image'=>'image|max:2048'

      ]);

      $data = addtodo::find($id);

      if($request->hasFile('image')){
         Storage::delete('public/image/'.$data->image);
         $imageName = Str::uuid()->toString().'.'.$request->image->getClientOriginalExtension();
         $request->image->storeAs('image', $imageName, 'public');

         $data->title = $request->title;
         $data->details = $request->details;
         $data->image = $imageName;

         $data->save();
         return back()->with('success', 'Data Update Successfuly');
      }else{
         $data->title = $request->title;
         $data->details = $request->details;
         $data->save();
         return back()->with('success', 'Data Update Successfuly');
      }

     }
/*update controller end */


/*update controller start */
     public function delete($id){
         $deletedata = addtodo::findOrFail($id);
         Storage::delete('public/image/'.$deletedata->image);
         $deletedata->delete();
         return back();
     }
/*update controller end */
    
}
