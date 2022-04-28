<section>
    <?= var_dump($pokeData) ?>
    <?= var_dump($pokeType) ?>

    <h2>Détails de <?= $pokeData->getNom() ?></h2>
        
    <div class="container">            

        <div class="pokemon-img">
            <img src="<?= $absoluteUrl ?>/img/<?= $pokeData->getNumero() ?>.png" alt="">    
        </div>

        <div class="pokemon-info">

            <h3>
                #<?= $pokeData->getNumero() ?> <?= $pokeData->getNom() ?>
            </h3>

            <div class="pokemon-types">
                <?php foreach ($pokeType as $type) : ?>
                <button type="button" class="btn" style="background-color: #<?= $type->getColor() ?>">
                    <a href="<?= $absoluteUrl ?>/pokedex/types/<?= $type->getId() ?>">
                        <?= $type->getName() ?>
                    </a>
                </button>
                <?php endforeach; ?>
            </div>

            <h4>Statistiques</h4>

            <div class="stats">

                <div class="stat pv">
                    <div class="stat-title">PV</div>
                    <div class="stat-number"><?= $pokeData->getPV() ?></div>
                    <progress class="progress" value="<?= $pokeData->getPV() ?>" max="255">
                </div>

                <div class="stat attaque">
                    <div class="stat-title">Attaque</div>
                    <div class="stat-number">
                        <?= $pokeData->getAttaque() ?>
                    </div>
                    <progress class="progress" value="<?= $pokeData->getAttaque() ?>" max="255">
                </div>
                <div class="stat defense">
                    <div class="stat-title">Défense</div>
                    <div class="stat-number">
                        <?= $pokeData->getDefense() ?>
                    </div>
                    <progress class="progress" value="<?= $pokeData->getDefense() ?>" max="255">
                </div>
                <div class="stat attaque-spe">
                    <div class="stat-title">Attaque Spé.</div>
                    <div class="stat-number">
                        <?= $pokeData->getAttaque_spe() ?>
                    </div>
                    <progress class="progress" value="<?= $pokeData->getAttaque_spe() ?>" max="255">
                </div>
                <div class="stat defense-spe">
                    <div class="stat-title">Défense spé.</div>
                    <div class="stat-number">
                        <?= $pokeData->getDefense_spe() ?>
                    </div>
                    <progress class="progress" value="<?= $pokeData->getDefense_spe() ?>" max="255">
                </div>
                <div class="stat vitesse">
                    <div class="stat-title">Vitesse</div>
                    <div class="stat-number">
                        <?= $pokeData->getVitesse() ?>
                    </div>
                    <progress class="progress" value="<?= $pokeData->getVitesse() ?>" max="255">
                </div>
            </div>
                    
        </div>
    </div>

</section>