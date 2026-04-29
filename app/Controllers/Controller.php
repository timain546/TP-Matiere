<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Controller extends BaseController
{
    public function getAllEtudiants()
    {
        // TODO
        return view('welcome_message');
    }

    public function getAllNotesDeEtudiant($id_etudiant)
    {
        // TODO
        return view('welcome_message');
    }

    public function getNoteDeEtudiant($id_etudiant, $id_parcours)
    {
        // TODO
        return view('welcome_message');
    }
}
