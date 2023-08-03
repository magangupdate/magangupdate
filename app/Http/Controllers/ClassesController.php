<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // validate the input
        $validation = Validator::make($request->all(), [
            'class_name' => 'required',
            'class_slug' => 'required',
            'description' => 'required',
            'volume' => 'required',
            'class_session_1' => 'required',
            'class_session_2' => 'required',
            'logo' => 'required|mimes:png,jpg,jpeg|max:10000',
        ]);

        // check validation
        if ($validation->fails()) {
            toast('Class is failed to added because there is error input!', 'error');
            dd($validation->messages());
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validation);
        }

        // prepare variables for file input

        $classLogoFile = $request->file('logo')->store('logo');

        try {
            Classes::create([
                'mentorID' => $request->mentorID,
                'class_name' => $request->class_name,
                'class_slug' => $request->class_slug,
                'description' => $request->description,
                'volume' => $request->volume,
                'class_session_1' => $request->class_session_1,
                'class_session_2' => $request->class_session_2,
                'logo' => $classLogoFile,
            ]);
        } catch (Exception $e) {
            dd($e);
            toast('Class is failed to added because there is internal server error!', 'error');
            return redirect()
                ->route('dashboard.mua.clasess')
                ->with(['error' => 'Class gagal ditambahkan!']);
        }

        toast('Class successfully added!', 'success');
        return redirect()
            ->route('dashboard.mua.classes')
            ->with(['success' => 'Class berhasil ditambahkan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // get id article
        $id = $request->id;

        // get article with id
        $class = Classes::where('classID', '=', $id)->first();

        // validate all input
        $validation = Validator::make($request->all(), [
            'class_name' => 'required',
            'description' => 'required',
            'volume' => 'required',
            'class_session_1' => 'required',
            'class_session_2' => 'required',
            'mentorID' => 'required',
        ]);

        // check validation
        if ($validation->fails()) {
            toast('Class is failed to added because there is error input!', 'error');
            dd($validation->messages());
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validation);
        }

        // check thumbnail old or not
        $logoClassFile = '';

        // check if there is no input file with name thumbnail
        if ($request->file('logo') !== null) {
            $logoClassFile = $request->file('logo')->store('logo');
            Storage::delete($class->logo);
        } else {
            $logoClassFile = $class->logo;
        }

        
        try {
            Classes::where('classID', $id)->update([
                'class_name' => $request->class_name,
                'class_slug' => $request->class_slug,
                'description' => $request->description,
                'volume' => $request->volume,
                'class_session_1' => $request->class_session_1,
                'class_session_2' => $request->class_session_2,
                'logo' => $logoClassFile,
                'mentorID' => $request->mentorID
            ]);
        } catch (Exception $e) {
            toast(
                "Internal server error.\nYour class fail to updated",
                'error'
            );
            return redirect()
            ->route('dashboard.mua.classes')
            ->with(['success' => 'Class successfully updated!']);
        }

        toast('Class successfully updated.', 'success');
        return redirect()
            ->route('dashboard.mua.classes')
            ->with(['success' => 'Class successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $class = Classes::where('classID', '=', $id);
        $logo = Classes::where('classID', '=', $id)->first()->logo;

        try {
            Storage::delete($logo);
            $class->delete();
        } catch (Exception $e) {
            dd($e);
            toast(
                "Internal server error.\nYour class fail to deleted",
                'error'
            );
            return redirect()
                ->route('dashboard.mua.classes')
                ->with(['error' => 'Blog gagal diupload!']);
        }
        toast('Class successfully deleted.', 'success');
        return redirect()
            ->route('dashboard.mua.classes')
            ->with(['success' => 'Class successfully deleted!']);
    }
}
