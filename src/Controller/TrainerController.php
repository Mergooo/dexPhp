<?php

namespace App\Controller;

use App\Model\TrainerModel;

class TrainerController extends BaseController
{
    private TrainerModel $model;

    public function __construct()
    {
        $this->model = new TrainerModel();
    }

    public function index()
    {
        $trainer = $this->model->findAll();

        parent::loadView('index', 'trainer', ['trainer' => $trainer]);
    }

    public function add() {
        parent::loadView('trainer_add', 'trainer'); // 追加フォームの表示
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $pokemon_id = htmlspecialchars($_POST['pokemon_id']);
            
            $trainerModel = new TrainerModel();
            $trainerModel->create($name, $pokemon_id);
            
            header('Location: /dexPhp/trainer');
            exit;
        }
}

    public function edit($id) {
        $trainerModel = new TrainerModel();
        $trainer = $trainerModel->findById($id);
        if ($trainer) {
            parent::loadView('trainer_edit','trainer', ['trainer' => $trainer]);
        } else {
            echo "Trainer not found.";
        }
}

public function update($id)
{
    $name = $_POST['name'];
    $pokemon_id = $_POST['pokemon_id'];
    $this->model->update($id, $name, $pokemon_id);

    header('Location: /dexPhp/trainer');
    exit;
}
}
