<section class="poke-container">

    <?php
        foreach ($pokemons as $currentPokemon) :
    ?>
    <div class="poke-element">

        <a href="<?= $router->generate('details', ['numero' => $currentPokemon->getNumero()]) ?>" class="pokemonDetail">

            <img src="<?= $absoluteUrl ?>/img/<?= $currentPokemon->getNumero() ?>.png" alt="">
            <div>
                <h4>
                    #<?= $currentPokemon->getNumero() ?> <?= $currentPokemon->getNom() ?>
                </h4>
            </div>

        </a>
    </div>

    <?php endforeach ?>

</section>
