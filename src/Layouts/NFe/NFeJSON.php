<?phprefNFe
	class RefNF {
		public $cUF;  //String
		public $AAMM; //String
		public $CNPJ; //String
		public $mod; //String
		public $serie; //String
		public $nNF; //String
	}

	class RefNFP {
		public $cUF; //String
		public $AAMM; //String
		public $CNPJ; //String
		public $CPF; //String
		public $IE; //String
		public $mod; //String
		public $serie; //String
		public $nNF; //String
		public $refCTe; //String
	}

	class RefECF {
		public $mod; //String
		public $nECF; //String
		public $nCOO; //String
	}

	class NFref {
		public $refNFe; //String
		public $refNF; //RefNF
		public $refNFeSig; //
		public $refNFP; //RefNFP
		public $refECF; //RefECF
	}

	class Ide {
		public $cUF; //String
		public $cNF; //String
		public $natOp; //String
		public $mod; //String
		public $serie; //String
		public $nNF; //String
		public $dhEmi; //String
		public $dhSaiEnt; //String
		public $tpNF; //String
		public $idDest; //String
		public $cMunFG; //String
		public $tpImp; //String
		public $tpEmis; //String
		public $cDV; //String
		public $tpAmb; //String
		public $finNFe; //String
		public $indFinal; //String
		public $indPres; //String
		public $indIntermed;
		public $procEmi; //String
		public $verProc; //String
		public $dhCont; //String
		public $xJust; //String
		public $NFref; //array(NFref)
		public $cMunFGIBS; //string
		public $tpNFDebito; //string
		public $tpNFCredito; //string
		public $dPrevEntrega; //string
		public $gCompraGov; //gCompraGov
		public $gPagAntecipado; //gPagAntecipado
	}

	class EnderEmit {
		public $xLgr; //String
		public $nro; //String
		public $xCpl; //String
		public $xBairro; //String
		public $cMun; //String
		public $xMun; //String
		public $UF; //String
		public $CEP; //String
		public $cPais; //String
		public $xPais; //String
		public $fone; //String
	}

	class Emit {
		public $CNPJ; //String
		public $CPF; //String
		public $xNome; //String
		public $xFant; //String
		public $enderEmit; //EnderEmit
		public $IE; //String
		public $IEST; //String
		public $IM; //String
		public $CNAE; //String
		public $CRT; //String
	}

	class EnderDest {
		public $xLgr; //String
		public $nro; //String
		public $xCpl; //String
		public $xBairro; //String
		public $cMun; //String
		public $xMun; //String
		public $UF; //String
		public $CEP; //String
		public $cPais; //String
		public $xPais; //String
		public $fone; //String
	}

	class Dest {
		public $CNPJ; //String
		public $CPF; //String
		public $idEstrangeiro; //String
		public $xNome; //String
		public $enderDest; //EnderDest
		public $indIEDest; //String
		public $IE; //String
		public $ISUF; //String
		public $IM; //String
		public $email; //String
	}

	class Retirada {
		public $CNPJ; //String
		public $CPF; //String
		public $xLgr; //String
		public $nro; //String
		public $xCpl; //String
		public $xBairro; //String
		public $cMun; //String
		public $xMun; //String
		public $UF; //String
		public $CEP;
		public $cPais;
		public $xPais;
		public $fone;
		public $email;
		public $xNome;
		public $IE;
	}

	class Entrega {
		public $CNPJ; //String
		public $CPF; //String
		public $xLgr; //String
		public $nro; //String
		public $xCpl; //String
		public $xBairro; //String
		public $cMun; //String
		public $xMun; //String
		public $UF; //String
		public $CEP;
		public $cPais;
		public $xPais;
		public $fone;
		public $email;
		public $xNome;
		public $IE;
	}

	class AutXML {
		public $CNPJ; //String
		public $CPF; //String
	}

	class Rastro {
		public $nLote; //String
		public $qLote; //String
		public $dFab; //String
		public $dVal; //String
		public $cAgreg; //String
	}

	class Adi {
		public $nAdicao; //String
		public $nSeqAdic; //String
		public $cFabricante; //String
		public $vDescDI; //String
		public $nDraw; //String
	}

	class DI {
		public $nDI; //String
		public $dDI; //String
		public $xLocDesemb; //String
		public $UFDesemb; //String
		public $dDesemb; //String
		public $tpViaTransp; //String
		public $vAFRMM; //String
		public $tpIntermedio; //String
		public $CNPJ; //String
		public $UFTerceiro; //String
		public $cExportador; //String
		public $adi; //Adi(Array)
	}

	class ExportInd {
		public $nRE; //String
		public $chNFe; //String
		public $qExport; //String
	}

	class DetExport {
		public $nDraw; //String
		public $exportInd; //ExportInd
	}

	class VeicProd {
		public $tpOp; //String
		public $chassi; //String
		public $cCor; //String
		public $xCor; //String
		public $pot; //String
		public $cilin; //String
		public $pesoL; //String
		public $pesoB; //String
		public $nSerie; //String
		public $tpComb; //String
		public $nMotor; //String
		public $CMT; //String
		public $dist; //String
		public $anoMod; //String
		public $anoFab; //String
		public $tpPint; //String
		public $tpVeic; //String
		public $espVeic; //String
		public $VIN; //String
		public $condVeic; //String
		public $cMod; //String
		public $cCorDENATRAN; //String
		public $lota; //String
		public $tpRest; //String
	}

	class Med {
		public $cProdANVISA; //String
		public $vPMC; //String
		public $xMotivoIsencao;
	}

	class Arma {
		public $tpArma; //String
		public $nSerie; //String
		public $nCano; //String
		public $descr; //String
	}

	class CIDE {
		public $qBCProd; //String
		public $vAliqProd; //String
		public $vCIDE; //String
	}

	class Encerrante {
		public $nBico; //String
		public $nBomba; //String
		public $nTanque; //String
		public $vEncIni; //String
		public $vEncFin; //String
	}

	class Comb {
		public $cProdANP; //String
		public $descANP; //String
		public $pGLP; //String
		public $pGNn; //String
		public $pGNi; //String
		public $vPart; //String
		public $CODIF; //String
		public $qTemp; //String
		public $UFCons; //String
		public $CIDE; //CIDE
		public $pBio;
		public $encerrante; //Encerrante
	}

	class Prod {
		public $cProd; //String
		public $cEAN; //String
		public $xProd; //String
		public $NCM; //String
		public $EXTIPI; //String
		public $CFOP; //String
		public $uCom; //String
		public $qCom; //String
		public $vUnCom; //String
		public $vProd; //String
		public $cEANTrib; //String
		public $uTrib; //String
		public $qTrib; //String
		public $vUnTrib; //String
		public $vFrete; //String
		public $vSeg; //String
		public $vDesc; //String
		public $vOutro; //String
		public $indTot; //String
		public $xPed; //String
		public $nItemPed; //String
		public $nFCI; //String
		public $NVE; //String
		public $CEST; //String
		public $indEscala; //String
		public $CNPJFab; //String
		public $cBenef; //String
		public $cBarra; //String
		public $cBarraTrib; //String
		public $indBemMovelUsado; //String
		public $tpCredPresIBSZFM; //String
		public $gCred; //gCred
		public $rastro; //array(Rastro)
		public $DI; //array(DI)
		public $detExport; //array(DetExport)
		public $veicProd; //VeicProd
		public $med; //Med
		public $arma; //array(Arma)
		public $comb; //Comb
		public $nRECOPI; //String
		public $infProdNFF; //infProdNFF
		public $infProdEmb; //InfProdEmb
	}

	class InfProdEmb {
		public $xEmb; //String
		public $qVolEmb; //String
		public $uEmb; //String
	}

	class infProdNFF {
		public $cProdFisco; //String
		public $cOperNFF; //String
	}

	class gCred {
		public $cCredPresumido; //String
		public $pCredPresumido; //String
		public $vCredPresumido; //String
	}

	class ICMS00 {
		public $orig; //String
		public $CST; //String
		public $modBC; //String
		public $vBC; //String
		public $pICMS; //String
		public $vICMS; //String
		public $pFCP; //String
		public $vFCP; //String
	}

	class ICMS02 {
		public $orig; //String
		public $CST; //String
		public $qBCMono;
		public $adRemICMS;
		public $vICMSMono;
	}

	class ICMS10 {
		public $orig; //String
		public $CST; //String
		public $modBC; //String
		public $vBC; //String
		public $pICMS; //String
		public $vICMS; //String
		public $vBCFCP; //String
		public $pFCP; //String
		public $vFCP; //String
		public $modBCST; //String
		public $pMVAST; //String
		public $pRedBCST; //String
		public $vBCST; //String
		public $pICMSST; //String
		public $vICMSST; //String
		public $vBCFCPST; //String
		public $pFCPST; //String
		public $vFCPST; //String
		public $vICMSSTDeson;
		public $motDesICMSST;
	}

	class ICMS15 {
		public $orig;
		public $CST;
		public $qBCMon;
		public $adRemICMS;
		public $vICMSMono;
		public $qBCMonoReten;
		public $adRemICMSReten;
		public $vICMSMonoReten;
		public $pRedAdRem;
		public $motRedAdRem;
	}

	class ICMS20 {
		public $orig; //String
		public $CST; //String
		public $modBC; //String
		public $pRedBC; //String
		public $vBC; //String
		public $pICMS; //String
		public $vICMS; //String
		public $vBCFCP; //String
		public $pFCP; //String
		public $vFCP; //String
		public $vICMSDeson; //String
		public $motDesICMS; //String
		public $indDeduzDeson;
	}

	class ICMS30 {
		public $orig; //String
		public $CST; //String
		public $modBCST; //String
		public $pMVAST; //String
		public $pRedBCST; //String
		public $vBCST; //String
		public $pICMSST; //String
		public $vICMSST; //String
		public $vBCFCPST; //String
		public $pFCPST; //String
		public $vFCPST; //String
		public $vICMSDeson; //String
		public $motDesICMS; //String
		public $indDeduzDeson;
	}

	class ICMS40 {
		public $orig; //String
		public $CST; //String
		public $vICMSDeson; //String
		public $motDesICMS; //String
		public $indDeduzDeson;
	}

	class ICMS41 {
		public $orig; //String
		public $CST; //String
		public $vICMSDeson; //String
		public $motDesICMS; //String
		public $indDeduzDeson;
	}

	class ICMS50 {
		public $orig; //String
		public $CST; //String
		public $vICMSDeson; //String
		public $motDesICMS; //String
		public $indDeduzDeson;
	}

	class ICMS51 {
		public $orig; //String
		public $CST; //String
		public $modBC; //String
		public $pRedBC; //String
		public $vBC; //String
		public $pICMS; //String
		public $vICMSOp; //String
		public $pDif; //String
		public $vICMSDif; //String
		public $vICMS; //String
		public $vBCFCP; //String
		public $pFCP; //String
		public $vFCP; //String
		public $pFCPDif;
		public $vFCPDif;
		public $vFCPEfet;
	}

	class ICMS53 {
		public $orig;
		public $CST;
		public $qBCMono;
		public $adRemICMS;
		public $vICMSMonoOp;
		public $pDif;
		public $vICMSMonoDif;
		public $vICMSMono;
	}

	class ICMS60 {
		public $orig; //String
		public $CST; //String
		public $vBCSTRet; //String
		public $pST; //String
		public $vICMSSTRet; //String
		public $vBCFCPSTRet; //String
		public $pFCPSTRet; //String
		public $vFCPSTRet; //String
		public $pRedBCEfet;
		public $vBCEfet;
		public $pICMSEfet;
		public $vICMSEfet;
		public $vICMSSubstituto;
	}

	class ICMS61 {
		public $orig;
		public $CST;
		public $qBCMonoRet;
		public $adRemICMSRet;
		public $vICMSMonoRet
	}

	class ICMS70 {
		public $orig; //String
		public $CST; //String
		public $modBC; //String
		public $pRedBC; //String
		public $vBC; //String
		public $pICMS; //String
		public $vICMS; //String
		public $vBCFCP; //String
		public $pFCP; //String
		public $vFCP; //String
		public $modBCST; //String
		public $pMVAST; //String
		public $pRedBCST; //String
		public $vBCST; //String
		public $pICMSST; //String
		public $vICMSST; //String
		public $vBCFCPST; //String
		public $pFCPST; //String
		public $vFCPST; //String
		public $vICMSDeson; //String
		public $motDesICMS; //String
		public $vICMSSTDeson;
		public $motDesICMSST;
		public $indDeduzDeson;
	}

	class ICMS90 {
		public $orig; //String
		public $CST; //String
		public $modBC; //String
		public $vBC; //String
		public $pRedBC; //String
		public $pICMS; //String
		public $vICMS; //String
		public $vBCFCP; //String
		public $pFCP; //String
		public $vFCP; //String
		public $modBCST; //String
		public $pMVAST; //String
		public $pRedBCST; //String
		public $vBCST; //String
		public $pICMSST; //String
		public $vICMSST; //String
		public $vBCFCPST; //String
		public $pFCPST; //String
		public $vFCPST; //String
		public $vICMSDeson; //String
		public $motDesICMS; //String
		public $vICMSSTDeson;
		public $motDesICMSST;
		public $indDeduzDeson;
	}

	class ICMSPart {
		public $orig; //String
		public $CST; //String
		public $modBC; //String
		public $vBC; //String
		public $pRedBC; //String
		public $pICMS; //String
		public $vICMS; //String
		public $modBCST; //String
		public $pMVAST; //String
		public $pRedBCST; //String
		public $vBCST; //String
		public $pICMSST; //String
		public $vICMSST; //String
		public $pBCOp; //String
		public $UFST; //String
		public $vBCFCPST;
		public $pFCPST;
		public $vFCPST;
	}

	class ICMSST {
		public $orig; //String
		public $CST; //String
		public $vBCSTRet; //String
		public $vICMSSTRet; //String
		public $vBCSTDest; //String
		public $vICMSSTDest; //String
		public $vBCFCPSTRet;
		public $pFCPSTRet;
		public $vFCPSTRet;
		public $pST;
		public $vICMSSubstituto;
		public $pRedBCEfet;
		public $vBCEfet;
		public $pICMSEfet;
		public $vICMSEfet;
	}

	class ICMSSN101 {
		public $orig; //String
		public $CSOSN; //String
		public $pCredSN; //String
		public $vCredICMSSN; //String
	}

	class ICMSSN102 {
		public $orig; //String
		public $CSOSN; //String
	}

	class ICMSSN201 {
		public $orig; //String
		public $CSOSN; //String
		public $modBCST; //String
		public $pMVAST; //String
		public $pRedBCST; //String
		public $vBCST; //String
		public $pICMSST; //String
		public $vICMSST; //String
		public $vBCFCPST; //String
		public $pFCPST; //String
		public $vFCPST; //String
		public $pCredSN; //String
		public $vCredICMSSN; //String
	}

	class ICMSSN202 {
		public $orig; //String
		public $CSOSN; //String
		public $modBCST; //String
		public $pMVAST; //String
		public $pRedBCST; //String
		public $vBCST; //String
		public $pICMSST; //String
		public $vICMSST; //String
		public $vBCFCPST; //String
		public $pFCPST; //String
		public $vFCPST; //String
	}

	class ICMSSN500 {
		public $orig; //String
		public $CSOSN; //String
		public $vBCSTRet; //String
		public $pST; //String
		public $vICMSSTRet; //String
		public $vBCFCPSTRet; //String
		public $pFCPSTRet; //String
		public $vFCPSTRet; //String
		public $pRedBCEfet;
		public $vBCEfet;
		public $pICMSEfet;
		public $vICMSEfet;
		public $vICMSSubstituto;
	}

	class ICMSSN900 {
		public $orig; //String
		public $CSOSN; //String
		public $modBC; //String
		public $vBC; //String
		public $pRedBC; //String
		public $pICMS; //String
		public $vICMS; //String
		public $modBCST; //String
		public $pMVAST; //String
		public $pRedBCST; //String
		public $vBCST; //String
		public $pICMSST; //String
		public $vICMSST; //String
		public $vBCFCPST; //String
		public $pFCPST; //String
		public $vFCPST; //String
		public $pCredSN; //String
		public $vCredICMSSN; //String
	}

	class ICMSUFDest {
		public $vBCUFDest; //String
		public $vBCFCPUFDest; //String
		public $pFCPUFDest; //String
		public $pICMSUFDest; //String
		public $pICMSInter; //String
		public $pICMSInterPart; //String
		public $vFCPUFDest; //String
		public $vICMSUFDest; //String
		public $vICMSUFRemet; //String
	}

	class ICMS {
		public $ICMS00; //ICMS00
		public $ICMS02; 
		public $ICMS10; //ICMS10
		public $ICMS15;
		public $ICMS20; //ICMS20
		public $ICMS30; //ICMS30
		public $ICMS40; //ICMS40
		public $ICMS41;
		public $ICMS50;
		public $ICMS53;
		public $ICMS51; //ICMS51
		public $ICMS60; //ICMS60
		public $ICMS61;
		public $ICMS70; //ICMS70
		public $ICMS90; //ICMS90
		public $ICMSPart; //ICMSPart
		public $ICMSST; //ICMSST
		public $ICMSSN101; //ICMSSN101
		public $ICMSSN102; //ICMSSN102
		public $ICMSSN201; //ICMSSN201
		public $ICMSSN202; //ICMSSN202
		public $ICMSSN500; //ICMSSN500
		public $ICMSSN900; //ICMSSN900
	}

	class IPITrib {
		public $CST; //String
		public $vBC; //String
		public $pIPI; //String
		public $qUnid; //String
		public $vUnid; //String
		public $vIPI; //String
	}

	class IPINT {
		public $CST; //String
	}

	class IPI {
		public $CNPJProd; //String
		public $cSelo; //String
		public $qSelo; //String
		public $cEnq; //String
		public $IPITrib; //IPITrib
		public $IPINT; //IPINT
	}

	class II {
		public $vBC; //String
		public $vDespAdu; //String
		public $vII; //String
		public $vIOF; //String
	}

	class PISAliq {
		public $CST; //String
		public $vBC; //String
		public $pPIS; //String
		public $vPIS; //String
	}

	class PISQtde {
		public $CST; //String
		public $qBCProd; //String
		public $vAliqProd; //String
		public $vPIS; //String
	}

	class PISNT {
		public $CST; //String
	}

	class PISOutr {
		public $CST; //String
		public $vBC; //String
		public $pPIS; //String
		public $qBCProd; //String
		public $vAliqProd; //String
		public $vPIS; //String
	}

	class PIS {
		public $PISAliq; //PISAliq
		public $PISQtde; //PISQtde
		public $PISNT; //PISNT
		public $PISOutr; //PISOutr
	}

	class PISST {
		public $vBC; //String
		public $pPIS; //String
		public $qBCProd; //String
		public $vAliqProd; //String
		public $vPIS; //String
		public $indSomaPISST;
	}

	class COFINSAliq {
		public $CST; //String
		public $vBC; //String
		public $pCOFINS; //String
		public $vCOFINS; //String
	}

	class COFINSQtde {
		public $CST; //String
		public $qBCProd; //String
		public $vAliqProd; //String
		public $vCOFINS; //String
	}

	class COFINSNT {
		public $CST; //String
	}

	class COFINSOutr {
		public $CST; //String
		public $vBC; //String
		public $pCOFINS; //String
		public $qBCProd; //String
		public $vAliqProd; //String
		public $vCOFINS; //String
	}

	class COFINS {
		public $COFINSAliq; //COFINSAliq
		public $COFINSQtde; //COFINSQtde
		public $COFINSNT; //COFINSNT
		public $COFINSOutr; //COFINSOutr
	}

	class COFINSST {
		public $vBC; //String
		public $pCOFINS; //String
		public $qBCProd; //String
		public $vAliqProd; //String
		public $vCOFINS; //String
		public $indSomaCOFINSST;
	}

	class ISSQN {
		public $vBC; //String
		public $vAliq; //String
		public $vISSQN; //String
		public $cMunFG; //String
		public $cListServ; //String
		public $vDeducao; //String
		public $vOutro; //String
		public $vDescIncond; //String
		public $vDescCond; //String
		public $vISSRet; //String
		public $indISS; //String
		public $cServico; //String
		public $cMun; //String
		public $cPais; //String
		public $nProcesso; //String
		public $indIncentivo; //String
	}

	class Imposto {
		public $vTotTrib; //String
		public $ICMS; //ICMS
		public $ICMSUFDest; //ICMSUFDest
		public $IPI; //IPI
		public $II; //II
		public $PIS; //PIS
		public $PISST; //PISST
		public $COFINS; //COFINS
		public $COFINSST; //COFINSST
		public $ISSQN; //ISSQN
		public $IS; //IS
		public $IBSCBS; //IBSCBS
	}


	class gIBSCBSCredPres {
		public $pCredPres; //String
		public $vCredPres; //String
		public $vCredPresCondSus; //String
	}

	class IPIDevol {
		public $vIPIDevol; //String or Double(13v2)
	}
	class ImpostoDevol {
		public $pDevol; //String
		public $IPI; //IPIDevol		
	}

	class Det {
		public $prod; //Prod
		public $imposto; //Imposto
		public $impostoDevol; //ImpostoDevol
		public $infAdProd; //String
		public $nItem; //String
		public $vItem; //String
		public $DFeReferenciado; //DFeReferenciado
	}

	class ICMSTot {
		public $vBC; //String
		public $vICMS; //String
		public $vICMSDeson; //String
		public $vFCP; //String
		public $vFCPUFDest; //String
		public $vICMSUFDest; //String
		public $vICMSUFRemet; //String
		public $vBCST; //String
		public $vST; //String
		public $vFCPST; //String
		public $vFCPSTRet; //String
		public $vProd; //String
		public $vFrete; //String
		public $vSeg; //String
		public $vDesc; //String
		public $vII; //String
		public $vIPI; //String
		public $vIPIDevol; //String
		public $vPIS; //String
		public $vCOFINS; //String
		public $vOutro; //String
		public $vNF; //String
		public $vTotTrib; //String
		public $qBCMono;
		public $vICMSMono;
		public $qBCMonoReten;
		public $vICMSMonoReten;
		public $qBCMonoRet;
		public $vICMSMonoRet;
	}

	class ISSQNtot {
		public $vServ; //String
		public $vBC; //String
		public $vISS; //String
		public $vPIS; //String
		public $vCOFINS; //String
		public $dCompet; //String
		public $vDeducao; //String
		public $vOutro; //String
		public $vDescIncond; //String
		public $vDescCond; //String
		public $vISSRet; //String
		public $cRegTrib; //String
	}

	class RetTrib {
		public $vRetPIS; //String
		public $vRetCOFINS; //String
		public $vRetCSLL; //String
		public $vBCIRRF; //String
		public $vIRRF; //String
		public $vBCRetPrev; //String
		public $vRetPrev; //String
	}

	class Total {
		public $ICMSTot; //ICMSTot
		public $ISSQNtot; //ISSQNtot
		public $retTrib; //RetTrib
		public $vNFTot;
		public $ISTot; //ISTot
		public $IBSCBSTot; //IBSCBSTot
	}

	class Transporta {
		public $CNPJ; //String
		public $CPF; //String
		public $xNome; //String
		public $IE; //String
		public $xEnder; //String
		public $xMun; //String
		public $UF; //String
	}

	class RetTransp {
		public $vServ; //String
		public $vBCRet; //String
		public $pICMSRet; //String
		public $vICMSRet; //String
		public $CFOP; //String
		public $cMunFG; //String
	}

	class VeicTransp {
		public $placa; //String
		public $UF; //String
		public $RNTC; //String
	}

	class Reboque {
		public $placa; //String
		public $UF; //String
		public $RNTC; //String
	}

	class Lacre {
		public $nLacre; //String
	}

	class Vol {
		public $qVol; //String
		public $esp; //String
		public $marca; //String
		public $nVol; //String
		public $pesoL; //String
		public $pesoB; //String
		public $lacres; //array(Lacre)
	}

	class Transp {
		public $modFrete; //String
		public $transporta; //Transporta
		public $retTransp; //RetTransp
		public $veicTransp; //VeicTransp
		public $reboque; //array(Reboque)
		public $vagao; //String
		public $balsa; //String
		public $vol; //array(Vol)
	}

	class Fat {
		public $nFat; //String
		public $vOrig; //String
		public $vDesc; //String
		public $vLiq; //String
	}

	class Dup {
		public $nDup; //String
		public $dVenc; //String
		public $vDup; //String
	}

	class Cobr {
		public $fat; //Fat
		public $dup; //array(Dup)
	}

	class Card {
		public $CNPJ; //String
		public $tBand; //String
		public $cAut; //String
		public $tpIntegra; //String
		public $CNPJReceb;
		public $idTermPag;
	}

	class DetPag {
		public $indPag; //String
		public $tPag; //String
		public $vPag; //String
		public $xPag;
		public $dPag;
		public $CNPJPag;
		public $UFPag;
		public $card; //Card
	}

	class Pag {
		public $detPag; //array(DetPag)
		public $vTroco; //String
	}

	class InfIntermed {
		public $CNPJ; //String
		public $idCadIntTran; //String
	}

	class ObsCont {
		public $xCampo; //String
		public $xTexto; //String
	}

	class ObsFisco {
		public $xCampo; //String
		public $xTexto; //String
	}

	class ProcRef {
		public $nProc; //String
		public $indProc; //String
		public $tpAto;
	}

	class InfAdic {
		public $infAdFisco; //String
		public $infCpl; //String
		public $obsCont; //array(ObsCont)
		public $obsFisco; //array(ObsFisco)
		public $procRef; //array(ProcRef)
	}

	class Exporta {
		public $UFSaidaPais; //String
		public $xLocExporta; //String
		public $xLocDespacho; //String
	}

	class Compra {
		public $xNEmp; //String
		public $xPed; //String
		public $xCont; //String
	}

	class ForDia {
		public $dia; //String
		public $qtde; //String
		public $qTotMes; //String
		public $qTotAnt; //String
		public $qTotGer; //String
	}

	class Deduc {
		public $xDed; //String
		public $vDed; //String
		public $vFor; //String
		public $vTotDed; //String
		public $vLiqFor; //String
	}

	class Cana {
		public $safra; //String
		public $ref; //String
		public $forDia; //array(ForDia)
		public $deduc; //array(Deduc)
		public $qTotMes;
		public $qTotAnt;
		public $qTotGer;
		public $vFor;
		public $vTotDed;
		public $vLiqFor;
	}

	class InfNFe {
		public $versao; //String
		public $ide; //Ide
		public $emit; //Emit
		public $dest; //Dest
		public $retirada; //Retirada
		public $entrega; //Entrega
		public $autXML; //array(AutXML)
		public $det; //array(Det)
		public $total; //Total
		public $transp; //Transp
		public $cobr; //Cobr
		public $pag; //Pag
		public $infIntermed; //InfIntermed
		public $infAdic; //InfAdic
		public $exporta; //Exporta
		public $compra; //Compra
		public $cana; //Cana
		public $infRespTec;
		public $agropecuario; //agropecuario
	}

	class NFe {
		public $infNFe; //InfNFe
	}

	class NFeJSON {
		public $NFe; //NFe
	}

	class Infresptec {
		public $CNPJ;
		public $xContato;
		public $email;
		public $fone;
	}

	//novos grupos da reforma tributaria

	class agropecuario {
		public $defensivo; //defensivo
		public $guiaTransito; //string
	}

	class guiaTransito {
		public $tpGuia; //string
		public $UFGuia; //string
		public $serieGuia; //string
		public $nGuia; //string
	}

	class defensivo {
		public $nReceituario; //string
		public $CPFRespTec; //string
	}

	class gCompraGov {
		public $tpEnteGov; //string
		public $pRedutor; //string
		public $tpOperGov; //string
	}

	class gPagAntecipado {
		public $refNFe; //string
	}

	class DFeReferenciado {
		public $chaveAcesso; //String
		public $nItem; //String
	}

	class IS{
		public $CSTIS; //String
		public $cClassTribIS; //String
		public $vBCIS; //String
		public $pIS; //String
		public $pISEspec; //String
		public $uTrib; //String
		public $qTrib; //String
		public $vIS; //String

	}

	class IBSCBS {
		public $CST; //String
		public $cClassTrib; //String
		public $indDoacao; //String
		public $gIBSCBS; //gIBSCBS
		public $gIBSCBSMono; //gIBSCBSMono
		public $gTransfCred; //gTransfCred
		public $gCredPresIBSZFM; //gCredPresIBSZFM
		public $gAjusteCompet; //gAjusteCompet
		public $gEstornoCred; //gEstornoCred
		public $gCredPresOper; //gCredPresOper
		}

	class gIBSCBS {
		public $vBC; //String
		public $vIBS; //String
		public $gIBSUF; //gIBSUF
		public $gIBSMun; //gIBSMun
		public $gCBS; //gCBS
		public $gTribRegular; //gTribRegular
		public $gIBSCredPress; //gIBSCredPres
		public $gCBSCredPres; //gCBSCredPres
		public $gTribCompraGov; //gTribCompraGov
	}

	class gIBSUF {
		public $pIBSUF; //String
		public $vIBSUF; //String
		public $gDif; //gDif
		public $gDevTrib; //gDevTrib
		public $gRed; //gRed
	}

		class gDif {
		public $pDif; //String
		public $vDif; //String
	}

	class gDevTrib {
		public $vDevTrib; //String
	}

	class gRed {
		public $pRedAliq; //String
		public $pAliqEfet; //String
		}

	class gIBSMun {
		public $pIBSMun; //String
		public $vIBSMun; //String
		public $gDif; //gDif
		public $gDevTrib; //gDevTrib
		public $gRed; //gRed
	}

	class gCBS {
		public $pCBS; //String
		public $vCBS; //String
		public $gDif; //gDif
		public $gDevTrib; //gDevTrib
		public $gRed; //gRed
	}

	class gTribRegular {
		public $CSTReg; //String
		public $cClassTribReg; //String
		public $pAliqEfetRegIBSUF; //String
		public $vTribRegIBSUF; //String
		public $pAliqEfetRegIBSMun; //String
		public $vTribRegIBSMun; //String
		public $pAliqEfetRegCBS; //String
		public $vTribRegCBS; //String
	}

	class gTribCompraGov {
		public $pAliqIBSUF; //String
		public $vTribIBSUF; //String
		public $pAliqIBSMun; //String
		public $vTribIBSMun; //String
		public $pAliqCBS; //String
		public $vTribCBS; //String
	}

	class gIBSCBSMono {
		public $qBCMono; //String
		public $adRemIBS; //String
		public $adRemCBS;
		public $vIBSMono;
		public $vCBSMono;
		public $gMonoPadrao; //gMonoPadrao
		public $gMonoReten; //gMonoRetencao
		public $gMonoRet; //gMonoRet
		public $gMonoDif; //gMonoDif
	}

	class gMonoPadrao {
		public $qBCMono; //String
		public $adRemIBS; //String
		public $adRemCBS; //String
		public $vIBSMono; //String
		public $vCBSMono; //String
	}

	class gMonoReten {
		public $qBCMonoReten; //String
		public $adRemIBSReten; //String
		public $adRemCBSReten; //String
		public $vIBSMonoReten; //String
		public $vCBSMonoReten; //String
	}

	class gMonoRet {
		public $qBCMonoRet; //String
		public $adRemIBSReten; //String
		public $adRemCBSReten; //String
		public $vIBSMonoRet; //String
		public $vCBSMonoRet; //String
	}

	class gMonoDif {
		public $pDifCBS; //String
		public $pDifIBS; //String
		public $vIBSMonoDif; //String
		public $vCBSMonoDif; //String
		public $vTotIBSMonoItem; //String
		public $vTotCBSMonoItem; //String
	}

	class gTransfCred {
		public $vIBS; //String
		public $vCBS; //String
	}

	class gCredPresIBSZFM {
		public $competApur; //String
		public $vCredPresIBSZFM; //String
		public $tpCredPresIBSZFM; //String
	}

	class gAjusteCompet {
		public $competApur; //String
		public $vIBS; //String
		public $vCBS; //String
	}

	class gEstornoCred {
		public $vIBSEstCred; //gEstornoCred
		public $vCBSEstCred; //gEstornoCred
	}

	class gCredPresoper {
		public $vBCCredPres; //String
		public $cCredPres; //String
		public $gIBSCredPres; //gIBSCredPres
		public $gCBSCredPres;
	}

	class gIBSCredPres {
		public $cCredPres; //String
		public $pCredPres; //String
		public $vCredPres; //String
		public $vCredPresCondSus; //String
	}

	class gCBSCredPres {
		public $cCredPres; //String
		public $pCredPres; //String
		public $vCredPres; //String
		public $vCredPresCondSus; //String
	}

	class ISTot {
		public $vIS;
	}

	class IBSCBSTot {
		public $vBCIBSCBS; //String
		public $gIBS; //gIBS
		public $gCBS; //gCBS
		public $gEstornoCred; //gEstornoCred
		public $gMono; //gMono
	}

	class gIBS {
		public $gIBSUF; //gIBSUF
		public $gIBSMun; //gIBSMun
		public $vIBS; //vIBS
		public $vCredPres; //string
		public $vCredPresCondSus; //string
	}

	class gCBS {
		public $vDif; //gCBSUF
		public $vDevTrib; //gCBSMun
		public $vCBS; //vCBS
		public $vCredPres;
		public $vCredPresCondSus;
	}

	class gMono {
		public $vIBSMono;
		public $vCBSMono;
		public $vIBSMonoReten;
		public $vCBSMonoReten;
		public $vIBSMonoRet;
		public $vCBSMonoRet;
	}

	class gIBSMun {
		public $vIBSMun; //String
		public $vDif; //gDif
		public $vDevTrib; //gDevTrib
	}

	class gIBSUF {
		public $vIBSUF; //String
		public $vDif; //gDif
		public $vDevTrib; //gDevTrib
	}
?>