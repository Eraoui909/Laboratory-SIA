<?php global $GLOBAL_DIR ?>
<style>
    .teachers-title{
        position: absolute;
        top: 20px;
        background-color: white;
        width: 350px;
        border: 2px solid #6ca5a2;
    }
    }
    .ha-input{
        width: 90% !important;
        border: none !important;
        outline: none !important;
        padding: 5px !important;
    }
    .teachers-title svg{
        position: absolute;
        right: 10px;
        top: 7px;
    }
</style>

<div class="cards-container" style="position: relative">
        <div class="teachers-title">

            <i class="fa fa-search"></i>
            <input type="text" name="filter-teacher" placeholder="Search for teachers.." id="myInput" class="ha-input"  onkeyup="myFilter()"
                   style="
                    width: 90% !important;
                    border: none !important;
                    outline: none !important;
                    padding: 5px !important;">
        </div>

    <?php foreach ($params['person'] as $param){ ?>
    <div class="card">
        <div class="header-card">
            <div class="profile-img">
                <img src="<?php echo $GLOBAL_DIR ?>/Storage/uploads/users/<?= $param['avatar'] ?>" height="100px" style="border-radius: 50%">
            </div>
            <div class="header-content">
                <h3 id="filter-head"><?= $param['prenom'] ." ". $param['nom'] ?></h3>
                <p>software engineer</p>
            </div>
            <br>
            <div class="buttons">
                <span class="more">more <i class="fas fa-chevron-circle-down"></i></span>
            </div>

            <div class="style"></div>
        </div>
        <div class="description">
            <table class="table table-sm" style="width: 90%;border-style: hidden">
                <tr>
                    <td>E-mail: </td>
                    <td><?= $param['email'] ?></td>
                </tr>
                <tr style="border-style: hidden">
                    <td>Thematique: </td>
                    <td><?= $param['thematique'] ?></td>

                </tr>
            </table>
            <a target="_blank" href="<?php echo $GLOBAL_DIR ?>/teacher/cv/downoald?cv=<?= $param['id'] ?>">
					<span class="show-cv">
						Show CV
					</span>
            </a>

        </div>
    </div>
    <?php } ?>
</div>

<script>
    function myFilter() {
            // Declare variables
            let input, filter, card, li, h3, i, txtValue;
            input = document.getElementById('myInput');
            filter = input.value.toUpperCase();
            card = document.querySelectorAll(".card");
            h3 = document.querySelectorAll('#filter-head');


            // Loop through all list items, and hide those who don't match the search query
            for (i = 0; i < h3.length; i++) {
                txtValue = h3[i].textContent || h3[i].innerText;
                console.log( txtValue);
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    card[i].style.display = "";
                } else {
                    card[i].style.display = "none";
                }
            }
    }
</script>