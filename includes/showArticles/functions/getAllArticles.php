<?php 

function getAllArticles($pdo){

    try{
        $query = 'SELECT * FROM articles';

        $statement = $pdo->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    catch(PDOException $e){
        die('Query failed ' . $e->getMessage());
    }
}