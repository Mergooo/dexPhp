<?php

namespace App\Controller;

use App\Model\TrainerModel;
use Twig\Environment;

class TrainerController extends BaseController
{
    private TrainerModel $model;
    private Environment $twig;

    public function __construct(Environment $twig)
    {
        $this->model = new TrainerModel();
        $this->twig = $twig;
    }

    public function index()
    {
        $trainer = $this->model->findAll();

        //parent::loadView('index', 'trainer', ['trainer' => $trainer]);
        
        echo $this->twig->render('trainer/index.html.twig', ['trainer' => $trainer]);    }


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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = htmlspecialchars($_POST['name']);
        $pokemon_id = htmlspecialchars($_POST['pokemon_id']);
        $this->model->update($id, $name, $pokemon_id);

        header('Location: /dexPhp/trainer');
        exit;
    }

    // If not a POST request, load the edit form
    $trainer = $this->model->findById($id);
    if ($trainer) {
        parent::loadView('edit', 'trainer', ['trainer' => $trainer]);
    } else {
        echo "Trainer not found.";
    }

}

public function delete($id)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $this->model->delete($id);

        header('Location: /dexPhp/trainer');
        exit;
    }

    echo "Invalid request method.";
}
}

