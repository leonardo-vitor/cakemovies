<?php

App::uses("AppController", "Controller");

class CategoriesController extends AppController
{
    /**
     * @var string
     */
    public $name = "Categories";
    /**
     * @var string[]
     */
    public $helpers = ["Html", "Form"];
    /**
     * @var string[]
     */
    public $components = ["Paginator"];
    /**
     * @var array
     */
    public $paginate = [
        "limit" => 6,
        "order" => [
            "Category.created_at" => "asc"
        ]
    ];

    /**
     * @return void
     */
    public function home()
    {
        $this->Paginator->settings = $this->paginate;

        $data = $this->Paginator->paginate("Category");
        $this->set("categories", $data);
    }

    /**
     * @return void
     */
    public function add()
    {
        if ($this->request->is("post")) {
            $data = (object)$this->request->data["Category"];

            if (!$this->Category->save($data)) {
                $this->Flash->set("Não foi possível salvar sua categoria", ["params" => ["class" => "warning", "bs" => true]]);
                return;
            }

            $this->Flash->set("Categoria adicionada com sucesso", ["params" => ["class" => "success", "bs" => true]]);
            $this->redirect(["controller" => "categories", "action" => "home"]);
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function edit($id = null)
    {
        if ($this->request->is("get")) {
            $this->request->data = $this->Category->findById($id);
        } else {
            $data = (object)$this->request->data["Category"];
            if (!$this->Category->save($data)) {
                $this->Flash->set("Não foi possível salvar sua categoria", ["params" => ["class" => "warning", "bs" => true]]);
                return;
            }

            $this->Flash->set("Categoria atualizada com sucesso", ["params" => ["class" => "success", "bs" => true]]);
            $this->redirect(["controller" => "categories", "action" => "home"]);
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function delete($id): void
    {
        if (!$this->request->is("post")) {
            throw new MethodNotAllowedException();
        }

        $category = $this->Category->findById($id)["Category"];
        $movies = $this->Category->find("count", [
            "conditions" => ["Movie.category_id" => $category["id"]],
            "joins" => [
                [
                    "table" => "movies",
                    "alias" => "Movie",
                    "type" => "RIGHT",
                    "conditions" => ["Category.id = Movie.category_id"]
                ]
        ]]);

        if ($movies > 0){
            $this->Flash->set("A categoria selecionada possui filmes cadastrados", ["params" => ["class" => "info", "bs" => true]]);
            $this->redirect(["controller" => "categories", "action" => "home"]);
        }

        if ($this->Category->delete($id)) {
            $this->Flash->set("A categoria '{$category["name"]}' foi removido com sucesso.", ["params" => ["class" => "success", "bs" => true]]);
            $this->redirect(["controller" => "categories", "action" => "home"]);
        }
    }
}