<?php

require(__DIR__ . '/../connec.php');

function connect():PDO
{
    return $pdo = new PDO(DSN,USER,PASS);
}

function printData():array
{
    $pdo=connect();
    $query = 'SELECT * FROM bribe ORDER BY name';
    $statement = $pdo->query($query);
    return $tabName = $statement->fetchAll(PDO::FETCH_ASSOC);
}

function printDataLetter($letter):array
{
    $pdo=connect();
    $query = 'SELECT * FROM bribe  WHERE name LIKE :letter ORDER BY name';
    $statement=$pdo->prepare($query);
    $statement->bindValue(':letter', $letter . '%',PDO::PARAM_STR);
    $statement->execute();
    return $tabName = $statement->fetchAll(PDO::FETCH_ASSOC);
}



function addData($name, $payment):void
{
    $pdo=connect();
    $query = 'INSERT INTO bribe(name,payment) VALUES (:name,:payment)';
    $statement=$pdo->prepare($query);
    $statement->bindValue(':name',$name);
    $statement->bindValue(':payment',$payment);
    $statement->execute();
}

