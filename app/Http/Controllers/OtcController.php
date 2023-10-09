<?php

namespace App\Http\Controllers;

use Google_Service_Sheets;

class OtcController extends GoogleClientController
{
    public function  holaMundo(){
        return "Hola mundo";
    }
    public function getTerritorioClima()
    {
        $range = 'territorio_y_clima!A1:C3';
        $values = $this->serviceSheets->spreadsheets_values->get($this->spreadsheetId, $range)->getValues();
        return response()->json($values);
    }
    public function getSeccionesTerritorio(){
        $range = 'secciones_territorio!A1:C20';
        $values = $this->serviceSheets->spreadsheets_values->get($this->spreadsheetId, $range)->getValues();
        return response()->json($values);
    }
    public function getSeccionesClima(){
        $range = 'secciones_clima!A1:C20';
        $values = $this->serviceSheets->spreadsheets_values->get($this->spreadsheetId, $range)->getValues();
        return response()->json($values);
    }
    public function getAppsTerritorio(){
        $range = 'apps_territorio!A1:E30';
        $values = $this->serviceSheets->spreadsheets_values->get($this->spreadsheetId, $range)->getValues();
        return response()->json($values);
    }
    public function getAppsClima(){
        $range = 'apps_clima!A1:E30';
        $values = $this->serviceSheets->spreadsheets_values->get($this->spreadsheetId, $range)->getValues();
        return response()->json($values);
    }
    public function getPaginaInicio(){
        $range = 'pagina_inicio!A1:C8';
        $values = $this->serviceSheets->spreadsheets_values->get($this->spreadsheetId, $range)->getValues();
        return response()->json($values);

    }
    public function getCentroDeFormacion(){
        $range = 'centro_de_formacion!A1:C5';
        $values = $this->serviceSheets->spreadsheets_values->get($this->spreadsheetId, $range)->getValues();
        return response()->json($values);

    }
    public function getContacto(){
        $range = 'contacto!A1:J2';
        $values = $this->serviceSheets->spreadsheets_values->get($this->spreadsheetId, $range)->getValues();
        return response()->json($values);

    }
    public function getPieDePagina(){
        $range = 'pie_de_pagina!A1:E5';
        $values = $this->serviceSheets->spreadsheets_values->get($this->spreadsheetId, $range)->getValues();
        return response()->json($values);

    }
    public function getAllFiles() {
        $values = $this->obtenerArchivosBoletines($this->serviceDrive, $this->folderId);
        return response()->json($values);
    }

    public function obtenerArchivosBoletines($serviceDrive, $folderId) {
        $query = "'$folderId' in parents";

        try {
            $results = $serviceDrive->files->listFiles([
                'q' => $query,
                'fields' => 'files(id, name)'
            ]);

        } catch (Exception $e) {
            die('An error occurred: ' . $e->getMessage());
        }

        if ($results === null) {
            return [];
        }

        $files = [];
        foreach ($results->getFiles() as $file) {
            $files[] = [
                'id' => $file->getId(),
                'name' => $file->getName()
            ];
        }

        return $files;
    }
    public function getBoletinesTerritorio(){
        $range = 'boletines_territorio!A1:E50';
        $values = $this->serviceSheets->spreadsheets_values->get($this->spreadsheetId, $range)->getValues();
        return response()->json($values);

    }
    public function getBoletinesClima(){
        $range = 'boletines_clima!A1:E50';
        $values = $this->serviceSheets->spreadsheets_values->get($this->spreadsheetId, $range)->getValues();
        return response()->json($values);

    }
    public function getFechaBoletin(){
        $range = 'fecha_boletin!A1:B50';
        $values = $this->serviceSheets->spreadsheets_values->get($this->spreadsheetId, $range)->getValues();
        return response()->json($values);
    }
    public function getCabezote(){
        $range = 'cabezote!A1:C7';
        $values = $this->serviceSheets->spreadsheets_values->get($this->spreadsheetId, $range)->getValues();
        return response()->json($values);
    }

}

