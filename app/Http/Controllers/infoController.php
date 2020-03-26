<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class infoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //mengambil data korona lewat API
        $response = Http::get('https://api.kawalcorona.com/indonesia/provinsi');
        $data = $response->json();

        //hitung total Positif :(

        // $sum = collect([
        //      $data['0']['attributes']['Kasus_Posi'],

        // ])->sum();


        // dd($sum);
        $positif = 0;
        $sembuh = 0;
        $meninggal = 0;

        foreach ($data as $key => $datas) {
            # code...
            $positif += $datas['attributes']['Kasus_Posi'];
            $sembuh += $datas['attributes']['Kasus_Semb'];
            $meninggal += $datas['attributes']['Kasus_Meni'];
        }


        return view('index', compact('data', 'positif', 'sembuh', 'meninggal'));
    }

    public function info()
    {

        //mengambil data korona lewat API
        $response = Http::get('https://api.kawalcorona.com/indonesia/provinsi');
        $data = $response->json();

        dd($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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