<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\album;

class albumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $rows = album::all();
        return view('album.index', compact('rows'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('album.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            $request->validate([
            'album_id' => 'bail|required|unique:album',
            'album_nama' => 'required'
            ],
            [
            'album_id.required' => 'ID wajib diisi',
            'album_id.unique' => 'Nama ID sudah ada',
            'album_nama.required' => 'Nama wajib diisi'
            ]);
            
            album::create([
            'album_id' => $request->album_id,
            'album_nama' => $request->album_nama,
             
            ]);
            
            return redirect('/album');
            
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
        $row = album::findOrFail($id);
        return view('album.edit', compact('row')); 
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
                'album_id' => 'bail|required',
                'album_nama' => 'required'
            ],
            [
                'album_id.required' => 'Nama ID wajib diisi',
                'album_nama.required' => 'Nama wajib diisi'
            ]
        );

        $row = album::findOrFail($id);
        $row->update([
            'album_id' => $request->album_id,
            'album_nama' => $request->album_nama
        ]);

        return redirect('/album');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = album::findOrFail($id);
        $row->delete();

        return redirect('/album');
    }
}