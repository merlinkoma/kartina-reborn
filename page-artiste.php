<?php

$id=$_GET['id'] ?? '';
$title = 'artiste';
require_once './partials/header.php';
require_once './partials/ariane.php'; 


$query = $db->prepare('SELECT * FROM picture WHERE user_iduser = :id ORDER BY RAND() LIMIT 6');
$query->execute([':id' => $id]);
$pictures = $query->fetchAll();

$query2 = $db->prepare('SELECT * FROM user WHERE iduser = :id');
$query2->execute([':id' => $id]);
$author = $query2->fetch();

?>

<div class="artiste">
    <div class="banner">
        <div class="authorname"><?=$author['artist_name']?></div>
        <div class="line"></div>
        <div class="authorcountry">France</div>
        <div class="bio">Biographie de l'artiste. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore
            vitae voluptas sint reiciendis laudantium, nemo in totam sunt soluta minus amet esse repellat, omnis
            dolores aperiam, facilis architecto vel obcaecati.Lorem ipsum dolor sit amet consectetur, adipisicing
            elit. Tempore vitae voluptas sint reiciendis laudantium, nemo in totam sunt soluta minus amet esse
            repellat, omnis dolores aperiam, facilis architecto vel obcaecati.Lorem ipsum dolor sit amet
            consectetur, adipisicing elit. Tempore vitae voluptas sint reiciendis laudantium, nemo in totam sunt
            soluta minus amet esse repellat, omnis dolores aperiam, facilis architecto vel obcaecati.Lorem ipsum
            dolor sit amet consectetur, adipisicing elit. Tempore vitae voluptas sint reiciendis laudantium, nemo in
            totam sunt soluta minus amet esse repellat, omnis dolores aperiam, facilis architecto vel
            obcaecati.Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore vitae voluptas sint
            reiciendis laudantium, nemo in totam sunt soluta minus amet esse repellat, omnis dolores aperiam,
            facilis architecto vel obcaecati.</div>
    </div>

    <div class="line"></div>

    <div class="social">
        <a href=""><i class="fab fa-instagram fa-2x"></i></a>
        <a href=""><i class="fab fa-facebook-f fa-2x"></i></a>
        <a href=""><i class="fab fa-twitter fa-2x"></i> </a>
        <a href=""><i class="fab fa-pinterest fa-2x"></i></a>
        <a href=""><i class="fab fa-flickr fa-2x"></i></a>
    </div>

    <div class="galerie">

    <?php foreach($pictures as $picture){?>
        <figure>
            <img src="./assets/banqueimg/<?=$picture['cover']?>" alt="<?=$picture['cover']?>">
            <figcaption>
                <div><?=$picture['title']?></div>
                <div class="price"><?=$picture['price']?>€</div>
            </figcaption>
        </figure>
    <?php } ?>

    </div>
</div>

<?php require_once './partials/footer.php'; ?>

</body>

</html>