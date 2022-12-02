src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"
let page = 1;
var fso=new ActiveXObject("Scripting.FileSystemObject")

document.addEventListener("keypress", function(event) {
    key = event.key;
    if (key == 'ArrowLeft'  )
    {
        $('html, body').animate({
            scrollTop: $("div.container").offset().top
        }, 0);
        suivant();
        console.log('page suivante');
    } else if (key == 'ArrowRight' )
    {
        $('html, body').animate({
            scrollTop: $("div.container").offset().top
        }, 0);
        precedent();
        console.log('page précedente');
    }


});
jQuery(document).keydown(function(eventObject)
{
    if (eventObject.which == 37)
    { //fleche gauche
        $('html, body').animate(
            {
                scrollTop: $("div.container").offset().top
            }, 0);
        precedent();
        console.log('page précedente');
    }
    if (eventObject.which == 39)
    { //fleche droite
        $('html, body').animate(
            {
                scrollTop: $("div.container").offset().top
            }, 0);
        suivant();
        console.log('page suivante');
    }
});

object.onkeypress = function(){suivant};

function suivant() {
    if (page == <?php echo $count ?> )
    {
        page == <?php echo $count ?>
    }
else
    {
        page += 1
    }

    changer_page(page);
    console.log("test");
}
function precedent() {
    if (page == 1) {
        page += 0
    } else {
        page -= 1;
    }
    changer_page(page);
}
function changer_page(page) {
    if (page > <?php echo $count ?>)
    {
        let chap = fso.FileExists("<?php $chemin_suivant ?>");
        if (chap)
        {
            document.location.href="main.php?name=<?php echo $_GET['name'] ?>&chap<?= $_GET['chap'] + 1 ?>"
        }
        else
        {
            document.location.href="projet.php?name=<?php echo $_GET['name'] ?>"
        }

    }
else if (page <= 0 && <?php echo $_GET['chap'] ?> != 1)
    {
        document.location.href="main.php?name=<?php echo $_GET['name'] ?>&chap=<?php echo $_GET['chap'] - 1 ?>"
    }
else
    {
        document.getElementById('page').src = '<?php echo $chemin ?>/' + page + '.jpg';
        document.getElementById('numero_de_page').textContent = 'numero de page : ' + page + '/<?php echo $count ?>'
    }
}
