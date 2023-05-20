<?php

App::uses('AppController', 'Controller');

class MoviesController extends AppController
{
    public $name = "Movies";
    public $helpers = ["Html", "Form", "Text"];
    public $components = ["Paginator"];
    public $paginate = [
        "limit" => 6,
        "order" => [
            "Movie.create" => "asc"
        ]
    ];

    public function home()
    {
        $this->Paginator->settings = $this->paginate;

        $data = $this->Paginator->paginate("Movie");
        $this->set("movies", $data);
    }

    public function list()
    {
        $this->Paginator->settings = $this->paginate;

        $data = $this->Paginator->paginate("Movie");
        $this->set("movies", $data);
    }

    public function add()
    {
        $categories = $this->Movie->Category->find("list");
        $this->set("categories", $categories);

        if ($this->request->is("post")) {
            $data = (object)$this->request->data["Movie"];

            if (empty($data->cover["name"])) {
                $this->Flash->set("Selecione a foto de capa", ["params" => ["class" => "warning", "bs" => true]]);
                return;
            }

            $uploadPath = "media" . DS . "filmes";
            $fullPath = WWW_ROOT . $uploadPath;
            if (!file_exists($fullPath) || !is_dir($fullPath)) {
                mkdir($fullPath, 0644, true);
            }

            $extension = ($data->cover["type"] == "image/png" ? ".png" : ".jpg");
            $filename = $this->str_slug($data->cover["name"] . "-" . time()) . $extension;
            $uploadFile = $uploadPath . DS . $filename;

            if (move_uploaded_file($data->cover["tmp_name"], $uploadFile)) {
                $data->cover = $uploadFile;
            }

            if (!$this->Movie->save($data)) {
                $this->Flash->set("Não foi possível salvar seu filme", ["params" => ["class" => "warning", "bs" => true]]);
                $deleteCover = WWW_ROOT . $uploadFile;
                if (!empty($deleteCover) && file_exists($deleteCover)) {
                    unlink($deleteCover);
                }
                return;
            }

            $this->Flash->set("Filme adicionado com sucesso", ["params" => ["class" => "success", "bs" => true]]);
            $this->redirect(["action" => "list"]);
        }
    }

    public function edit($id = null)
    {
        $categories = $this->Movie->Category->find("list");
        $this->set("categories", $categories);

        if ($this->request->is("get")) {
            $this->request->data = $this->Movie->findById($id);
        } else {
            $data = (object)$this->request->data["Movie"];

            $oldCover = null;
            if (!empty($data->new_cover["name"])) {
                $oldCover = $data->cover;

                $uploadPath = "media" . DS . "filmes";
                $fullPath = WWW_ROOT . $uploadPath;
                if (!file_exists($fullPath) || !is_dir($fullPath)) {
                    mkdir($fullPath, 0644, true);
                }

                $extension = ($data->new_cover["type"] == "image/png" ? ".png" : ".jpg");
                $filename = $this->str_slug($data->new_cover["name"] . "-" . time()) . $extension;
                $uploadFile = $uploadPath . DS . $filename;

                if (move_uploaded_file($data->new_cover["tmp_name"], $uploadFile)) {
                    $data->cover = $uploadFile;
                }
            }

            if (!$this->Movie->save($data)) {
                $this->Flash->set("Não foi possível salvar seu filme", ["params" => ["class" => "warning", "bs" => true]]);
                if (!empty($data->cover) && file_exists($data->cover)) {
                    unlink($data->cover);
                }
                return;
            }

            $this->Flash->set("Filme atualizado com sucesso", ["params" => ["class" => "success", "bs" => true]]);
            if (!empty($oldCover)  && file_exists($oldCover)) {
                unlink($oldCover);
            }
            $this->redirect(["action" => "list"]);
        }
    }

    public function delete($id): void
    {
        if (!$this->request->is("post")) {
            throw new MethodNotAllowedException();
        }

        $movie = $this->Movie->findById($id)["Movie"];
        if ($this->Movie->delete($id)) {
            $this->Flash->set("O filme '{$movie["title"]}' foi removido com sucesso.", ["params" => ["class" => "success", "bs" => true]]);
            $deleteCover = WWW_ROOT . $movie["cover"];
            if (file_exists($deleteCover)) {
                unlink($deleteCover);
            }
            $this->redirect(["action" => "list"]);
        }
    }
}