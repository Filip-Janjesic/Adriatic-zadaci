<?php

include 'artikl.php';

class Skladiste {
    private $artikli;
    private $database;

    public function __construct($database) {
        $this->artikli = array(
            new Artikl(1,"paprika", 1225.25, 0.89, 0, 0, ""),
            new Artikl(2,"krumpir crveni", 600, 0.57, 3000, 0.35, "2024-08-24"),
            new Artikl(3,"krumpir žuti", 0, NULL, 1200, 0.48, "2024-06-12"),
            new Artikl(4,"krumpir mladi", 260.83, 0.94, 6500, 0.50, "2024-04-15"),
            new Artikl(5,"žarulja 20W", 250, 2.74, 300, 1.25, "2024-04-20")
        );
        $this->database = $database;
    }

    public function ukupnaVrijednostSkladista() {
        $ukupnaVrijednost = 0;

        foreach ($this->artikli as $artikl) {
            $ukupnaVrijednost += $artikl->stanjeSkladiste * $artikl->cijena;
        }

        return $ukupnaVrijednost;
    }

    public function ukupniTrosakDoDatumaUSD($datum) {
        $ukupniTrosak = 0;

        foreach ($this->artikli as $artikl) {
            if ($artikl->krajnjiRokNabave <= $datum) {
                $ukupniTrosak += $artikl->potrebnoNabaviti * $artikl->cijenaUNabavi;
            }
        }

        $ukupniTrosakUSD = $ukupniTrosak * 1.03;

        return $ukupniTrosakUSD;
    }

    public function unosNoveStavkeUBazu(Artikl $novaStavka) {
        $this->artikli[] = $novaStavka;
        $this->insertIntoDatabase($novaStavka);
    }

    public function unosIzmjeneStanjaUBazu($nazivArtikla, $novaKolicina) {
        foreach ($this->artikli as &$artikl) {
            if ($artikl->naziv == $nazivArtikla) {
                $artikl->stanjeSkladiste = $novaKolicina;
                $this->updateDatabase($artikl->naziv, $artikl->stanjeSkladiste);
                break;
            }
        }
    }

    public function getArtikli() {
        return $this->artikli;
    }

    private function insertIntoDatabase(Artikl $novaStavka) {
        $query = "INSERT INTO artikli (naziv, stanjeSkladiste, cijena, potrebnoNabaviti, cijenaUNabavi, krajnjiRokNabave) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->database->prepare($query);
        $stmt->bind_param("sddddss", $novaStavka->naziv, $novaStavka->stanjeSkladiste, $novaStavka->cijena, $novaStavka->potrebnoNabaviti, $novaStavka->cijenaUNabavi, $novaStavka->krajnjiRokNabave);
        $stmt->execute();
        $stmt->close();
    }

    private function updateDatabase($nazivArtikla, $stanjeSkladiste) {
        $query = "UPDATE artikli SET stanjeSkladiste = ? WHERE naziv = ?";
        $stmt = $this->database->prepare($query);
        $stmt->bind_param("ds", $stanjeSkladiste, $nazivArtikla);
        $stmt->execute();
        $stmt->close();
    }
}

?>
