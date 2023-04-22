<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;

class FileController extends Controller
{

    public function addDocuments($request , $id, $type) {
        if ($request->hasFile('document_pagamento'))        $this->addNew($id, $request->file('document_pagamento'),  'pagamento',$type);
        if ($request->hasFile('document_credenciamento'))   $this->addNew($id, $request->file('document_credenciamento'),  'credenciamento',$type);
        if ($request->hasFile('document_registro'))         $this->addNew($id, $request->file('document_registro'),  'registro',$type);
        if ($request->hasFile('document_certificado'))      $this->addNew($id, $request->file('document_certificado'),   'certificado',$type);
        if ($request->hasFile('document_contrato'))         $this->addNew($id, $request->file('document_contrato'),   'contrato',$type);
        if ($request->hasFile('document_identidade'))       $this->addNew($id, $request->file('document_identidade'),   'identidade',$type);
        if ($request->hasFile('document_cpf'))              $this->addNew($id, $request->file('document_cpf'),  'cpf',$type);
        if ($request->hasFile('document_alvara'))           $this->addNew($id, $request->file('document_alvara'),  'alvara',$type);
        if ($request->hasFile('document_autorizacao'))      $this->addNew($id, $request->file('document_autorizacao'),   'autorizacao',$type);
    }

    public function addNew($id, $file,  $name, $type){
        $file_extension = $file->extension();
        $file_name = $name . "." . $file_extension;
        $file_folder = 'public/documents/'. $type . '/'. $id ;
        Storage::putFileAs($file_folder, $file, $file_name);
    }

      public function view($type, $id, $name, $extension) {

        $name = 'storage/documents/' . $type . '/' . $id . '/' . $name . '.' . $extension;
        
        $file = $name;
        
        $content_type = '';

        switch ($extension) {
            case 'pdf':
                $content_type = 'application/pdf';
                break;
            case '.jpeg':
            case  '.jpg':
                $content_type = 'image/jpeg';
                break;
            case  '.png':
                $content_type = 'image/png';
                break;
            default:
                # code...
                break;
        }
        
        return $file;

        // return Inertia::render('File/View',[
        //     'file' => $file,
        //     'content_type' => $content_type,
        // ]);
       
    }

}
