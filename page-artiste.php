<?php

$id = $_GET['id'] ?? '';
$title = 'artiste';
require_once './partials/header.php';
require_once './partials/ariane.php';

if (isset($id) && $id != '') {
    $query = $db->prepare('SELECT * FROM picture WHERE user_iduser = :id ORDER BY RAND() LIMIT 6');
    $query->execute([':id' => $id]);
    $pictures = $query->fetchAll();

    $query2 = $db->prepare('SELECT * FROM user WHERE iduser = :id');
    $query2->execute([':id' => $id]);
    $author = $query2->fetch();

    $query3 = $db->prepare('SELECT * FROM network WHERE user_iduser = :id');
    $query3->execute([':id' => $id]);
    $networks = $query3->fetchAll();
?>
    <div class="artiste">
        <div class="banner">
            <div class="authorname"><?= $author['artist_name'] ?></div>
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
            <?php
                if(isset($networks)){
                    foreach($networks as $network){
                        if($network['network_name'] == 'instagram'){?>
                            <div class="instagram"><a href="<?=$network['network_path']?>"><img src="./assets/icons/networks/instagram.png" alt="instagram logo"></a></div>
                        <?php }
                        elseif($network['network_name'] == 'personal'){?>
                            <div class="personal"><a href="<?=$network['network_path']?>"><img src="./assets/icons/networks/personal.png" alt="logo"></a></div>
                        <?php }
                        elseif($network['network_name'] == 'pexels'){?>
                            <div class="pexels"><a href="<?=$network['network_path']?>"><img src="./assets/icons/networks/pexels.png" alt="pexels logo"></a></div>
                        <?php }

                    }
                }
            ?>
        </div>

        <div class="galerie">

            <?php foreach ($pictures as $picture) { ?>
                <figure>
                    <img src="./assets/banqueimg/<?= $picture['cover'] ?>" alt="<?= $picture['cover'] ?>">
                    <figcaption>
                        <div><?= $picture['title'] ?></div>
                        <div class="price"><a href="./pa-blocprev.php?id=<?= $picture['idpicture'] ?>"><?= $picture['price'] ?> €</a></div>
                    </figcaption>
                </figure>
            <?php } ?>

        </div>
    </div>
    <?php } else {
    $allartists = $db->query('SELECT * FROM user WHERE user.role = "artist"')->fetchAll();
    //var_dump($allartists);
?> <div class="presentation"> <?php
    foreach ($allartists as $artist) { 
        $cover = $db->query('SELECT * FROM picture WHERE user_iduser = '.$artist['iduser'].' ORDER BY RAND()')->fetch();
        ?>    
            <div class="bloc">
                <img src="./assets/banqueimg/<?= $cover['cover'] ?>" alt="">
                <a href="./page-artiste.php?id=<?= $artist['iduser'] ?>"><?= $artist['artist_name'] ?></a>
            </div>
        
<?php
    } ?>
    </div>
    <?php
}
?>

<?php require_once './partials/footer.php'; ?>

</body>

</html>