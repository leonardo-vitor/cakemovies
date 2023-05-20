<main class="container mb-5">
    <div class="d-flex justify-content-between mb-5">
        <h1>Filmes cadastrados</h1>

        <div>
            <?= $this->Html->link(
                "Catálogo de filmes",
                ["controller" => "movies", "action" => "home"],
                ["class" => "btn btn-success"]
            ); ?>

            <?= $this->Html->link(
                "Adicionar filme",
                ["controller" => "movies", "action" => "add"],
                ["class" => "btn btn-primary"]
            ); ?>
        </div>
    </div>

    <?php if ($movies): ?>
        <div class="table-responsive">
            <table class="table table-borderless table-hover table-striped">
                <thead class="bg-secondary-subtle">
                <tr>
                    <th>Categoria</th>
                    <th>Título</th>
                    <th>Sinopse</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($movies as $movie): ?>
                    <tr>
                        <td><?= $movie["Category"]["name"] ?></td>
                        <td><?= $this->Text->truncate($movie["Movie"]["title"], 75) ?></td>
                        <td><?= $this->Text->truncate($movie["Movie"]["synopsis"], 75) ?></td>
                        <td>
                            <?= $this->Html->link("Editar", ["action" => "edit", $movie["Movie"]["id"]], ["class" => "btn btn-info btn-sm"]) ?>
                            <?= $this->Form->postLink("Apagar", ["action" => "delete", $movie["Movie"]["id"]], ["confirm" => "Você tem certeza ?", "class" => "btn btn-danger btn-sm"]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php if ($this->Paginator->params()["prevPage"] || $this->Paginator->params()["nextPage"]): ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php
                    echo $this->Paginator->numbers([
                        "class" => "paginator",
                        "tag" => "li",
                        "currentTag" => "a",
                        "separator" => "",
                        "currentClass" => "active"
                    ]);
                    ?>
                </ul>
            </nav>
        <?php endif; ?>
    <?php else: ?>
        <div class="alert alert-light" role="alert">
            Ainda não foram adicionados filmes ao
            catálogo, <?= $this->Html->link("clique aqui", ["controller" => "movies", "action" => "add"]) ?> para
            adicionar.
        </div>
    <?php endif; ?>
</main>
