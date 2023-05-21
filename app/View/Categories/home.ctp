<main class="container mb-5">
    <div class="d-flex justify-content-between mb-5">
        <h1>Categorias Cadastradas</h1>

        <div>
            <?= $this->Html->link(
                "Lista de filmes",
                ["controller" => "movies", "action" => "list"],
                ["class" => "btn btn-primary"]
            ); ?>

            <?= $this->Html->link(
                "Adicionar categoria",
                ["controller" => "categories", "action" => "add"],
                ["class" => "btn btn-secondary"]
            ); ?>
        </div>
    </div>

    <?php if ($categories): ?>
        <div class="table-responsive">
            <table class="table table-borderless table-hover table-striped">
                <thead class="bg-secondary-subtle">
                <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?= $category["Category"]["id"] ?></td>
                        <td><?= $category["Category"]["name"] ?></td>
                        <td>
                            <?= $this->Html->link("Editar", ["action" => "edit", $category["Category"]["id"]], ["class" => "btn btn-info btn-sm"]) ?>
                            <?= $this->Form->postLink("Apagar", ["action" => "delete", $category["Category"]["id"]], ["confirm" => "Você tem certeza ?", "class" => "btn btn-danger btn-sm"]) ?>
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
            Ainda não foram adicionados categorias ao
            catálogo, <?= $this->Html->link("clique aqui", ["controller" => "categories", "action" => "add"]) ?> para
            adicionar.
        </div>
    <?php endif; ?>

</main>
