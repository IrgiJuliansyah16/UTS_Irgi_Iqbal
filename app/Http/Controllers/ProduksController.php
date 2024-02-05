<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProduksController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return response()->json(['data' => $produks], Response::HTTP_OK);
    }

    public function show($id)
    {
        $produk = Produk::find($id);

        if ($produk) {
            return response()->json(['data' => $produk], Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'Produk tidak ditemukan'], Response::HTTP_NOT_FOUND);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer',
        ]);

        $produk = Produk::create($request->all());

        return response()->json(['message' => 'Produk berhasil dibuat', 'data' => $produk], Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);

        if ($produk) {
            $this->validate($request, [
                'nama' => 'required|string',
                'deskripsi' => 'required|string',
                'harga' => 'required|integer',
            ]);

            $produk->update($request->all());
            return response()->json(['message' => 'Produk berhasil diperbarui', 'data' => $produk], Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'Produk tidak ditemukan'], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);

        if ($produk) {
            $produk->delete();
            return response()->json(['message' => 'Produk berhasil dihapus'], Response::HTTP_NO_CONTENT);
        } else {
            return response()->json(['message' => 'Produk tidak ditemukan'], Response::HTTP_NOT_FOUND);
        }
    }
}
