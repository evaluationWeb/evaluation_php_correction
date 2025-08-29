<?php
    function saveBook(array $book) : void {
        try {
            $request = "INSERT INTO book(title, description, author, publication_date, id_users, id_category)
            VALUE(?,?,?,?,?,?)";
            $req = connectBDD()->prepare($request);
            $req->bindParam(1, $book["title"], PDO::PARAM_STR);
            $req->bindParam(2, $book["description"], PDO::PARAM_STR);
            $req->bindParam(3, $book["author"], PDO::PARAM_STR);
            $req->bindParam(4, $book["publicationDate"], PDO::PARAM_STR);
            $req->bindParam(5, $book["idUser"], PDO::PARAM_INT);
            $req->bindParam(6, $book["category"], PDO::PARAM_INT);
            $req->execute();
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    function findAllBook(int $idUser) : array {
        try {
            $request = "SELECT b.id_book, b.title, b.description, b.publication_date, b.author, c.name, u.id_users FROM book AS b
            INNER JOIN category AS c ON b.id_category = c.id_category
            INNER JOIN users AS u ON b.id_users = u.id_users WHERE b.id_users = ? ORDER BY b.title";
            $req = connectBDD()->prepare($request);
            $req->bindParam(1, $idUser, PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
?>