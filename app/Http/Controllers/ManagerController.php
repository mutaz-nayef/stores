<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Manager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $managers = Manager::all();
        return response()->view('cms.managers.index', [
            'managers' => $managers
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
            'email' => 'required|email|unique:managers,email',
            'password' => 'required|min:8',
            'phone' => 'required|min:10|unique:managers,phone',
            'address' => 'nullable|min:3',
        ]);
        $request['password'] = Hash::make($request->input('password'));
        if (!$validator->fails()) {
            // if ($request->hasFile('image')) {
            //     $imageName = date("Y-m-d-h-i-s") . '_user_image.'  . $request->file('image')->getClientOriginalExtension();
            //     $request->file('image')->storePubliclyAs('images/users', $imageName);
            //     $imgPath = 'images/users/' . $imageName;
            // }
            $manager = Manager::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address') ?: '',
            ]);

            // if ($user) {
            //     Mail::to($user)->send(new UserWelcomeEmail($user));
            // }


            return response()->json([
                'message' => $manager ? 'Saved Successfully' : 'Save Failed',
                'manager' => $manager
            ], $manager ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
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
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manager $manager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Manager $manager)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:managers,email,' . $manager->id,
            'phone' => 'required|unique:managers,phone,' . $manager->id,
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
            $updated =  $manager->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                // 'image' => request()->file('image')->store('images')
                'address' =>  $request->input('address'),
            ]);
            return response()->json([
                'message' => $updated ? 'Updated Successfully' : 'Updated Failed',
                'manager' => $manager
            ], $manager ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
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
    public function destroy(Manager $manager)
    {
        $deleted = $manager->delete();

        return response()->json([
            'title' => $deleted ? 'Deleted!' : 'Deleted Failed',
            'text' => $deleted ? 'employee deleted successfully!' : 'employee deleting failed',
            'icon' => $deleted ? 'success' : 'error'
        ], $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
