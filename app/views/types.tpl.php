<section>
    <p>Cliquez sur un type pour voir tous les Pokémon de ce type</p>
    <div class="buttons">
        <?php foreach ($types as $type) : ?>
            <button type="button" class="btn types" style="background-color : #<?= $type->getColor() ?>">
                <a href="<?= $absoluteUrl ?>/pokedex/types/<?= $type->getId() ?>">
                    <?= $type->getName() ?>
                </a>
            </button>
        <?php endforeach; ?>
    </div>
</section>