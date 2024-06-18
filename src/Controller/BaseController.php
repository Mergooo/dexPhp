<?php

namespace App\Controller;

abstract class BaseController
{
    // Path zum View-Verzeichnis
    protected string $viewsPath = __DIR__ . '/../View/';


    // Methode zum Laden einer View, kann auch in einem Unterverzeichnis liegen
    public function loadView($viewName, $subDir = '', $data = []): void
    {

        // Prüfen, ob Unterverzeichnis angegeben wurde und entsprechend den Pfad anpassen
        $path = $this->viewsPath . ($subDir ? '/' . $subDir . '/' : '') . $viewName . '.php';

        // Prüfe ob File existiert
        if (file_exists($path)) {
            // Variablen für die View verfügbar machen
            extract($data);

            // View-File einbinden
            require($path);
        } else {
            // Fehlermeldung, wenn die Datei nicht gefunden wird
            echo "Die View >> $viewName << konnte nicht gefunden werden.";
        }
    }
}
