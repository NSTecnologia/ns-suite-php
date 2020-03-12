<?php

class InfEspecie{
    public $tpEspecie;
    public $vEspecie;
}

class DestCTeOS{
    public $CNPJ;
    public $CPF;
    public $IE;
    public $UF;
    public $xNome;
}

class Rem{
    public $CNPJ;
    public $CPF;
    public $IE;
    public $UF;
    public $xNome;
}

class InfGTV{
    public $nDoc;
    public $id;
    public $serie;
    public $subserie;
    public $dEmi;
    public $nDV;
    public $qCarga;
    public $placa;
    public $UF;
    public $RNTRC;
    public $infEspecie;
    public $rem;
    public $dest;
}

class InfGTVReqCTe {
    public $chCTe;
    public $tpAmb;
    public $dhEvento;
    public $nSeqEvento;
    public $infGTV;
}
?>
