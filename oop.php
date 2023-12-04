<?php

 interface dataDiri{
     public function label();
 }

abstract class mahasiswa{
  
  public $nama,$npm,$prodi,$usia;
  
  
  public function __construct($nama,$npm,$prodi,$usia){
    $this-> nama = $nama;
    $this-> npm = $npm;
    $this-> prodi = $prodi;
    $this-> usia = $usia;
  }
  
  
  public function setNama($nama){
    $this-> $nama = $nama;
  }
  
  
  public function getNama(){
    return $this->nama;
  }
  
  
  public function setProdi($prodi){
    $this->$prodi = $prodi;
  }
  
  public function getProdi(){
    return $this-> prodi;
  }
  
  public function setNpm($npm){
    $this->$npm = $npm;
  }
  
  public function getNpm(){
    return $this->npm;
  }
  
  
  abstract public function infoLengkap();
  
  
}


class ormawa extends mahasiswa implements dataDiri{
  
  public $organisasi;
  
  public function setOrganisasi($organisasi){
    $this->$organisasi = $organisasi;
  }
  
  public function getOrganisasi(){
    return $this->organisasi;
  }
  
  public function __construct($nama,$npm,$prodi,$usia,$organisasi){
    parent::__construct($nama,$npm,$prodi,$usia);
    $this-> organisasi = $organisasi;
  }

  public function label(){
    $str = "{$this->getProdi()}, {$this->getNpm()}";
    return $str;
  }
    
  public function info(){
     return "{$this->label()} $this->usia";
  }
  
  public function infoLengkap(){
    $lengkap = "{$this->getNama()} | {$this->info()}, {$this->getOrganisasi()}";
    return $lengkap;
  }
  
}

class Hobi extends mahasiswa implements dataDiri{
  public $hobby;
  
  public function setHobby($hobby){
    $this-> $hobby = $hobby;
  }
  
  public function getHobby(){
    return $this-> hobby;
  }
  
  public function __construct($nama,$npm,$prodi,$usia,$hobby){
    parent::__construct($nama,$npm,$prodi,$usia);
    $this-> hobby = $hobby;
  }

  public function label(){
    $str = "{$this->getProdi()}, {$this->getNpm()}";
    return $str;
  }
    
  public function info(){
     return "{$this->label()} $this->usia";
  }
  
  public function infoLengkap(){
    $lengkap = "{$this->getNama()} | {$this->info()}, {$this->getHobby()}";
    return $lengkap;
  }
  
  
}


$Mahasiswa = new ormawa("wildan", "01", "Tekni Informatika", 20, "litbang");
echo $Mahasiswa->infoLengkap().PHP_EOL;

$Mahasiswa2 = new Hobi("wildan", "01", "Tekni Informatika", 20, "ngoding");
echo $Mahasiswa2->infoLengkap();


?>