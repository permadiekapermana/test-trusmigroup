<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use DB;

class DashboardController extends Controller
{
    public function tasklist()
    {
        // raw query table_kpi_marketing
        $data = DB::select("select COUNT(km.tasklist) as total_tasklist, COUNT(IF(km.aktual<=km.deadline, 1, NULL)) tasklist_ontime, COUNT(IF(km.aktual>km.deadline, 1, NULL)) tasklist_late, concat(round(COUNT(IF(km.aktual<=km.deadline, 1, NULL))/COUNT(km.tasklist) * 100),'%') percent_tasklist_ontime, concat(round(COUNT(IF(km.aktual>km.deadline, 1, NULL))/COUNT(km.tasklist) * 100),'%') percent_tasklist_late from table_kpi_marketing km");

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "success get data",
            "data" => $data
        ]);
    }

    public function kpi()
    {
        // raw query table_kpi_marketing
        $data = DB::select("SELECT DISTINCT karyawan, COUNT(IF(km.kpi='Sales', 1, NULL)) as sales_target, COUNT(IF(km.aktual<=km.deadline and km.kpi='Sales', 1, NULL)) as sales_actual, concat(round((COUNT(IF(km.aktual<=km.deadline and km.kpi='Sales', 1, NULL))/COUNT(IF(km.kpi='Sales', 1, NULL)) * 100 ),0),'%') AS sales_achivement_percentage, concat(round((COUNT(IF(km.aktual<=km.deadline and km.kpi='Sales', 1, NULL))/COUNT(IF(km.kpi='Sales', 1, NULL)) * 100 / 2 ),0),'%') AS sales_actual_percentage, COUNT(IF(km.kpi='Report', 1, NULL)) as report_target, COUNT(IF(km.aktual<=km.deadline and km.kpi='Report', 1, NULL)) as report_actual, concat(round((COUNT(IF(km.aktual<=km.deadline and km.kpi='Report', 1, NULL))/COUNT(IF(km.kpi='Report', 1, NULL)) * 100 ),0),'%') AS report_achivement_percentage, concat(round((COUNT(IF(km.aktual<=km.deadline and km.kpi='Report', 1, NULL))/COUNT(IF(km.kpi='Sales', 1, NULL)) * 100 / 2 ),0),'%') AS report_actual_percentage, concat(round((COUNT(IF(km.aktual<=km.deadline and km.kpi='Sales', 1, NULL))/COUNT(IF(km.kpi='Sales', 1, NULL)) * 100 / 2 ),0) + round((COUNT(IF(km.aktual<=km.deadline and km.kpi='Report', 1, NULL))/COUNT(IF(km.kpi='Report', 1, NULL)) * 100 / 2 ),0),'%') as kpi FROM table_kpi_marketing km group by karyawan order by karyawan asc");

        return response()->json([
            "status" => true,
            "code" => 200,
            "message" => "success get data",
            "data" => $data
        ]);
    }
}