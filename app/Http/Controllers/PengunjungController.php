<?php

namespace App\Http\Controllers;

use App\Models\DataKursus;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
      // PENGUNJUNG
      public function home()
      {
          $landingpage = DataKursus::inRandomOrder()->limit(3)->get();
          return view('user.home', compact('landingpage'));
      }


      public function kursus()
      {
          $data_kursus = DataKursus::limit(6)->get();
          return view('user.kursus', compact('data_kursus'));
      }



      public function detail(string $id)
      {
          $data = DataKursus::find($id);
        //   dd($data);
          $imageNames = json_decode($data->img_konten, true);
          return view('user.detailKursus', compact(['data', 'imageNames']));
      }



      public function maps()
      {
          $latilongti = DataKursus::all();
          return view('user.peta', compact('latilongti'));
      }
}
