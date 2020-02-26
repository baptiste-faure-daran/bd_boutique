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
        $this->name =$name;
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

//$Voyage = new Article(1,'CCI','Bienvenue','10000',2,'false',4,1,4);
//
//var_dump($Voyage);

class Catalogue
{
    public $cat = [];

    public function __construct($bdd)
    {
        $liste = $bdd->query('SELECT * FROM articles')->fetchAll(PDO::FETCH_ASSOC);
        foreach ($liste as $newArticle)
        {
            $Article = new Article($newArticle['id'],$newArticle['name'],$newArticle['description'],$newArticle['price'],$newArticle['weight'],$newArticle['image'],$newArticle['stock'],$newArticle['for_sale'],$newArticle['Categories_id']);
            $this->cat[]=$Article;
        }
    }

    /**
     * @return array
     */
    public function getCat()
    {
        return $this->cat;
    }
}


