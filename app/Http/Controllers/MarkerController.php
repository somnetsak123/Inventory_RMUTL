<?php

namespace App\Http\Controllers;
use App\Models\tb_durable_articles;
use Illuminate\Http\Request;

class MarkerController extends Controller
{
    //


    public function index()
    {
        
        $markers = tb_durable_articles::all(); // ตารางที่ต้องการ
      

        return response()->json($markers);
    }


}
