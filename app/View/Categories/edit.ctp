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

    echo $this->Form->create("Category");

    echo $this->Form->input("name", [
        "label" => ["text" => "Nome", "class" => "form-label"],
        "class" => "form-control",
        "maxlength" => "255",
        "div" => ["class" => "mb-3"]
    ]);

    echo $this->Form->input("id", ["type" => "hidden"]);

    echo $this->Form->submit("Atualizar", ["class" => "btn btn-primary"]);

    echo $this->Form->end();

    ?>
</main>
