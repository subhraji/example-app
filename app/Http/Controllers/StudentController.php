<?php

namespace App\Http\Controllers;

use App\Model\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class StudentController extends Controller
{

    public function signUp(Request $request){
        $request -> validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string|min:5'
        ]);

        $student = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $student -> save();
        return response()-> json(['message' => "registered successfully"] ,200);
    }


    public function login(Request $request){
        $request -> validate([
            'email' => 'required',
            'password' => 'required|string'
        ]);

        $credentials = request(['email','password']);

        if(!Auth::attempt($credentials)){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'data' => [],
            ],200);
        }else{
            return response()->json([
                'status' => true,
                'message' => 'Login successful',
                'data' => [
                    'user' => Auth::user(),
                    'token' => $request->user()->createToken('PersonalAccessToken'),
                    'token_type' => 'Bearer'
                ],
            ],200);
        }

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
