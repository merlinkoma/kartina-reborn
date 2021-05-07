<?php
$title = 'Activation promotion';

$path = './../';
$paths = './';

require_once './../partials/header.php';

global $db;
$users = $db->query('SELECT * FROM user WHERE request = 1')->fetchAll();

?>

<div class="dashboard-activation" style="display : flex">

    <?php require_once './../partials/dashboard.php'; ?>

    <div class="activation-container">

        <table>
            <thead>
                <tr>
                    <th class="right">ID</th>
                    <th class="right">Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td class="right"><?= $user['iduser']; ?></td>
                        <td class="right"><?= $user['email']; ?></td>
                        <td class="upgrade">
                            <a href="traitement-promotion.php?id=<?= $user['iduser']; ?>">
                                Promouvoir en <?= $user['role'] === 'user' ? 'artist' : 'utilisateur' ?>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once './../partials/footer.php'; ?>