<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\user;
use App\Especialidad;
use App\Persona;
use App\Educacion;
use App\ExperienciaLaboral;
use App\Archivos;
use App\TipoArchivos;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;
use Storage;
class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pdf.crear_pdf");
    }

     public function ver()
    {
        return view("pdf.verpdf");
    }


     public function unirpdf($id,$tipo)
    {

    $persona=Persona::find($id);
    $tipoarchivos=TipoArchivos::all();
    $rarchivos=Archivos::all();
    $oMerger = PDFMerger::init();
    
    $oMerger->addPDF('storage/archivos/'.$persona->id.'_'.trim($persona->nombres).'_curriculum.pdf', 'all');
    
        
    foreach ($tipoarchivos as $tipoarchi) {
        if ($tipoarchi->id == $tipo) {
            foreach ($rarchivos as $archi) {
                if ($archi->idTipoArchivo == $tipoarchi->id) {
                    if ($persona->id == $archi->idUsuario) {     
                     $oMerger->addPDF('storage/archivos/'.$archi->ruta, 'all');
                    }    
                }
            }
        }elseif($tipo==3){

            foreach ($rarchivos as $archi) {
                if ($archi->idTipoArchivo == $tipoarchi->id) {
                    if ($persona->id == $archi->idUsuario) {     
                     $oMerger->addPDF('storage/archivos/'.$archi->ruta, 'all');
                    }    
                }
            }

        }
    }

    // dd($oMerger);    
    $oMerger->merge();
    $oMerger->setFileName(trim($persona->nombres)."_curriculum.pdf");
    $oMerger->download();

      
    }


      public function crearPDF($datos,$vistaurl,$tipo,$id,$educa,$exp)
    {

        $edu = $educa;
        $data = $datos;
        $fid = $id;
        $exp= $exp;
        // $view2 =  \View::make('pdf.verpdf')->render();
        $view =  \View::make($vistaurl, compact('data', 'fid','edu','exp'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){ 
        $usu=Persona::find($id);
        $pdf->save('storage/archivos/'.$usu->id."_".trim($usu->nombres).'_curriculum.pdf');

        return  $pdf->stream('cv.pdf');
        }
        if($tipo==2){return $pdf->download('cv.pdf');}
    }


    public function crear_pdf($tipo,$id){

     $vistaurl="pdf.crear_pdf";
     $usu=Persona::all();
     $exp=ExperienciaLaboral::all();
     $educa=Educacion::anio()->get();
     return $this->crearPDF($usu, $vistaurl,$tipo,$id,$educa,$exp);

    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        //
    }
}
