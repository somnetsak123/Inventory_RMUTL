<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use download_html;

class ExportController extends Controller
{
    public function exportSQL()
    {
        $database = DB::connection()->getDatabaseName();
        $fileName = 'backup.sql';

        // สร้างไฟล์ SQL
        exec("mysqldump --user=" . env('DB_USERNAME') . " --password=" . env('DB_PASSWORD') . " " . $database . " > " . $fileName);




        // ดาวน์โหลดไฟล์ทั้งหมด

        // ดาวน์โหลดไฟล์ SQL

        $this->download_html();

        return response()->download($fileName)->deleteFileAfterSend();
    }

    public function download_html()
    {
        
        return response()->download("public_html.zip");
    }
}
