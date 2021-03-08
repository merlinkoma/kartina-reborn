<?php
$title = 'artiste';
require_once './partials/header.php';
require_once './partials/ariane.php'; 
?>

<div class="artiste">
    <div class="banner">
        <div class="authorname">Marie Martin</div>
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
        <figure>
            <img src="./assets/banqueimg/filrouge21.jpg" alt="balloon picture">
            <figcaption>
                <div>Montgolfière</div>
                <div class="price">...€</div>
            </figcaption>
        </figure>
        <figure>
            <img src="./assets/banqueimg/filrouge80.jpg" alt="clothespin picture">
            <figcaption>
                <div>Pince à linge</div>
                <div class="price">...€</div>
            </figcaption>
        </figure>
        <figure>
            <img src="./assets/banqueimg/filrouge46.jpg" alt="picture of Nydalahöjden">
            <figcaption>
                <div>Nydalahöjden</div>
                <div class="price">...€</div>
            </figcaption>
        </figure>
        <figure>
            <img src="./assets/banqueimg/filrouge32.jpg" alt="picture of Umeå Universitet">
            <figcaption>
                <div>Umeå Universitet</div>
                <div class="price">...€</div>
            </figcaption>
        </figure>
        <figure>
            <img src="./assets/banqueimg/filrouge47.jpg" alt="picture of Stadsliden">
            <figcaption>
                <div>Stadsliden</div>
                <div class="price">...€</div>
            </figcaption>
        </figure>
        <figure>
            <img src="./assets/banqueimg/filrouge50.jpg" alt="picture of Tomtebo">
            <figcaption>
                <div>Tomtebo</div>
                <div class="price">...€</div>
            </figcaption>
        </figure>
    </div>
</div>

<?php require_once './partials/footer.php'; ?>

</body>

</html>