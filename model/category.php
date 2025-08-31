<?php
    /**
     * Méthode qui retourne la liste des category
     * @return array retourne un tableu de category
     */
    function findAllCategory(): array
    {
        try {
            $request = "SELECT c.id_category, c.name FROM category AS c ORDER BY c.name";
            $req = connectBDD()->prepare($request);
            $req->execute();
            return $req->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
?>
