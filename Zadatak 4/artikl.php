<?php

class Artikl {
    public $id;
    public $naziv;
    public $stanjeSkladiste;
    public $cijena;
    public $potrebnoNabaviti;
    public $cijenaUNabavi;
    public $krajnjiRokNabave;

    public function __construct($id, $naziv, $stanjeSkladiste, $cijena, $potrebnoNabaviti, $cijenaUNabavi, $krajnjiRokNabave) {
        $this->id = $id;
        $this->naziv = $naziv;
        $this->stanjeSkladiste = $stanjeSkladiste;
        $this->cijena = $cijena;
        $this->potrebnoNabaviti = $potrebnoNabaviti;
        $this->cijenaUNabavi = $cijenaUNabavi;
        $this->krajnjiRokNabave = $krajnjiRokNabave;
    }
}

?>