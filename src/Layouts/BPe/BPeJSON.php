<?php
    class Ide {
        public $cUF; //String
        public $tpAmb; //String
        public $mod; //String
        public $serie; //String
        public $nBP; //String
        public $cBP; //String
        public $cDV; //String
        public $modal; //String
        public $dhEmi; //String
        public $tpEmis; //String
        public $verProc; //String
        public $tpBPe; //String
        public $indPres; //String
        public $UFIni; //String
        public $cMunIni; //String
        public $UFFim; //String
        public $cMunFim; //String
        public $chCont; //String
        public $xJust; //String
    }

    class EnderEmit {
        public $xLgr; //String
        public $nro; //String
        public $xCpl; //String
        public $xBairro; //String
        public $cMun; //String
        public $xMun; //String
        public $CEP; //String
        public $UF; //String
        public $fone; //String
        public $email; //String
    }

    class Emit {
        public $CNPJ; //String
        public $IE; //String
        public $IEST; //String
        public $xNome; //String
        public $xFant; //String
        public $IM; //String
        public $CNAE; //String
        public $CRT; //String
        public $enderEmit; //EnderEmit
        public $TAR; //String
    }

    class EnderComp {
        public $xLgr; //String
        public $nro; //String
        public $xCpl; //String
        public $xBairro; //String
        public $cMun; //String
        public $xMun; //String
        public $CEP; //String
        public $UF; //String
        public $cPais; //String
        public $xPais; //String
        public $fone; //String
        public $email; //String
        
    }

    class Comp {
        public $xNome; //String
        public $CNPJ; //String
        public $CPF; //String
        public $idEstrangeiro; //String
        public $IE; //String
        public $enderComp; //EnderComp
        public $tpComp; //String
        public $vComp; //String	
    }

    class EnderAgencia {
        public $xLgr; //String
        public $nro; //String
        public $xCpl; //String
        public $xBairro; //String
        public $cMun; //String
        public $xMun; //String
        public $CEP; //String
        public $UF; //String
        public $fone; //String
        public $email; //String
    }

    class Agencia {
        public $xNome; //String
        public $CNPJ; //String
        public $enderAgencia; //EnderAgencia
    }

    class InfBPeSub {
        public $chBPe; //String
        public $tpSub; //String
    }

    class InfPassageiro {
        public $xNome; //String
        public $CNPJ; //String
        public $CPF; //String
        public $tpDoc; //String
        public $nDoc; //String
        public $dNasc; //String
        public $fone; //String
        public $email; //String
    }

    class InfPassagem {
        public $cLocOrig; //String
        public $xLocOrig; //String
        public $cLocDest; //String
        public $xLocDest; //String
        public $dhEmb; //String
        public $dhValidade; //String
        public $infPassageiro; //InfPassageiro
    }

    class IdfTravessia {
        public $tpVeiculo; //String
        public $sitVeiculo; //String
    }

    class InfViagem {
        public $cPercurso; //String
        public $xPercurso; //String
        public $tpViagem; //String
        public $tpServ; //String
        public $tpAcomodacao; //String
        public $tpTrecho; //String
        public $dhViagem; //String
        public $dhConexao; //String
        public $prefixo; //String
        public $poltrona; //String
        public $plataforma; //String
        public $idfTravessia; //IdfTravessia
    }

    class InfValorBPe {
        public $vBP; //String
        public $vDesconto; //String
        public $vPgto; //String
        public $vTroco; //String
        public $tpDesconto; //String
        public $xDesconto; //String
        public $comp; //array(Comp)
    }

    class ICMS00 {
        public $CST; //String
        public $vBC; //String
        public $pICMS; //String
        public $vICMS; //String
    }

    class ICMS20 {
        public $CST; //String
        public $pRedBC; //String
        public $vBC; //String
        public $pICMS; //String
        public $vICMS; //String
    }

    class ICMS45 {
        public $CST; //String
    }

    class ICMS90 {
        public $CST; //String
        public $pRedBC; //String
        public $vBC; //String
        public $pICMS; //String
        public $vICMS; //String
        public $vCred; //String
    }

    class ICMSOutraUF {
        public $cST; //String
        public $qRedBCOutraUF; //String
        public $vBCOutraUF; //String
        public $pICMSOutraUF; //String
        public $vICMSOutraUF; //String
    }

    class ICMSSN {
        public $cST; //String
        public $indSN; //String
        public $vTotTrib; //String
        public $infAdFisco; //String
    }

    class ICMSUFFim {
        public $vBCUFFim; //String
        public $pFCPUFFim; //String
        public $pICMSUFFim; //String
        public $pICMSInter; //String
        public $pICMSInterPart; //String
        public $vFCPUFFim; //String
        public $vICMSUFFim; //String
        public $vICMSUFIni; //String
    }

    class ICMS {
        public $ICMS00; //ICMS00
        public $ICMS20; //ICMS20
        public $ICMS45; //ICMS45
        public $ICMS90; //ICMS90
        public $ICMSOutraUF; //ICMSOutraUF
        public $ICMSSN; //ICMSSN
        public $ICMSUFFim; //ICMSUFFim
    }

    class Imp {
        public $ICMS;  //ICMS
    }

    class Card {
        public $tpIntegra; //String
        public $CNPJ; //String
        public $tBand; //String
        public $cAut; //String
    }

    class Pag {
        public $tPag; //String
        public $vPag; //String
        public $card; //Card
    }

    class AutXML {
        public $CNPJ; //String
        public $CPF; //String
    }

    class InfAdic {
        public $infAdFisco; //String
        public $infCpl; //String
    }

    class InfBPe {
        public $versao; //String
        public $ide; //Ide
        public $emit; //Emit
        public $comp; //Comp
        public $agencia; //Agencia 
        public $infBPeSub; //InfBPeSub 
        public $infPassagem; //InfPassagem 
        public $infViagem; //array(InfViagem)
        public $infValorBPe; //InfValorBPe 
        public $imp; //Imp 
        public $pag; //array(Pag)
        public $autXML; //array(AutXML)
        public $infAdic; //InfAdic 
    }

    class BPe {
        public $infBPe; //InfBPe 
    }

    class BPeJSON {
        public $BPe; //BPe 
    }
?>