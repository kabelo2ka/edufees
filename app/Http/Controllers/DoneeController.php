<?php

namespace App\Http\Controllers;

use App\Donee;
use App\Http\Requests\DoneeRequest;
use App\User;
use Illuminate\Http\Request;

class DoneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donees = User::paginate(20);
        return view('donees.index', compact('donees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DoneeRequest|Request $request
     * @return \Illuminate\Http\Response
     * @throws \Symfony\Component\HttpFoundation\File\Exception\FileException
     */
    public function store(DoneeRequest $request)
    {

        // if the is a ID File uploaded
        if ($request->hasFile('id_file')) {
            $file = request()->file('id_file');
            $destination = public_path('uploads/ids');
            $filename = md5($file->getClientOriginalName() . microtime()) . '.' . $file->extension();
            $file->move($destination, $filename);
            $request->merge(['id_filename'=>$filename]);
        }
        // if the is a ID File uploaded
        if ($request->hasFile('matric_results_file')) {
            $file = request()->file('matric_results_file');
            $destination = public_path('uploads/matric_results');
            $filename = md5($file->getClientOriginalName() . microtime()) . '.' . $file->extension();
            $file->move($destination, $filename);
            $request->merge(['matric_results_filename'=>$filename]);
        }

        $donee = new Donee($request->all());
        $donee->user()->associate(auth()->user());
        $donee->save();
        flash('Account created, successfully.');
        return redirect(route('donees.show', ['donee' => auth()->user()->slug]));
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($slug)
    {
        $user = User::whereSlug($slug)->with('doneeProfile')->firstOrFail();
        return view('donees.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
