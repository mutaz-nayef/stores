<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $employees = Employee::all();
        return response()->view('cms.employees.index', [
            'employees' => $employees
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
            'email' => 'required|email|unique:employees,email',
            'password' => 'required|min:8',
            'phone' => 'required|min:10|unique:employees,phone',
            'salary' => 'required|',
            'job_title' => 'required|',
            'address' => 'nullable|min:3',
        ]);
        $request['password'] = Hash::make($request->input('password'));
        if (!$validator->fails()) {
            // if ($request->hasFile('image')) {
            //     $imageName = date("Y-m-d-h-i-s") . '_user_image.'  . $request->file('image')->getClientOriginalExtension();
            //     $request->file('image')->storePubliclyAs('images/users', $imageName);
            //     $imgPath = 'images/users/' . $imageName;
            // }
            $employee = Employee::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'phone' => $request->input('phone'),
                'salary' => $request->input('salary'),
                'job_title' => $request->input('job_title'),
                'address' => $request->input('address') ?: '',
            ]);

            // if ($user) {
            //     Mail::to($user)->send(new UserWelcomeEmail($user));
            // }
            $message = "Your operation was successful!";


            return response()->json([
                'message' => $employee ? 'Saved Successfully' : 'Save Failed',
                'employee' => $employee
            ], $employee ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
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
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|', // you shuold give the user id to exclude his email in unique condition
            'phone' => 'required|',
            'address' => 'nullable|min:3',
            'salary' => 'required|',
            'job_title' => 'required|',
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
            $updated =  $employee->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'salary' => $request->input('salary'),
                'job_title' => $request->input('job_title'),
                // 'image' => request()->file('image')->store('images')
                'address' =>  $request->input('address'),
            ]);
            return response()->json([
                'message' => $updated ? 'Updated Successfully' : 'Updated Failed',
                'employee' => $employee
            ], $employee ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
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
    public function destroy(Employee $employee)
    {
        $deleted = $employee->delete();

        return response()->json([
            'title' => $deleted ? 'Deleted!' : 'Deleted Failed',
            'text' => $deleted ? 'employee deleted successfully!' : 'employee deleting failed',
            'icon' => $deleted ? 'success' : 'error'
        ], $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
