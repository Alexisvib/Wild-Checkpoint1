<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/book.css">
    <title>Checkpoint PHP 1</title>
</head>
<body>

<?php include 'model.php' ?>
<?php include 'header.php'; ?>
<?php $names=printData() ;?>
<?php $total = 0 ;?>
<?php $alphabeticIndex = range('A','Z') ;?>


<main class="container">
    <section class="index-container">
        <?php foreach ($alphabeticIndex as $letter): ?>
        <a href="?letter=<?= $letter ?>"><div class="letter"><?= $letter ?></div></a>
        <?php endforeach;?>
    </section>
    <section class="desktop">
        <div class="bloc-glass">
            <img src="image/whisky.png" alt="a whisky glass" class="whisky"/>
            <img src="image/empty_whisky.png" alt="an empty whisky glass" class="empty-whisky"/>
            <div class="bloc"></div>
        </div>
        <div class="pages">
            <div class="page leftpage">
                Add a bribe
                <form method="post" action="add.php">
                    <label  for="name">Nom :</label>
                    <input type="text" id="name" name="name" required maxlength="255">
                    <label  for="payment">Payment :</label>
                    <input type="number" id="payment" name="payment">
                    <button>PAY !</button>
                </form>
                <?php if(isset($_GET['Empty_Field'])):?>
                <p class="red alert"> Alert : Fields Name and Payment should be fill ! </p>
                <?php endif; ?>

                <?php if(isset($_GET['Negative_Payment'])):?>
                    <p class="red alert"> Alert : Payment could not be Negative !! </p>
                <?php endif; ?>

                <?php if(isset($_GET['Eliott_Ness'])):?>
                    <p class="red alert"> Alert : This man is untouchable !!!! </p>
                <?php endif; ?>


                <?php if(isset($_GET['data_add'])):?>
                    <p class="green alert"> Name added to the list ! </p>
                <?php endif; ?>
            </div>

            <div class="page rightpage">
                <?php if(isset($_GET['letter'])):?>
                <h2><?=$_GET['letter'];?></h2>
                <hr>
                <?php endif ?>

                <table>
                    <thead>
                    <tr>
                        <td> Name </td>
                        <td> Payment </td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(empty($_GET)):?>
                        <?php foreach ($names as $name): ?>
                            <tr>
                                <td><?=$name['name'];?></td>
                                <td><?=$name['payment'];?></td>
                                <?php $total+=intval($name['payment']);?>
                            </tr>
                        <?php endforeach;?>
                    <?php endif ?>
                    <?php if(isset($_GET['letter'])):?>
                    <?php $names = printDataLetter($_GET['letter']); ?>
                        <?php foreach ($names as $name): ?>
                            <tr>
                                <td><?=$name['name'];?></td>
                                <td><?=$name['payment'];?></td>
                                <?php $total+=intval($name['payment']);?>
                            </tr>
                        <?php endforeach;?>
                    <?php endif ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td> Total : </td>
                            <td><?= $total?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="bloc-inkpen">
            <div class="bloc"></div>
            <img src="image/inkpen.png" alt="an ink pen" class="inkpen"/>
        </div>
    </section>
</main>
</body>
</html>
