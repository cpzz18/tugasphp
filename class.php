<?php

class Descriptor {
    public static function describe($bangun_datar) {
        if ($bangun_datar instanceof Lingkaran) {
            $jenis = "Lingkaran";
        } elseif ($bangun_datar instanceof Persegi) {
            $jenis = "Persegi";
        } elseif ($bangun_datar instanceof PersegiPanjang) {
            $jenis = "Persegi Panjang";
        } else {
            throw new Exception("Objek bukan instance dari Lingkaran, Persegi, atau PersegiPanjang");
        }

        $luas = $bangun_datar->area();
        $keliling = $bangun_datar->circumference();

        echo "Bangun datar ini adalah $jenis yang memiliki luas $luas dan keliling $keliling.\n";
    }
}

abstract class BangunDatar {
    abstract public function area();
    abstract public function circumference();
    abstract public function enlarge($scale);
    abstract public function shrink($scale);
}

class Lingkaran extends BangunDatar {
    private $jari_jari;

    public function __construct($jari_jari) {
        $this->jari_jari = $jari_jari;
    }

    public function area() {
        return pi() * pow($this->jari_jari, 2);
    }

    public function circumference() {
        return 2 * pi() * $this->jari_jari;
    }

    public function enlarge($scale) {
        $this->jari_jari *= $scale;
    }

    public function shrink($scale) {
        $this->jari_jari /= $scale;
    }
}

class Persegi extends BangunDatar {
    private $sisi;

    public function __construct($sisi) {
        $this->sisi = $sisi;
    }

    public function area() {
        return pow($this->sisi, 2);
    }

    public function circumference() {
        return 4 * $this->sisi;
    }

    public function enlarge($scale) {
        $this->sisi *= $scale;
    }

    public function shrink($scale) {
        $this->sisi /= $scale;
    }
}

class PersegiPanjang extends BangunDatar {
    private $panjang;
    private $lebar;

    public function __construct($panjang, $lebar) {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    public function area() {
        return $this->panjang * $this->lebar;
    }

    public function circumference() {
        return 2 * ($this->panjang + $this->lebar);
    }

    public function enlarge($scale) {
        $this->panjang *= $scale;
        $this->lebar *= $scale;
    }

    public function shrink($scale) {
        $this->panjang /= $scale;
        $this->lebar /= $scale;
    }
}

// contoh pengunaan
$lingkaran = new Lingkaran(5);
$persegi = new Persegi(4);
$persegi_panjang = new PersegiPanjang(3, 6);

Descriptor::describe($lingkaran);
Descriptor::describe($persegi);
Descriptor::describe($persegi_panjang);

?>
