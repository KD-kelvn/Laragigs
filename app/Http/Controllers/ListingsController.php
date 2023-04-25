<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingsController extends Controller
{
    //show all the listings
    public function index(){
        return view('Listings.index', [
            'news'=>Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
          ]);
    }
    // show a single listing
    public function show(Listing $Listing){
        return view('Listings.Show', [
            'data'=>$Listing,
          ]);
    }

    public function create(){
        return view('Listings.create');
    }

    public function store(Request $request){
      
       $formFields = $request->validate([
        'title'=> 'required',
        'description'=>'required',
        'company'=> ['required', Rule::unique('Listings', 'Company')],
        'website'=> 'required',
        'location'=> 'required',
        'email'=> ['required', 'email'],
        'tags'=> 'required',
       ]);

       if($request->hasFile('logo')){
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
       }

       $formFields['user_id'] = auth()->id();

       $title= $request->title;
       $message = $title." "."Gig created successfully ";

       Listing::create($formFields);
       return redirect('/')->with('message', $message);
    }

    public function edit(Listing $listing){
        return view('listings.edit' , ['listing'=>$listing]);
    }

   public function update(Request $request, Listing $listing){
    if($listing->user_id !== auth()->id()){
        abort('403', 'Unauthorized action');
    }
    $formFields = $request->validate([
        'title'=> 'required',
        'description'=>'required',
        'company'=> 'required',
        'website'=> 'required',
        'location'=> 'required',
        'email'=> ['required', 'email'],
        'tags'=> 'required',
       ]);

       if($request->hasFile('logo')){
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
       }

      

       $title= $request->title;
       $message = $title." "."Gig updated successfully ";

       $listing->update($formFields);
       return back()->with('message', $message);
   }

   public function destroy(Listing $listing){
    if($listing->user_id !== auth()->id()){
        abort('403', 'Unauthorized action');
    }
    $title = $listing->Title;
    $msg = $title." "."gig deleted successfully";
    $listing->delete();
    return redirect('/')->with('message', $msg);
   }

   public function register(){
    return view('Users.register');
   }

   public function manage(){
    $user = auth()->user();
    $userData = $user->listings()->get();
    // dd($userData)
    return view('Listings.manage', ['listings'=> $userData]);
   }
}


