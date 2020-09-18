<?php
	class Toma3 {
		public $toma; //String
	}

	class EnderToma {
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
	}

	class Toma4 {
		public $toma; //String
		public $CNPJ; //String
		public $CPF; //String
		public $IE; //String
		public $xNome; //String
		public $xFant; //String
		public $fone; //String
		public $enderToma; //EnderToma 
		public $email; //String
	}

	class Ide {
		public $cUF; //String
		public $cCT; //String
		public $CFOP; //String
		public $natOp; //String
		public $mod; //String
		public $serie; //String
		public $nCT; //String
		public $dhEmi; //String
		public $tpImp; //String
		public $tpEmis; //String
		public $cDV; //String
		public $tpAmb; //String
		public $tpCTe; //String
		public $procEmi; //String
		public $verProc; //String
		public $cMunEnv; //String
		public $xMunEnv; //String
		public $UFEnv; //String
		public $modal; //String
		public $tpServ; //String
		public $cMunIni; //String
		public $xMunIni; //String
		public $UFIni; //String
		public $cMunFim; //String
		public $xMunFim; //String
		public $UFFim; //String
		public $retira; //String
		public $xDetRetira; //String
		public $indIEToma; //String
		public $toma3; //Toma3 
		public $toma4; //Toma4 
		public $dhCont; //String
		public $xJust; //String
	}

	class Pass {
		public $xPass; //String
	}

	class Fluxo {
		public $xOrig; //String
		public $pass; //array(Pass)
		public $xDest; //String
		public $xRota; //String
	}

	class SemData {
		public $tpPer; //String
	}

	class ComData {
		public $tpPer; //String
		public $dProg; //String
	}

	class NoPeriodo {
		public $tpPer; //String
		public $dIni; //String
		public $dFim; //String
	}

	class SemHora {
		public $tpHor; //String
	}

	class ComHora {
		public $tpHor; //String
		public $hProg; //String
	}

	class NoInter {
		public $tpHor; //String
		public $hIni; //String
		public $hFim; //String
	}

	class Entrega {
		public $semData; //SemData 
		public $comData; //ComData 
		public $noPeriodo; //NoPeriodo 
		public $semHora; //SemHora 
		public $comHora; //ComHora 
		public $noInter; //NoInter 
	}

	class ObsCont {
		public $xCampo; //String
		public $xTexto; //String
	}

	class ObsFisco {
		public $xCampo; //String
		public $xTexto; //String
	}

	class Compl {
		public $xCaracAd; //String
		public $xCaracSer; //String
		public $xEmi; //String
		public $fluxo; //Fluxo 
		public $Entrega; //Entrega 
		public $origCalc; //String
		public $destCalc; //String
		public $xObs; //String
		public $ObsCont; //array(ObsCont)
		public $ObsFisco; //array(ObsFisco)
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
	}

	class Emit {
		public $CNPJ; //String
		public $IE; //String
		public $IEST; //String
		public $xNome; //String
		public $xFant; //String
		public $enderEmit; //EnderEmit 
	}

	class EnderReme {
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
	}

	class Rem {
		public $CNPJ; //String
		public $CPF; //String
		public $IE; //String
		public $xNome; //String
		public $xFant; //String
		public $fone; //String
		public $enderReme; //EnderReme 
		public $email; //String
	}

	class EnderExped {
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
	}

	class Exped {
		public $CNPJ; //String
		public $CPF; //String
		public $IE; //String
		public $xNome; //String
		public $fone; //String
		public $enderExped; //EnderExped 
		public $email; //String
	}

	class EnderReceb {
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
	}

	class Receb {
		public $CNPJ; //String
		public $CPF; //String
		public $IE; //String
		public $xNome; //String
		public $fone; //String
		public $enderReceb; //EnderReceb 
		public $email; //String
	}

	class EnderDest {
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
	}

	class Dest {
		public $CNPJ; //String
		public $CPF; //String
		public $IE; //String
		public $xNome; //String
		public $fone; //String
		public $ISUF; //String
		public $enderDest; //EnderDest 
		public $email; //String
	}

	class Comp {
		public $xNome; //String
		public $vComp; //String
	}

	class VPrest {
		public $vTPrest; //String
		public $vRec; //String
		public $Comp; //array(Comp)
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

	class ICMS60 {
		public $CST; //String
		public $vBCSTRet; //String
		public $vICMSSTRet; //String
		public $pICMSSTRet; //String
		public $vCred; //String
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
		public $CST; //String
		public $pRedBCOutraUF; //String
		public $vBCOutraUF; //String
		public $pICMSOutraUF; //String
		public $vICMSOutraUF; //String
	}

	class ICMSSN {
		public $CST; //String
		public $indSN; //String
	}

	class ICMS {
		public $ICMS00; //ICMS00 
		public $ICMS20; //ICMS20 
		public $ICMS45; //ICMS40 
		public $ICMS60; //ICMS60 
		public $ICMS90; //ICMS90 
		public $ICMSOutraUF; //ICMSOutraUF
		public $ICMSSN; //ICMSSN
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

	class Imp {
		public $ICMS; //ICMS 
		public $vTotTrib; //String
		public $infAdFisco; //String
		public $ICMSUFFim; //ICMSUFFim
	}

	class InfQ {
		public $cUnid; //String
		public $tpMed; //String
		public $qCarga; //String
	}

	class InfCarga {
		public $vCarga; //String
		public $proPred; //String
		public $infQ; //array(InfQ)
		public $vCargaAverb; //String
	}

	class LacUnidTransp {
		public $nLacre; //String
	}

	class InfNF {
		public $nRoma; //String
		public $nPed; //String
		public $mod; //String
		public $serie; //String
		public $nDoc; //String
		public $dEmi; //String
		public $vBC; //String
		public $vICMS; //String
		public $vBCST; //String
		public $vST; //String
		public $vProd; //String
		public $vNF; //String
		public $nCFOP; //String
		public $nPeso; //String
		public $PIN; //String
		public $dPrev; //String
		public $infUnidCarga; //array(InfUnidCarga)
		public $infUnidTransp; //array(InfUnidTransp)
	}

	class InfNFe {
		public $chave; //String
		public $PIN; //String
		public $dPrev; //String
		public $infUnidCarga; //array(InfUnidCarga)
		public $infUnidTransp; //array(InfUnidTransp)
	}

	class LacUnidCarga {
		public $nLacre; //String
	}

	class InfUnidCarga {
		public $tpUnidCarga; //String
		public $idUnidCarga; //String
		public $lacUnidCarga; //array(LacUnidCarga)
		public $qtdRat; //String
	}

	class InfUnidTransp {
		public $tpUnidTransp; //String
		public $idUnidTransp; //String
		public $lacUnidTransp; //array(LacUnidTransp)
		public $infUnidCarga; //array(InfUnidCarga)
		public $qtdRat; //String
	}

	class InfOutro {
		public $tpDoc; //String
		public $descOutros; //String
		public $nDoc; //String
		public $dEmi; //String
		public $vDocFisc; //String
		public $dPrev; //String
		public $infUnidCarga; //array(InfUnidCarga)
		public $infUnidTransp; //array(InfUnidTransp)
	}

	class InfDoc {
		public $infNF; //String
		public $infNFe; //String
		public $infOutros; //String
	}

	class IdDocAntPap {
		public $tpDoc; //String
		public $serie; //String
		public $subser; //String
		public $nDoc; //String
		public $dEmi; //String
	}

	class IdDocAntEle {
		public $chCTe; //String
	}

	class IdDocAnt {
		public $idDocAntPap; //array(IdDocAntPap)
		public $idDocAntEle; //array(IdDocAntEle)
	}

	class EmiDocAnt {
		public $CNPJ; //String
		public $CPF; //String
		public $IE; //String
		public $UF; //String
		public $xNome; //String
		public $idDocAnt; //array(IdDocAnt)
	}

	class DocAnt {
		public $emiDocAnt; //array(EmiDocAnt)
	}

	class VeicNovo {
		public $chassi; //String
		public $cCor; //String
		public $xCor; //String
		public $cMod; //String
		public $vUnit; //String
		public $vFrete; //String
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

	class RefNF {
		public $CNPJ; //String
		public $CPF; //String
		public $mod; //String
		public $serie; //String
		public $subserie; //String
		public $nro; //String
		public $valor; //String
		public $dEmi; //String
	}

	class TomaICMS {
		public $refNFe; //String
		public $refNF; //RefNF 
		public $refCte; //String
	}

	class InfCteSub {
		public $chCte; //String
		public $refCteAnu; //String
		public $tomaICMS; //TomaICMS 
		public $indAlteraToma; //String
	}

	class InfGlobalizado {
		public $xObs; //String
	}

	class InfCTeMultimodal {
		public $chCTeMultimodal; //String
	}

	class InfServVinc {
		public $infCTeMultimodal; //array(InfCTeMultimodal)
	}

	class InfCTeNorm {
		public $infCarga; //InfCarga 
		public $infDoc; //InfDoc 
		public $docAnt; //DocAnt  
		public $veicNovos; //array(VeicNovo)
		public $cobr; //Cobr
		public $infCteSub; //InfCteSub 
		public $infGlobalizado; //InfGlobalizado 
		public $infServVinc; //InfServVinc 
	}

	class InfCteComp {
		public $chCTe; //String
	}

	class InfCteAnu {
		public $chCTe; //String
		public $dEmi; //String
	}

	class AutXML {
		public $CNPJ; //String
		public $CPF; //String
	}

	class InfCte
	{
		public $versao; //String
		public $ide; //String
		public $compl; //String
		public $emit; //String
		public $rem; //String
		public $exped; //String
		public $receb; //String
		public $dest; //String
		public $vPrest; //String
		public $imp; //String
		public $infCTeNorm; //String
		public $infCteComp; //String
		public $infCteAnu; //String
		public $autXML; //String
	}

	class CTe
	{
		public $infCte; //String
	}

	class EmiOcc
	{
		public $CNPJ; //String
		public $cInt; //String
		public $IE; //String
		public $UF; //String
		public $fone; //String
	}

	class Occ
	{
		public $serie; //String
		public $nOcc; //String
		public $dEmi; //String
		public $emiOcc; //String
	}

	class Rodo
	{
		public $xmlns; //String
		public $RNTRC; //String
		public $occ; //String
	}

	class NatCarga
	{
		public $xDime; //String
		public $cInfManu; //String
	}

	class Tarifa
	{
		public $CL; //String
		public $cTar; //String
		public $vTar; //String
	}

	class InfTotAP
	{
		public $qTotProd; //String
		public $uniAP; //String
	}

	class Peri
	{
		public $nONU; //String
		public $qTotEmb; //String
		public $infTotAP; //String
	}

	class Aereo
	{
		public $nMinu; //String
		public $nOCA; //String
		public $dPrevAereo; //String
		public $natCarga; //String
		public $tarifa; //String
		public $peri; //String
	}

	class Balsa
	{
		public $xBalsa; //String
	}

	class Lacre
	{
		public $nLacre; //String
	}

	class DetCont
	{
		public $nCont; //String
		public $lacre; //String
		public $infDoc; //String
	}

	class Aquav
	{
		public $vPrest; //String
		public $vAFRMM; //String
		public $xNavio; //String
		public $balsa; //String
		public $nViag; //String
		public $direc; //String
		public $irin; //String
		public $detCont; //String
	}

	class EnderFerro
	{
		public $xLgr; //String
		public $nro; //String
		public $xCpl; //String
		public $xBairro; //String
		public $cMun; //String
		public $xMun; //String
		public $CEP; //String
		public $UF; //String
	}

	class FerroEnv
	{
		public $CNPJ; //String
		public $cInt; //String
		public $IE; //String
		public $xNome; //String
		public $enderFerro; //String
	}

	class TrafMut
	{
		public $respFat; //String
		public $ferrEmi; //String
		public $vFrete; //String
		public $chCTeFerroOrigem; //String
		public $ferroEnv; //String
	}

	class Ferrov
	{
		public $tpTraf; //String
		public $trafMut; //String
		public $fluxo; //String
	}

	class Duto
	{
		public $vTar; //String
		public $dIni; //String
		public $dFim; //String
	}

	class InfSeg
	{
		public $xSeg; //String
		public $CNPJ; //String
	}

	class Seg
	{
		public $infSeg; //String
		public $nApol; //String
		public $nAver; //String
	}

	class Multimodal
	{
		public $COTM; //String
		public $indNegociavel; //String
		public $seg; //String
	}

	class InfModal
	{
		public $versaoModal; //String
		public $rodo; //Rodo 
		public $aereo; //Aereo 
		public $aquav; //Aquav 
		public $ferrov; //Ferrov 
		public $duto; //Duto 
		public $multimodal; //Multimodal 
	}

	class CTeJSON
	{
		public $CTe; //CTe 
		public $infModal; //InfModal 
	}
?>
  
