<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Valora;
use App\Models\Libro;
use App\Models\User;
use Dotenv\Parser\Value;
use Illuminate\Support\Facades\DB;

class RelacionController extends Controller
{
    public function index()
    {

        $valoras = Valora::with('libros')->get();
        return  $valoras;
    }

    public function update(Request $request)
    {
        $valoras = new Valora();



        $valoras = Valora::where([
            ['id', $request->id],
            
            ['user_id', $request->user_id],
            ['libro_id', $request->libro_id]
        ])->first();


        $valoras->status = $request->status;

        $valoras->save();
        return $valoras;
    }



    public function create(Request $request)
    {
        $valoras = new Valora();



        $valoras->status = $request->status;

        $valoras->user_id = $request->user_id;
        $valoras->libro_id = $request->libro_id;

        $valoras->save();
        return $valoras;
    }


    public function porlibro(Request $request)
    {
        $valoras = new Libro();
        $valorasas = new Valora();

        $valorasass = new Valora();


        //$valoras -> status= $request->status;

        $valorasas->cantidad =  Valora::where([
            ['libro_id', $request->libro_id],
            ['status', '1']

        ])->get();


        $valorasass->totalvalora =  Valora::where([
            ['libro_id', $request->libro_id],
            ['status', '1']

        ])->get()->count();

        $valorasas->totalvalora  = $valorasass;

        return  $valorasas;
    }

    public function porlibros(Request $request)
    {

        //   $valoras = Libro::with('valoras')->get();
        //   $valoras = DB::table('valoras')->pluck('title', 'name');

        //   $users = DB::table('libros')
        //   ->select(DB::raw('count(*) as user_count, autor'))
        //   ->join('valoras', 'valoras.libro_id', '=', 'libros.id')

        //   ->where('libros.id', 1)
        //   ->groupBy('libros.id')
        //   ->get();




        //  $users = DB::table('libros')
        //  
        //  ->join('valoras', 'valoras.libro_id', '=', 'libros.id')
        //  
        //  ->select(DB::raw('libros.id,count(libros.id) as user_count, libros.autor,libros.nombre,libros.upload_logo,libros.created_at'))

        //  ->where(  'valoras.status','1' )
        //  ->where('valoras.user_id','1')

        //  ->groupBy('libros.id')
        //  ->get();
        //  
        $users = DB::table('libros')


            ->select(DB::raw('libros.*'))


            ->groupBy('libros.id')
            ->get();




        $users_cal = DB::table('libros')
            ->join('valoras', 'libros.id', '=', 'valoras.libro_id')

            ->select('libros.*', 'valoras.status',)
            ->where('valoras.status', '1')
            ->where('valoras.user_id', '1')

            ->get();


        $latestPosts = DB::table('libros')


            ->select(DB::raw('libros.*'))


            ->groupBy('libros.id')
            ->get();;


        //  $valoras = new Libro();
        //  foreach($users as $users) 
        //{
        //    $valoras =$users;
        //$valoras  -> totalvalora  =     $users_can = DB::table('libros')
        //        ->join('valoras', 'libros.id', '=', 'valoras.libro_id')
        //        
        //        ->select(DB::raw('count(libros.id) as user_count, libros.id'))
        //        ->where(  'valoras.status','1' )
        //       
        //       ->groupBy('libros.id')
        //        ->get();
        //        //resto de las acciones
        //
        //}
        //
        // 
        //


        $valoras = new Libro();
        $valorasas = new Valora();

        $valorasass = new Valora();

        $dis = [];
        foreach ($users as $key  => $value) {

            // $dis[$key] =  Valora::where('libro_id', '=', $value->id)->get();






            //$valoras -> status= $request->status;


            //$valoras -> status= $request->status;




            $dis['calificado']   = Valora::
                
                
                select(('*'))->
                where([
                ['user_id', $request->user_id],
                
                ['libro_id', $value->id]
            ])->get();


            $dis['cantidad']   = Valora::
            
            
            
            where([
                ['libro_id', $value->id],
                ['status', '1']

            ])->get()->count();

            $dis['id_libro']  = $value->id;
            $dis['autor']  = $value->autor;
      
            $dis['nombre']  = $value->nombre;
            $dis['user_id']  = $value->user_id;
            $dis['fecha_creacion']  = $value->created_at;
            $dis['upload_logo']  = $value->upload_logo;
            $dataSet[] =   $dis;
        }


        return response()->json($dataSet);
    }


    
    public function createbook(Request $request)
    {
        $valoras = new Libro();



        $valoras->upload_logo = $request->upload_logo;

        $valoras->nombre = $request->nombre;
        $valoras->autor = $request->autor;
        $valoras->user_id = $request->user_id;

        $valoras->save();
        return $valoras;
    }


    public function porlibroscreados(Request $request)
    {

        //   $valoras = Libro::with('valoras')->get();
        //   $valoras = DB::table('valoras')->pluck('title', 'name');

        //   $users = DB::table('libros')
        //   ->select(DB::raw('count(*) as user_count, autor'))
        //   ->join('valoras', 'valoras.libro_id', '=', 'libros.id')

        //   ->where('libros.id', 1)
        //   ->groupBy('libros.id')
        //   ->get();




        //  $users = DB::table('libros')
        //  
        //  ->join('valoras', 'valoras.libro_id', '=', 'libros.id')
        //  
        //  ->select(DB::raw('libros.id,count(libros.id) as user_count, libros.autor,libros.nombre,libros.upload_logo,libros.created_at'))

        //  ->where(  'valoras.status','1' )
        //  ->where('valoras.user_id','1')

        //  ->groupBy('libros.id')
        //  ->get();
        //  
        $users = DB::table('libros')


            ->select(DB::raw('libros.*'))->
            where([
                ['user_id', $request->user_id],
                
                
            ])

            ->groupBy('libros.id')
            ->get();












        return response()->json($users);
    }


}
