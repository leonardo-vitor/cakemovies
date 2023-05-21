<main class="container mb-5">
    <div class="d-flex justify-content-between mb-5">
        <h1>Mais informações</h1>

        <div>
            <?= $this->Html->link(
                "Catálogo de filmes",
                ["controller" => "movies", "action" => "home"],
                ["class" => "btn btn-primary"]
            ); ?>
        </div>
    </div>

    <?php if ($movie): ?>
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <a href="" class="text-decoration-none">
                    <img src="<?= Router::url("/{$movie["Movie"]["cover"]}", true) ?>"
                         title="<?= $movie["Movie"]["title"] ?>" alt="<?= $movie["Movie"]["title"] ?>"
                         class="mw-100 rounded">
                </a>
            </div>

            <div class="col-12 col-md-8 col-lg-9">
                <h2><?= $movie["Movie"]["title"] ?></h2>
                <p>
                    <button class="btn btn-sm btn-info">
                        <?= $movie["Category"]["name"] ?>
                    </button>
                </p>
                <p><?= $movie["Movie"]["synopsis"] ?></p>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-light" role="alert">
            Ainda não foram adicionados filmes ao
            catálogo, <?= $this->Html->link("clique aqui", ["controller" => "movies", "action" => "add"]) ?> para
            adicionar.
        </div>
    <?php endif; ?>
</main>
