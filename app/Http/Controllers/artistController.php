<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\artist;

class artistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = artist::all();
        return view('artist.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artist.add');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate(
            [
                'artist_id' => 'bail|required|unique:artist',
                'artist_nama' => 'required'
            ],
            [
                'artist_id.required' => 'ID wajib diisi',
                'artist_id.unique' => 'Nama ID sudah ada',
                'artist_nama.required' => 'Nama wajib diisi'
            ]
        );
                
            artist::create([
            'artist_id' => $request->artist_id,
            'artist_nama' => $request->artist_nama
                 
            ]);
                
                return redirect('/artist');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = artist::findOrFail($id);
        return view('artist.edit', compact('row')); 
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
        $request->validate(
            [
                'artist_id' => 'bail|required',
                'artist_nama' => 'required'
            ],
            [
                'artist_id.required' => 'Nama ID wajib diisi',
                'artist_nama.required' => 'Nama wajib diisi'
            ]
        );

        $row = artist::findOrFail($id);
        $row->update([
            'artist_id' => $request->artist_id,
            'artist_nama' => $request->artist_nama
        ]);

        return redirect('/artist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = artist::findOrFail($id);
        $row->delete();

        return redirect('/artist');
    }
}