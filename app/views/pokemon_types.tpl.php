<h2>Pokémons de type <?= $pokemonTypeName->getName() ?></h2>

<section class="type-container">
    
    <?php 
        foreach ($pokemonsByType as $currentPokemon) :
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