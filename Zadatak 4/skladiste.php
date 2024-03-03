<?php

include 'artikl.php';

class Skladiste {
    private $artikli;

    public function __construct() {

        $this->artikli = array(
            new Artikl ("paprika", 1225.25, 0.89, 0, 0, ""),

        );
    }

    public function ukupnaVrijednostSkladista() {
        $ukupnaVrijednost = 0;

        foreach ($this->artikli as $artikl) {
            $ukupnaVrijednost += $artikl->stanjeSkladiste * $artikl->cijena;
        }

        return $ukupnaVrijednost;
    }

    public function ukupniTrosakDoDatuma($datum) {
        $ukupniTrosak = 0;

        foreach ($this->artikli as $artikl) {

            if ($artikl->krajnjiRokNabave <= $datum) {
                $ukupniTrosak += $artikl->potrebnoNabaviti * $artikl->cijenaUNabavi;
            }
        }

        $ukupniTrosakUSD = $ukupniTrosak * 1.03;

        return $ukupniTrosakUSD;
    }

    public function unosNoveStavke(Artikl $novaStavka) {

        $this->artikli[] = $novaStavka;
    }

    public function unosIzmjeneStanja($nazivArtikla, $novaKolicina) {
        foreach ($this->artikli as &$artikl) {
            if ($artikl->naziv == $nazivArtikla) {
                $artikl->stanjeSkladiste = $novaKolicina;
                break;
            }
        }
    }
}

?>
