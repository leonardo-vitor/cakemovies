<main class="container mb-5">
    <div class="d-flex justify-content-between mb-5">
        <h1>Catálogo de filmes</h1>

        <div>
            <?= $this->Html->link(
                "Meus filmes",
                ["controller" => "movies", "action" => "list"],
                ["class" => "btn btn-primary"]
            ); ?>
        </div>
    </div>

    <?php if ($movies): ?>
        <div class="row">
            <?php foreach ($movies as $movie): ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <a href="">
                        <img src="<?= Router::url("/{$movie["Movie"]["cover"]}", true) ?>"
                             title="<?= $movie["Movie"]["title"] ?>" alt="<?= $movie["Movie"]["title"] ?>"
                             class="mw-100">
                    </a>

                </div>
            <?php endforeach; ?>
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
