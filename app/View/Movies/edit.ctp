<main class="container mb-5">
    <div class="d-flex justify-content-between mb-5">
        <h1>Editar filme</h1>

        <div>
            <?= $this->Html->link(
                "Lista de filmes",
                ["controller" => "movies", "action" => "list"],
                ["class" => "btn btn-secondary"]
            ); ?>
        </div>
    </div>

    <?php

    echo $this->Form->create("Movie", ["type" => "file"]);

    echo $this->Form->input("category_id", [
        "label" => ["text" => "Categoria", "class" => "form-label"],
        "class" => "form-select",
        "div" => ["class" => "mb-3"],
        "type" => "select",
        "empty" => "Escolha uma categoria",
        "options" => $categories
    ]);

    echo $this->Form->input("title", [
        "label" => ["text" => "Título", "class" => "form-label"],
        "class" => "form-control",
        "maxlength" => "255",
        "div" => ["class" => "mb-3"]
    ]);

    echo $this->Form->file("new_cover", [
        "accept" => "image/png, image/jpeg",
        "class" => "form-control mb-3"
    ]);

    echo $this->Form->input("synopsis", [
        "label" => ["text" => "Sinopse", "class" => "form-label"],
        "class" => "form-control",
        "maxlength" => "600",
        "div" => ["class" => "mb-3"],
        "rows" => "3"
    ]);

    echo $this->Form->input("id", ["type" => "hidden"]);
    echo $this->Form->input("cover", ["type" => "hidden"]);

    echo $this->Form->submit("Atualizar", ["class" => "btn btn-primary"]);

    echo $this->Form->end();

    ?>
</main>
