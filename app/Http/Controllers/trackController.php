<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\track;

class trackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = track::all();
        return view('track.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('track.add');
        
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
            'track_id' => 'bail|required|unique:track',
            'track_nama' => 'required'
            ],
            [
            'track_id.required' => 'ID wajib diisi',
            'track_id.unique' => 'Nama ID sudah ada',
            'track_nama.required' => 'Nama wajib diisi'
            ]);
            
            track::create([
            'track_id' => $request->artist_id,
            'track_nama' => $request->track_nama,
            'artist_id' => $request->artist_id,
            'album_id' => $request->album_id,
             
            ]);
            
            return redirect('/track');
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
        $row = track::findOrFail($id);
        $row->delete();

        return redirect('/track');
    }
}
