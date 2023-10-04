<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Samik\LaravelAdmin\Http\Controllers\AdminModelController;

class NewsLetterController extends AdminModelController
{
    public function index(Request $request){
        $validated = $request->validate([
            'email' => 'required|unique:news_letters|email',
        ]);

        if($validated){
            $newsletter = new \App\Models\NewsLetter;
            $newsletter->email = $validated['email'];

            if($newsletter->save()){
                return response()->json([
                    'message' => "Thank you for Subscribe...",
                ]);
            }else{
                return response()->json([
                    'err' => "Somthing Went Wrong...",
                ]);
            }
        }
    }
}