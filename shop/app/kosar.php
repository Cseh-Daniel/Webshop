<?php

namespace App;


class kosar
{
    public $aruk=null;
    public $teljesdb=0;
    public $teljesar=0;

public function __construct($regikosar){
  if ($regikosar) {
    $this->aruk=$regikosar->aruk;
    $this->teljesdb=$regikosar->teljesdb;
    $this->teljesar=$regikosar->teljesar;
  }
}

  public function add($aru,$id){

    $taroltaru=["db"=>0,"ar"=> $aru->ar,"aru"=>$aru];
if ($this->aruk) {
  if (array_key_exists($id,$this->aruk)) {
    $taroltaru=$this->aruk[$id];
  }
}
$taroltaru["db"]++;
$taroltaru["ar"]=$aru->ar*$taroltaru["db"];
$this->aruk[$id]=$taroltaru;
$this->teljesdb++;
$this->teljesar+=$aru->ar;
  }

}
