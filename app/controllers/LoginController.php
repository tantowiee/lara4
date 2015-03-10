<?php

class LoginController extends \BaseController {

	/**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $input = Input::all();
        $credentials = array(
                            'username' => $input['username'],
                            'password' => $input['password']
                            );
            if (Auth::attempt($credentials, true)) {
                return Redirect::to('/');
            }
            return Redirect::to('/')->withErrors('Login Gagal');
 
    }
 
    public function register(){
        $input = Input::all();
 
        $validator = Validator::make($input, User::$rules);
        if($validator->fails()){
            return Redirect::to('/')->withErrors($validator);
        }else{
            $user = new User();
            $simpan = $user->register($input);
            if($simpan == true){
                return Redirect::to('/');
            }else{
                return Redirect::to('/')->withErrors('Email Sudah Ada');
            }
        }
    }
 
    public function logout(){
        $id = Auth::user()->id_user;
        Auth::logout($id);
 
        return Redirect::to('/');
    }


}
