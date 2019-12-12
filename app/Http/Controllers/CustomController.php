<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requerimento;
use Barryvdh\DomPDF\Facade as PDF;
//use Dompdf\Dompdf;
use View;

class CustomController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function printpdf(Request $request){

        $requerimento = Requerimento::find($request->get('idreq'));
        /*

        $data = [
            'title' => 'First PDF for Medium',
            'heading' => 'Hello from 99Points.info',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.
             Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
             It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'
              ];
            //dd($req);

        $html = View::make('pdf.pdf_view')->render();
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();
        $dompdf->stream(); */


          $pdf = PDF::loadView('pdf.pdf_view', compact('requerimento'));
        //   return $pdf->download('medium.pdf');
          return $pdf->stream();


    }
}
