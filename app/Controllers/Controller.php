<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EtudiantModel;
use App\Models\NoteModel;
use App\Models\ParcoursMatiereModel;
use CodeIgniter\HTTP\ResponseInterface;

class Controller extends BaseController
{
    private $etudiantModel;
    private $noteModel;
    private $parcoursMatiereModel;

    public function __construct()
    {
        $this->etudiantModel = model(EtudiantModel::class);
        $this->noteModel = model(NoteModel::class);
        $this->parcoursMatiereModel = model(ParcoursMatiereModel::class);
    }

    public function getAllEtudiants()
    {
        $etudiants = $this->etudiantModel->findAll();
        return view('ListeEtudiants', ['etudiants' => $etudiants]);
    }

    public function getAllNotesDeEtudiant($id_etudiant)
    {
        $matieres = model('MatiereModel')->findAll();
        $notes = $this->noteModel->where('id_etudiant', $id_etudiant)->findAll();
        return view('ListeNotes', ['id_etudiant' => $id_etudiant, 'matieres' => $matieres, 'notes' => $notes]);
    }

    // UE, Intitule, Credits, Note, Resultat

    public function getNoteDeEtudiant($id_etudiant, $id_parcours)
    {
        $pms = $this->parcoursMatiereModel->where('id_parcours', $id_parcours)->findAll();
        $resultats = [];
        foreach($pms as $pm) {
            $notes = $this->noteModel->where('id_etudiant', $id_etudiant)
                                    ->where('id_parcours_matiere', $pm['id'])->first();
        }
    }

    public function submitNewNote($id_etudiant)
    {
        $data = $this->request->getPost();
        if (! $this->noteModel->save($data)) {
            return redirect()->back()->with('errors', $this->noteModel->errors());
        }
        return redirect('Controller::getAllNotesDeEtudiant', $id_etudiant);
    }

    public function deleteNote($id_etudiant, $id_note)
    {
        $id_note = $this->request->getGet('id_note');
        $this->noteModel->delete($id_note);
        return redirect('Controller::getAllNotesDeEtudiant', $id_etudiant);
    }
}
