<?php

class Article
{
    private $id;
    private $name;
    private $description;
    private $price;
    private $weight;
    private $image;
    private $stock;
    private $for_sale;
    private $Categories_id;


    public function __construct($id, $name, $description, $price, $weight, $image, $stock, $for_sale, $Categories_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->weight = $weight;
        $this->image = $image;
        $this->stock = $stock;
        $this->for_sale = $for_sale;
        $this->Categories_id = $Categories_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }


    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }


    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }


    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }


    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }


    public function getForSale()
    {
        return $this->for_sale;
    }

    public function setForSale($for_Sale)
    {
        $this->for_sale = $for_Sale;
    }


    public function getCategory()
    {
        return $this->Categories_id;
    }

    public function setCategory($Categories_id)
    {
        $this->Categories_id = $Categories_id;
    }
}


class Catalogue
{
    public $cat = [];

    public function __construct($list)
    {
        foreach ($list as $newArticle) {

            if (isset($newArticle['styleChaussures'])) {

                $Article = new Chaussures($newArticle['id'], $newArticle['name'], $newArticle['description'], $newArticle['price'], $newArticle['weight'], $newArticle['image'], $newArticle['stock'], $newArticle['for_sale'], $newArticle['Categories_id'], $newArticle['styleChaussures']);

            } elseif (isset($newArticle['styleVetement'])) {
                $Article = new Vetements($newArticle['id'], $newArticle['name'], $newArticle['description'], $newArticle['price'], $newArticle['weight'], $newArticle['image'], $newArticle['stock'], $newArticle['for_sale'], $newArticle['Categories_id'], $newArticle['styleVetement']);
            } else {
                $Article = new Article($newArticle['id'], $newArticle['name'], $newArticle['description'], $newArticle['price'], $newArticle['weight'], $newArticle['image'], $newArticle['stock'], $newArticle['for_sale'], $newArticle['Categories_id']);
            }
            $this->cat[] = $Article;

        }

    }


    public function getCat()
    {
        return $this->cat;
    }
}

class Client
{
    private $id;
    private $name;
    private $email;
    private $adress;
    private $postal_code;
    private $city;

    public function __construct($id, $name, $email, $adress, $postal_code, $city)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->adress = $adress;
        $this->postal_code = $postal_code;
        $this->city = $city;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getAdress()
    {
        return $this->adress;
    }

    public function setAdress($adress)
    {
        $this->adress = $adress;
    }


    public function getPostalCode()
    {
        return $this->postal_code;
    }

    public function setPostalCode($postal_code)
    {
        $this->postal_code = $postal_code;
    }


    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }


}

class ListeClients
{
    public $cat_clients = [];

    public function __construct($list)
    {
        foreach ($list as $newClient) {
            $client = new Client($newClient['id'], $newClient['name'], $newClient['email'], $newClient['adress'], $newClient['postal_code'], $newClient['city']);
            $this->cat_clients[] = $client;
        }
    }

    public function getCli()
    {
        return $this->cat_clients;
    }
}

class Chaussures extends Article
{
    protected $styleChaussures;

    public function __construct($id, $name, $description, $price, $weight, $image, $stock, $for_sale, $Categories_id, $styleChaussures)
    {
        parent::__construct($id, $name, $description, $price, $weight, $image, $stock, $for_sale, $Categories_id);
        $this->styleChaussures = $styleChaussures;
    }

    public function getStyleChaussures()
    {
        return $this->styleChaussures;
    }

    public function setStyleChaussures($styleChaussures)
    {
        $this->styleChaussures = $styleChaussures;
    }

}

class Vetements extends Article
{
    protected $styleVetements;

    public function __construct($id, $name, $description, $price, $weight, $image, $stock, $for_sale, $Categories_id, $styleVetements)
    {
        parent::__construct($id, $name, $description, $price, $weight, $image, $stock, $for_sale, $Categories_id);
        $this->styleVetements = $styleVetements;
    }


    public function getStyleVetements()
    {
        return $this->styleVetements;
    }

    public function setStyleVetements($styleVetements)
    {
        $this->styleVetements = $styleVetements;
    }

}
