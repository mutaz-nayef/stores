<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::all();
        return response()->view('cms.users.index', [
            'users' => $users,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'phone' => 'required|min:10|unique:users,phone',
            'address' => 'nullable|min:3',
        ]);
        $request['password'] = Hash::make($request->input('password'));
        if (!$validator->fails()) {
            // if ($request->hasFile('image')) {
            //     $imageName = date("Y-m-d-h-i-s") . '_user_image.'  . $request->file('image')->getClientOriginalExtension();
            //     $request->file('image')->storePubliclyAs('images/users', $imageName);
            //     $imgPath = 'images/users/' . $imageName;
            // }
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address') ?: '',
            ]);

            // if ($user) {
            //     Mail::to($user)->send(new UserWelcomeEmail($user));
            // }
            $message = "Your operation was successful!";


            return response()->json([
                'message' => $user ? 'Saved Successfully' : 'Save Failed',
                'user' => $user
            ], $user ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|', // you shuold give the user id to exclude his email in unique condition
            'phone' => 'required|string|min:10',
            'address' => 'nullable|min:3',
        ]);

        if (!$validator->fails()) {
            // if ($request->hasFile('image')) {
            //     // delete the previous image
            //     Storage::delete($user->image);
            //     // save new image 
            //     $imageName = Carbon::now()->format("Y-m-d-h-i-s") . '_user_image.'  . $request->file('image')->getClientOriginalExtension();
            //     $request->file('image')->storePubliclyAs('images/users', $imageName);
            //     $imgPath = 'images/users/' . $imageName;
            // } else {
            //     $imgPath = $user->image;
            // }
            $updated =  $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                // 'image' => request()->file('image')->store('images')
                'address' =>  $request->input('address'),
            ]);
            return response()->json([
                'message' => $updated ? 'Updated Successfully' : 'Updated Failed',
                'user' => $user
            ], $user ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $deleted = $user->delete();

        return response()->json([
            'title' => $deleted ? 'Deleted!' : 'Deleted Failed',
            'text' => $deleted ? 'user deleted successfully!' : 'user deleting failed',
            'icon' => $deleted ? 'success' : 'error'
        ], $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
