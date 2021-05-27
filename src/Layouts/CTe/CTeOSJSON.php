<?php
    class InfRespTec
    {
        public $CNPJ;
        public $xContato;
        public $fone;
        public $email;
        public $idCSRT;
        public $hashCSRT;
    }
    class AutXML 
    {
        public $CNPJ; 
        public $CPF; 
    }
    class InfCteAnu 
    {
        public $chCTe; 
        public $dEmi; 
    }

    class InfCteComp
    {
        public $chCTe;
    }
    class Dup 
    {
        public $nDup; 
        public $dVenc; 
        public $vDup; 
    }
    class Fat 
    {
        public $nFat; 
        public $vOrig; 
        public $vDesc; 
        public $vLiq; 
    }
    class Cobr 
    {
        public $fat; //Fat 
        public $dup; //array(Dup)
    }
    class RefNF
    {
        public $CNPJ; 
		public $CPF; 
		public $mod; 
		public $serie; 
		public $subserie; 
		public $nro; 
		public $valor; 
		public $dEmi; 
    }
    class TomaICMS
    {
        public $refNFe;
        public $refNF;
        public $retCte;
    }
    class InfCteSub
    {
        public $chCte;
        public $refCteAnu;
        public $tomaICMS;
    }
    class InfFrentamento
    {
        public $tpFretamento;
        public $dhViagem;
    }
    class prop
    {
        public $CPF;
        public $CNPJ;
        public $TAF;
        public $NroRegEstadual;
        public $xNome;
        public $IE;
        public $UF;
        public $tpProp;

    }
    class veic 
    {
        public $placa;
        public $RENAVAM;
        public $prop;
        public $UF;
    }
    class RodoOS
    {
        public $TAF;
        public $NroRegEstadual;
        public $veic;
        public $infFretamento;
    }
    class InfModal
    {
        public $versaoModal;
        public $rodoOS;
    }
    class Seg 
    {
        public $respSeg;
        public $xSeg;
        public $nApol;
    }
    class InfDocRef
    {
        public $nDoc;
        public $serie;
        public $subserie;
        public $dEmi;
        public $vDoc;
    }
    class InfQ
    {
        public $qCarga;
    }
    class InfServico
    {
        public $xDescServ;
        public $infQ;
    }
    class InfCTeNorm
    {
        public $infServico;
        public $infDocRef;
        public $seg;
        public $infModal;
        public $infCteSub;
        public $refCTeCanc;
        public $cobr;
    }
    class InfTribFed
    {
        public $vPIS;
        public $vCOFINS;
        public $vIR;
        public $vINSS;
        public $vCSLL;
    }
    class ICMSUFFim 
    {
		public $vBCUFFim; 
		public $pFCPUFFim; 
		public $pICMSUFFim; 
		public $pICMSInter; 
		public $pICMSInterPart; 
		public $vFCPUFFim; 
		public $vICMSUFFim; 
		public $vICMSUFIni; 
    }
    class ICMSSN 
    {
		public $CST; 
		public $indSN; 
    }
    class ICMSOutraUF 
    {
		public $CST; 
		public $pRedBCOutraUF; 
		public $vBCOutraUF; 
		public $pICMSOutraUF; 
		public $vICMSOutraUF; 
    }
    class ICMS90 
    {
		public $CST; 
		public $pRedBC; 
		public $vBC; 
		public $pICMS; 
		public $vICMS; 
		public $vCred; 
	}
    class ICMS45
    {
		public $CST; 
    }	
    class ICMS20
    {
		public $CST; 
		public $pRedBC; 
		public $vBC; 
		public $pICMS; 
		public $vICMS; 
	}
    class ICMS00 
    {
		public $CST; 
		public $vBC; 
		public $pICMS; 
		public $vICMS; 
	}
    class ICMS 
    {
        public $ICMS00;
        public $ICMS20;
        public $ICMS45;
        public $ICMS90;
        public $ICMSOutraUF;
        public $ICMSSN; 
    }
    class Imp 
    {
		public $vTotTrib; 
		public $infAdFisco; 
		public $ICMS; //ICMS 
        public $ICMSUFFim; //ICMSUFFim
        public $infTribFed;
	}
    class Comp 
    {
		public $xNome; 
		public $vComp; 
	}
    class VPrest 
    {
		public $vTPrest; 
		public $vRec; 
		public $Comp; //array(Comp)
    }
    class EnderToma 
    {
		public $xLgr; 
		public $nro; 
		public $xCpl; 
		public $xBairro; 
		public $cMun; 
		public $xMun; 
		public $CEP; 
		public $UF; 
		public $cPais; 
		public $xPais; 
	}
    class Toma 
    {
        public $CNPJ;
        public $CPF; 
		public $IE; 
		public $xNome; 
		public $xFant; 
        public $fone; 
        public $email; 
        public $enderToma;
    }
    class EnderEmit 
    {
		public $xLgr; 
		public $nro; 
		public $xCpl; 
		public $xBairro; 
		public $cMun; 
		public $xMun; 
		public $CEP; 
		public $UF; 
		public $fone; 
	}
    class Emit 
    {
		public $CNPJ; 
		public $IE; 
		public $IEST; 
		public $xNome; 
		public $xFant; 
		public $enderEmit; //EnderEmit 
	}
    class ObsFisco 
    {
        public $xCampo;
        public $xTexto;
    }
    class ObsCont 
    {
        public $xCampo;
        public $xTexto;
    }
    class Compl 
    {
		public $xCaracAd; 
		public $xCaracSer; 
        public $xEmi; 
        public $xObs;
		public $ObsCont; 
		public $ObsFisco; 
    }
    class InfPercurso 
    {
        public $UFPer;
    }
    class Ide 
    {
		public $cUF; 
		public $cCT; 
		public $CFOP; 
		public $natOp; 
		public $mod; 
		public $serie; 
		public $nCT; 
		public $dhEmi; 
		public $tpImp; 
		public $tpEmis; 
		public $cDV; 
		public $tpAmb; 
		public $tpCTe; 
		public $procEmi; 
		public $verProc; 
		public $cMunEnv; 
		public $xMunEnv; 
		public $UFEnv; 
		public $modal; 
        public $tpServ; 
        public $indIEToma; 
		public $cMunIni; 
		public $xMunIni; 
		public $UFIni; 
		public $cMunFim; 
		public $xMunFim; 
        public $UFFim; 
        public $infPercurso;
		public $dhCont; 
		public $xJust; 
    }
    class InfCTe 
    {
        public $versao = "3.00";
        public $ide;
        public $compl;
        public $emit;
        public $toma;
        public $vPrest;
        public $imp;
        public $infCTeNorm;
        public $infCteComp;
        public $infCteAnu;
        public $autXML;
        public $infRespTec;
    }
    class CTeOS
    {
        public $versao = "3.00";
        public $infCte;
    }
    class CTeOSJSON
    {
        public $CTeOS;
    }

?>