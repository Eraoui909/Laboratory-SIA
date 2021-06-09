<?php global $GLOBAL_DIR ?>
<style>
    /***********************/
    /**** Mot de Doyen *****/
    /***********************/

    body{
        background-image: url("<?php echo $GLOBAL_DIR ?>/Storage/statics/images/neural-background.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }

    .mot-container{
        margin: 50px auto;
        width: 80%;
        position: relative;
        background-image: linear-gradient(to right ,#0000000a,white );
        padding: 15px;
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
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam consequuntur cum, dignissimos dolor ducimus ea earum explicabo facere incidunt itaque nostrum ratione, rem sapiente vitae voluptas voluptate voluptatem voluptates.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores assumenda consequuntur distinctio eveniet ex, fugiat hic illo, ipsa molestias neque nobis quam quo rem sed sit sunt ullam veniam veritatis.
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut hic, iste? Aut corporis culpa distinctio dolores eius inventore ipsa ipsam itaque labore necessitatibus, optio qui reprehenderit, rerum, ut velit vitae?
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium eaque et excepturi expedita, explicabo fuga harum illum in libero maiores obcaecati officiis perspiciatis quae saepe sequi suscipit temporibus ullam unde?
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque excepturi id pariatur. Aperiam at, dolorum et facilis hic in inventore, ipsum, nam rem sit suscipit tenetur voluptate? Dignissimos, ducimus itaque.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur distinctio et nam, placeat provident repudiandae? Aliquid consectetur cumque dolor dolores doloribus dolorum, fugiat fugit iusto nemo nihil sequi, sit voluptatum!
        </p>
    </div>

    <div class="mot-signature">
        <h2>Directeur : Pr. Khalid ZENKOUAR</h2>
        <h5>Mail : khalid.zenkouar@usmba.ac.ma</h5>
    </div>
</div>