<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $admins = Admin::all();
        return response()->view('cms.admins.index', [
            'admins' => $admins,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:8',
            'phone' => 'required|min:10|unique:admins,phone',
            'address' => 'nullable|min:3',
        ]);
        $request['password'] = Hash::make($request->input('password'));
        if (!$validator->fails()) {
            // if ($request->hasFile('image')) {
            //     $imageName = date("Y-m-d-h-i-s") . '_user_image.'  . $request->file('image')->getClientOriginalExtension();
            //     $request->file('image')->storePubliclyAs('images/users', $imageName);
            //     $imgPath = 'images/users/' . $imageName;
            // }
            $admin = Admin::create([
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
                'message' => $admin ? 'Saved Successfully' : 'Save Failed',
                'admin' => $admin
            ], $admin ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
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
    public function show(Admin $admin): Response
    {
        return response()->view('');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin): Response
    {
        return response()->view('');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'phone' => 'required|unique:admins,phone,' . $admin->id,
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
            $updated =  $admin->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                // 'image' => request()->file('image')->store('images')
                'address' =>  $request->input('address'),
            ]);
            return response()->json([
                'message' => $updated ? 'Updated Successfully' : 'Updated Failed',
                'admin' => $admin
            ], $admin ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
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
    public function destroy(Admin $admin)
    {
        $deleted = $admin->delete();

        return response()->json([
            'title' => $deleted ? 'Deleted!' : 'Deleted Failed',
            'text' => $deleted ? 'user deleted successfully!' : 'user deleting failed',
            'icon' => $deleted ? 'success' : 'error'
        ], $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
