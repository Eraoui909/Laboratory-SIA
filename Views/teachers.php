<style>

    .teachers-container{
        width: 100%;
        margin: 0px auto;
        background-color: #EEE;
        padding: 5px;
    }

    .teachers-title{
        font-size: 25px;
        width: fit-content;
        margin: 10px auto;
        font-weight: bold;
        padding: 5px;
    }
    .teachers-content{
        position: relative;
        padding: 15px;
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }


    .teachers-content .card {
        position: relative;
        background: #333;
        width: 250px;
        border-radius: 6px;
        padding: 2rem;
        margin: 30px 50px;
        color: #aaa;
        box-shadow: 0 .25rem .25rem rgba(0, 0, 0, 0.2),
        0 0 1rem rgba(0, 0, 0, 0.2);
        overflow: hidden;
    }
    .card__image-container {
         margin: -2rem -2rem 1rem -2rem;
        background-image: linear-gradient(to left,#6BB5CC,#181818);
     }

    .card__line {
         opacity: 0;
         animation: LineFadeIn .8s .8s forwards ease-in;
     }

    .card__image {
         opacity: 0;
         animation: ImageFadeIn .8s 1.4s forwards;
     }

    .card__title {
         color: white;
         margin-top: 0;
         font-weight: 800;
         letter-spacing: 0.01em;
        font-size: 25px;
     }

    .card__content {
        margin-top: -1rem;
        opacity: 0;
        animation: ContentFadeIn .8s 1.6s forwards;
        color: #d9d9d9;
        text-align: center;
     }
    .card__content h5{
        margin-top: 10px;
    }
    .card__content small{
        color: #bebebe;
        font-size: 10px;
    }

    .card__svg {
         position: absolute;
         left: 0;
         top: 115px;
     }


    @keyframes LineFadeIn {
        0% { opacity: 0; d: path("M 0 300 Q 0 300 0 300 Q 0 300 0 300 C 0 300 0 300 0 300 Q 0 300 0 300 "); stroke: #fff; }
        50% { opacity: 1; d: path("M 0 300 Q 50 300 100 300 Q 250 300 350 300 C 350 300 500 300 650 300 Q 750 300 800 300"); stroke: #888BFF; }
        100% { opacity: 1; d: path("M -2 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 802 400"); stroke: #545581; }
    }

    @keyframes ContentFadeIn {
        0% { transform: translateY(-1rem); opacity: 0; }
        100% { transform: translateY(0); opacity: 1; }
    }

    @keyframes ImageFadeIn {
        0% { transform: translate(-.5rem, -.5rem) scale(1.05); opacity: 0; filter: blur(2px); }
        50% { opacity: 1; filter: blur(2px); }
        100% { transform: translateY(0) scale(1.0); opacity: 1; filter: blur(0); }
    }

</style>


<div class="teachers-container">

    <div class="teachers-title">
        Liste des enseignants
    </div>

    <div class="teachers-content">

        <div class="card">
            <div class="card__image-container">
                <img class="card__image" src="/Storage/uploads/users/avatar.png" width="390px" height="318px" alt="">
            </div>

            <svg class="card__svg" viewBox="0 0 800 500">

                <path d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500" stroke="transparent" fill="#333"/>
                <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="pink" stroke-width="3" fill="transparent"/>
            </svg>

            <div class="card__content">
                <h1 class="card__title">Hamza Eraoui</h1>
                <h5>ELearning,  Data warehouse</h5>
                <small>ahlame.begdouri@usmba.ac.ma</small>
            </div>
        </div>
        <div class="card">
            <div class="card__image-container">
                <img class="card__image" src="/Storage/uploads/users/avatar.png" width="390px" height="318px" alt="">
            </div>

            <svg class="card__svg" viewBox="0 0 800 500">

                <path d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500" stroke="transparent" fill="#333"/>
                <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="pink" stroke-width="3" fill="transparent"/>
            </svg>

            <div class="card__content">
                <h1 class="card__title">Hamza Eraoui</h1>
                <h5>ELearning,  Data warehouse</h5>
                <small>ahlame.begdouri@usmba.ac.ma</small>
            </div>
        </div>
        <div class="card">
            <div class="card__image-container">
                <img class="card__image" src="/Storage/uploads/users/avatar.png" width="390px" height="318px" alt="">
            </div>

            <svg class="card__svg" viewBox="0 0 800 500">

                <path d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500" stroke="transparent" fill="#333"/>
                <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="pink" stroke-width="3" fill="transparent"/>
            </svg>

            <div class="card__content">
                <h1 class="card__title">Hamza Eraoui</h1>
                <h5>ELearning,  Data warehouse</h5>
                <small>ahlame.begdouri@usmba.ac.ma</small>
            </div>
        </div>
        <div class="card">
            <div class="card__image-container">
                <img class="card__image" src="/Storage/uploads/users/avatar.png" width="390px" height="318px" alt="">
            </div>

            <svg class="card__svg" viewBox="0 0 800 500">

                <path d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500" stroke="transparent" fill="#333"/>
                <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="pink" stroke-width="3" fill="transparent"/>
            </svg>

            <div class="card__content">
                <h1 class="card__title">Hamza Eraoui</h1>
                <h5>ELearning,  Data warehouse</h5>
                <small>ahlame.begdouri@usmba.ac.ma</small>
            </div>
        </div>
        <div class="card">
            <div class="card__image-container">
                <img class="card__image" src="/Storage/uploads/users/avatar.png" width="390px" height="318px" alt="">
            </div>

            <svg class="card__svg" viewBox="0 0 800 500">

                <path d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500" stroke="transparent" fill="#333"/>
                <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="pink" stroke-width="3" fill="transparent"/>
            </svg>

            <div class="card__content">
                <h1 class="card__title">Hamza Eraoui</h1>
                <h5>ELearning,  Data warehouse</h5>
                <small>ahlame.begdouri@usmba.ac.ma</small>
            </div>
        </div>
        <div class="card">
            <div class="card__image-container">
                <img class="card__image" src="/Storage/uploads/users/avatar.png" width="390px" height="318px" alt="">
            </div>

            <svg class="card__svg" viewBox="0 0 800 500">

                <path d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500" stroke="transparent" fill="#333"/>
                <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="pink" stroke-width="3" fill="transparent"/>
            </svg>

            <div class="card__content">
                <h1 class="card__title">Hamza Eraoui</h1>
                <h5>ELearning,  Data warehouse</h5>
                <small>ahlame.begdouri@usmba.ac.ma</small>
            </div>
        </div>
        <div class="card">
            <div class="card__image-container">
                <img class="card__image" src="/Storage/uploads/users/avatar.png" width="390px" height="318px" alt="">
            </div>

            <svg class="card__svg" viewBox="0 0 800 500">

                <path d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500" stroke="transparent" fill="#333"/>
                <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="pink" stroke-width="3" fill="transparent"/>
            </svg>

            <div class="card__content">
                <h1 class="card__title">Hamza Eraoui</h1>
                <h5>ELearning,  Data warehouse</h5>
                <small>ahlame.begdouri@usmba.ac.ma</small>
            </div>
        </div>
        <div class="card">
            <div class="card__image-container">
                <img class="card__image" src="/Storage/uploads/users/avatar.png" width="390px" height="318px" alt="">
            </div>

            <svg class="card__svg" viewBox="0 0 800 500">

                <path d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500" stroke="transparent" fill="#333"/>
                <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="pink" stroke-width="3" fill="transparent"/>
            </svg>

            <div class="card__content">
                <h1 class="card__title">Hamza Eraoui</h1>
                <h5>ELearning,  Data warehouse</h5>
                <small>ahlame.begdouri@usmba.ac.ma</small>
            </div>
        </div>
        <div class="card">
            <div class="card__image-container">
                <img class="card__image" src="/Storage/uploads/users/avatar.png" width="390px" height="318px" alt="">
            </div>

            <svg class="card__svg" viewBox="0 0 800 500">

                <path d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500" stroke="transparent" fill="#333"/>
                <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="pink" stroke-width="3" fill="transparent"/>
            </svg>

            <div class="card__content">
                <h1 class="card__title">Hamza Eraoui</h1>
                <h5>ELearning,  Data warehouse</h5>
                <small>ahlame.begdouri@usmba.ac.ma</small>
            </div>
        </div>
        <div class="card">
            <div class="card__image-container">
                <img class="card__image" src="/Storage/uploads/users/avatar.png" width="390px" height="318px" alt="">
            </div>

            <svg class="card__svg" viewBox="0 0 800 500">

                <path d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500" stroke="transparent" fill="#333"/>
                <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="pink" stroke-width="3" fill="transparent"/>
            </svg>

            <div class="card__content">
                <h1 class="card__title">Hamza Eraoui</h1>
                <h5>ELearning,  Data warehouse</h5>
                <small>ahlame.begdouri@usmba.ac.ma</small>
            </div>
        </div>
        <div class="card">
            <div class="card__image-container">
                <img class="card__image" src="/Storage/uploads/users/avatar.png" width="390px" height="318px" alt="">
            </div>

            <svg class="card__svg" viewBox="0 0 800 500">

                <path d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500" stroke="transparent" fill="#333"/>
                <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="pink" stroke-width="3" fill="transparent"/>
            </svg>

            <div class="card__content">
                <h1 class="card__title">Hamza Eraoui</h1>
                <h5>ELearning,  Data warehouse</h5>
                <small>ahlame.begdouri@usmba.ac.ma</small>
            </div>
        </div>
        <div class="card">
            <div class="card__image-container">
                <img class="card__image" src="/Storage/uploads/users/avatar.png" width="390px" height="318px" alt="">
            </div>

            <svg class="card__svg" viewBox="0 0 800 500">

                <path d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500" stroke="transparent" fill="#333"/>
                <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="pink" stroke-width="3" fill="transparent"/>
            </svg>

            <div class="card__content">
                <h1 class="card__title">Hamza Eraoui</h1>
                <h5>ELearning,  Data warehouse</h5>
                <small>ahlame.begdouri@usmba.ac.ma</small>
            </div>
        </div>
        <div class="card">
            <div class="card__image-container">
                <img class="card__image" src="/Storage/uploads/users/avatar.png" width="390px" height="318px" alt="">
            </div>

            <svg class="card__svg" viewBox="0 0 800 500">

                <path d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500" stroke="transparent" fill="#333"/>
                <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="pink" stroke-width="3" fill="transparent"/>
            </svg>

            <div class="card__content">
                <h1 class="card__title">Hamza Eraoui</h1>
                <h5>ELearning,  Data warehouse</h5>
                <small>ahlame.begdouri@usmba.ac.ma</small>
            </div>
        </div>
        <div class="card">
            <div class="card__image-container">
                <img class="card__image" src="/Storage/uploads/users/avatar.png" width="390px" height="318px" alt="">
            </div>

            <svg class="card__svg" viewBox="0 0 800 500">

                <path d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500" stroke="transparent" fill="#333"/>
                <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="pink" stroke-width="3" fill="transparent"/>
            </svg>

            <div class="card__content">
                <h1 class="card__title">Hamza Eraoui</h1>
                <h5>ELearning,  Data warehouse</h5>
                <small>ahlame.begdouri@usmba.ac.ma</small>
            </div>
        </div>
        <div class="card">
            <div class="card__image-container">
                <img class="card__image" src="/Storage/uploads/users/avatar.png" width="390px" height="318px" alt="">
            </div>

            <svg class="card__svg" viewBox="0 0 800 500">

                <path d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500" stroke="transparent" fill="#333"/>
                <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="pink" stroke-width="3" fill="transparent"/>
            </svg>

            <div class="card__content">
                <h1 class="card__title">Hamza Eraoui</h1>
                <h5>ELearning,  Data warehouse</h5>
                <small>ahlame.begdouri@usmba.ac.ma</small>
            </div>
        </div>
        <div class="card">
            <div class="card__image-container">
                <img class="card__image" src="/Storage/uploads/users/avatar.png" width="390px" height="318px" alt="">
            </div>

            <svg class="card__svg" viewBox="0 0 800 500">

                <path d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500" stroke="transparent" fill="#333"/>
                <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="pink" stroke-width="3" fill="transparent"/>
            </svg>

            <div class="card__content">
                <h1 class="card__title">Hamza Eraoui</h1>
                <h5>ELearning,  Data warehouse</h5>
                <small>ahlame.begdouri@usmba.ac.ma</small>
            </div>
        </div>
        <div class="card">
            <div class="card__image-container">
                <img class="card__image" src="/Storage/uploads/users/avatar.png" width="390px" height="318px" alt="">
            </div>

            <svg class="card__svg" viewBox="0 0 800 500">

                <path d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500" stroke="transparent" fill="#333"/>
                <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="pink" stroke-width="3" fill="transparent"/>
            </svg>

            <div class="card__content">
                <h1 class="card__title">Hamza Eraoui</h1>
                <h5>ELearning,  Data warehouse</h5>
                <small>ahlame.begdouri@usmba.ac.ma</small>
            </div>
        </div>
        <div class="card">
            <div class="card__image-container">
                <img class="card__image" src="/Storage/uploads/users/avatar.png" width="390px" height="318px" alt="">
            </div>

            <svg class="card__svg" viewBox="0 0 800 500">

                <path d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500" stroke="transparent" fill="#333"/>
                <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="pink" stroke-width="3" fill="transparent"/>
            </svg>

            <div class="card__content">
                <h1 class="card__title">Hamza Eraoui</h1>
                <h5>ELearning,  Data warehouse</h5>
                <small>ahlame.begdouri@usmba.ac.ma</small>
            </div>
        </div>

    </div>

</div>