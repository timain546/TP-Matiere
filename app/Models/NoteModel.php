<?php

namespace App\Models;

use CodeIgniter\Model;

class NoteModel extends Model
{
    protected $table            = 'Notes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_etudiant', 'code_matiere', 'note'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'id_etudiant' => 'required|is_not_unique[Etudiant.id]',
        'code_matiere' => 'required|is_not_unique[Matiere.code_matiere]',
        'note' => 'required|greater_than_equal_to[0]|less_than_equal_to[20]',
    ];
    protected $validationMessages   = [
        'id_etudiant' => [
            'required' => 'L’étudiant est obligatoire.',
            'is_not_unique' => 'Cet étudiant n’existe pas.',
        ],
        'code_matiere' => [
            'required' => 'La matière est obligatoire.',
            'is_not_unique' => 'Cette matière n’existe pas.',
        ],
        'note' => [
            'required' => 'La note est obligatoire',
            'greater_than_equal_to' => 'La note doit être entre 0 et 20',
            'less_than_equal_to' => 'La note doit être entre 0 et 20',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
