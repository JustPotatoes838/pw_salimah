<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Berita::orderBy('judul','asc')->get();
        return response() -> json([
            'status' => true,
            'message' => 'Data ditemukan',
            'data' => $data
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataBerita = new Berita;

        $rules = [
            'judul'=>'required',
            'penulis'=>'required',
            'tanggal_publikasi'=>'required|date',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukkan data',
                'data' => $validator->errors()
            ]);
        }

        $dataBerita->judul = $request->judul;
        $dataBerita->penulis = $request->penulis;
        $dataBerita->tanggal_publikasi = $request->tanggal_publikasi;

        $post = $dataBerita -> save();

        return response()->json([
                'status' => true,
                'message' => 'Sukses memasukkan data'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Berita::find($id);
        if($data){
            return response()->json([
                'status' => true,
                'message' => 'Data ditemukan',
                'data' => $data 
            ],200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data ridak ditemukan',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataBerita = Berita::find($id);
        if(empty($dataBerita)){
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'judul'=>'required',
            'penulis'=>'required',
            'tanggal_publikasi'=>'required|date',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengupdate data',
                'data' => $validator->errors()
            ]);
        }

        $dataBerita->judul = $request->judul;
        $dataBerita->penulis = $request->penulis;
        $dataBerita->tanggal_publikasi = $request->tanggal_publikasi;

        $post = $dataBerita -> save();

        return response()->json([
                'status' => true,
                'message' => 'Sukses mengupdate data'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataBerita = Berita::find($id);
        if(empty($dataBerita)){
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $post = $dataBerita -> delete();

        return response()->json([
                'status' => true,
                'message' => 'Sukses menghapus data'
        ]);
    }
}
