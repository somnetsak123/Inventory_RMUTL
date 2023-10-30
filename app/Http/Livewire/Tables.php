<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Tables extends Component
{




    public function render()
    {

        $Getcaregiver_name = $_SESSION['caregiver_name'];
        $Getuser_statuses = $_SESSION['user_statuses'];

  

        $data_rooms = DB::table(env('PREFIX') . 'rooms')->select(
            'room_id',
            'room_name',
        )
       
            ->get();

        $data_tb_types = DB::table(env('PREFIX') . 'tb_types')->get();
        $data_tb_cargivers = DB::table(env('PREFIX') . 'tb_cargivers')
            ->select(
                'cargiver_id',
                'caregiver_name',
            )
            ->get();
        $data_tb_flag = DB::table(env('PREFIX') . 'tb_flag')
            ->select(
                'da_flag',
                'da_status',
            )
            ->get();


        if ($Getuser_statuses == 1) {
            $tb_durable_articles = DB::table(env('PREFIX') . 'tb_durable_articles')
                ->join(env('PREFIX') . 'tb_cargivers', env('PREFIX') . 'tb_durable_articles.cargiver_id', '=', env('PREFIX') . 'tb_cargivers.cargiver_id')
                ->join(env('PREFIX') . 'rooms', env('PREFIX') . 'tb_durable_articles.room_id', '=', env('PREFIX') . 'rooms.room_id')
                ->join(env('PREFIX') . 'tb_flag', env('PREFIX') . 'tb_durable_articles.da_flag', '=', env('PREFIX') . 'tb_flag.da_flag')
                ->join(env('PREFIX') . 'tb_types', env('PREFIX') . 'tb_durable_articles.id_type', '=', env('PREFIX') . 'tb_types.id_type')
                ->join(env('PREFIX') . 'buildings', env('PREFIX') . 'rooms.building_id', '=', env('PREFIX') . 'buildings.building_id')

                ->select(
                    env('PREFIX') . 'tb_durable_articles.*',
                    env('PREFIX') . 'tb_cargivers.cargiver_id',
                    env('PREFIX') . 'tb_cargivers.caregiver_name',
                    env('PREFIX') . 'rooms.room_id',
                    env('PREFIX') . 'rooms.room_name',
                    env('PREFIX') . 'rooms.building_id',
                    env('PREFIX') . 'tb_flag.da_flag',
                    env('PREFIX') . 'tb_flag.da_status',
                    env('PREFIX') . 'tb_types.id_type',
                    env('PREFIX') . 'tb_types.da_type',
                    env('PREFIX') . 'buildings.building_id',
                    env('PREFIX') . 'buildings.building_name',

                )

                ->get();
        } else {

            $tb_durable_articles = DB::table(env('PREFIX') . 'tb_durable_articles')
                ->join(env('PREFIX') . 'tb_cargivers', env('PREFIX') . 'tb_durable_articles.cargiver_id', '=', env('PREFIX') . 'tb_cargivers.cargiver_id')
                ->join(env('PREFIX') . 'rooms', env('PREFIX') . 'tb_durable_articles.room_id', '=', env('PREFIX') . 'rooms.room_id')
                ->join(env('PREFIX') . 'tb_flag', env('PREFIX') . 'tb_durable_articles.da_flag', '=', env('PREFIX') . 'tb_flag.da_flag')
                ->join(env('PREFIX') . 'tb_types', env('PREFIX') . 'tb_durable_articles.id_type', '=', env('PREFIX') . 'tb_types.id_type')
                ->join(env('PREFIX') . 'buildings', env('PREFIX') . 'rooms.building_id', '=', env('PREFIX') . 'buildings.building_id')

                ->where('caregiver_name', '=', $Getcaregiver_name)
                ->select(
                    env('PREFIX') . 'tb_durable_articles.*',
                    env('PREFIX') . 'tb_cargivers.cargiver_id',
                    env('PREFIX') . 'tb_cargivers.caregiver_name',
                    env('PREFIX') . 'rooms.room_id',
                    env('PREFIX') . 'rooms.room_name',
                    env('PREFIX') . 'rooms.building_id',
                    env('PREFIX') . 'tb_flag.da_flag',
                    env('PREFIX') . 'tb_flag.da_status',
                    env('PREFIX') . 'tb_types.id_type',
                    env('PREFIX') . 'tb_types.da_type',
                    env('PREFIX') . 'buildings.building_id',
                    env('PREFIX') . 'buildings.building_name',

                )
                ->get();
        }


        return view('livewire.tables', compact(
            'tb_durable_articles',
            'data_rooms',
            'data_tb_types',
            'data_tb_cargivers',
            'data_tb_flag',
            'Getcaregiver_name',
            'Getuser_statuses'
        ));
    }


}
