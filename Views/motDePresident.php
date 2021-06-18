<?php global $GLOBAL_DIR ?>
<style>
    /***********************/
    /**** Mot de Doyen *****/
    /***********************/

    body{
        background-repeat: no-repeat;
        background-size: cover;
        background-image: linear-gradient(to bottom , #7ab7cb, #7eb9cb,white, white,white,white );
    }

    .mot-container{
        margin: 50px auto;
        width: 80%;
        position: relative;
        background-image: linear-gradient(to right ,#0000000a,white );
        padding: 15px;
        background-color: rgba(255, 255, 255, 0.73);

    }

    .mot-container h1 {
        padding: 5px;
        text-align: center;
        margin-top: 80px;
    }

    .mot-title{
        display: flex;
        justify-content: space-between;
        margin-top: -118px;
    }

    @media only screen and (max-width: 700px) {
        .mot-title{
            margin-top: 0px;
            position: relative;
            left: 20%;
        }
    }

    .mot-content{
        padding: 10px;
    }

    .mot-content p{
        text-indent: 36px;
        text-align: justify;
        letter-spacing: 1px;
        margin-top: 10px;
        /* font-size: .9em; */
        font-family: -webkit-pictograph;
    }

    .mot-signature {
        /* text-align: center; */
        padding: 0 24px;
    }

    h2 {
        margin-top: -5px;
    }

    h2, h5 {
        font-size: 1.1em;
        color: #000000;
    }
</style>

<div class="mot-container">
    <h1>Mot de president</h1>
    <div class="mot-title">
        <div>
            <img src="<?php echo $GLOBAL_DIR ?>/Storage/uploads/users/avatar.png" width="150px" height="150px" alt="photo_de_president">
        </div>
        <div >
        </div>
    </div>

    <div class="mot-content">
        <p>
            Le laboratoire LSIA (Laboratoire des Systèmes Intelligents & Applications) a été accrédité la première fois en 2011 au sein de la Faculté des Sciences et Techniques de Fès, CED Sciences et Techniques de l’Ingénieur, Université Sidi Mohammed Ben Abdellah.
            Il est composé de 18 enseignants chercheurs permanents et 40 doctorants.
        </p>
        <p>
            Le laboratoire LSIA a pour ambition de faire des progrès scientifiques et techniques dans des domaines de prédilection tels que : l’intelligence artificielle,
            machine learning, reconnaissance des formes, le Big Data, Cloud Computing, Data Mining, Cryptographie et sécurité informatique. Ensuite, appliquer ces
            progrès pour résoudre des problèmes concrets. C’est dans cette optique que s’inscrit le projet SIS (Systèmes Intelligents au service de la Société), qui est le
            projet fédérateur de notre laboratoire pour la nouvelle période d’accréditation (2020-2025). Ce projet SIS a pour finalité principale de promouvoir, de faciliter et
            de coordonner les activités de recherche scientifique de ses membres pour mettre en place des solutions intelligentes dans les domaines de la valorisation du
            patrimoine, de la santé (E-health), des systèmes de transport intelligents et des réseaux d’assainissement urbain
        </p>
    </div>

    <div class="mot-signature">
        <h2>Directeur : Pr. Khalid ZENKOUAR</h2>
        <h5>Mail : khalid.zenkouar@usmba.ac.ma</h5>
    </div>
</div>