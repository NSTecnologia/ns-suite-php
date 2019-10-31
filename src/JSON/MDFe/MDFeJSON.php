class InfMunCarrega {
	public $cMunCarrega; //String
	public $xMunCarrega; //String
}

class InfPercurso {
	public $UFPer; //String
}

class Ide {
	public $cUF; //String
	public $tpAmb; //String
	public $tpEmit; //String
	public $tpTransp; //String
	public $mod; //String
	public $serie; //String
	public $nMDF; //String
	public $cMDF; //String
	public $cDV; //String
	public $modal; //String
	public $dhEmi; //String
	public $tpEmis; //String
	public $procEmi; //String
	public $verProc; //String
	public $UFIni; //String
	public $UFFim; //String
	public $infMunCarrega; //array(InfMunCarrega)
	public $infPercurso; //array(InfPercurso)
	public $dhIniViagem; //String
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
	public $xNome; //String
	public $xFant; //String
	public $enderEmit; //EnderEmit 
}

class InfCTe {
	public $chCTe; //String
	public $SegCodBarra; //String
	public $indReentrega; //String
	public $infUnidTransp; //array(InfUnidTransp)
	public $peri; //array(Peri)
}

class LacUnidCarga {
	public $nLacre; //String
}

class Peri {
	public $nONU; //String
	public $xNomeAE; //String
	public $xClaRisco; //String
	public $grEmb; //String
	public $qTotProd; //String
	public $qVolTipo; //String
}

class InfNFe {
	public $chNFe; //String
	public $SegCodBarra; //String
	public $indReentrega; //String
	public $infUnidTransp; //array(InfUnidTransp)
	public $peri; //array(Peri)
}

class LacUnidTransp {
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

class InfMDFeTransp {
	public $chMDFe; //String
	public $indReentrega; //String
	public $infUnidTransp; //array(InfUnidTransp)
	public $peri; //array(Peri)
}

class InfMunDescarga {
	public $cMunDescarga; //String
	public $xMunDescarga; //String
	public $infCTe; //array(InfCTe)
	public $infNFe; //array(InfNFe)
	public $infMDFeTransp; //array(InfMDFeTransp)
}

class InfDoc {
	public $infMunDescarga; //array(InfMunDescarga)
}

class InfResp {
	public $respSeg; //String
	public $CNPJ; //String
	public $CPF; //String
}

class InfSeg {
	public $xSeg; //String
	public $CNPJ; //String
}

class Seg {
	public $infResp; //InfResp 
	public $infSeg; //InfSeg 
	public $nApol; //String
	public $nAver; //array(String)
}

class Tot {
	public $qCTe; //String
	public $qNFe; //String
	public $qMDFe; //String
	public $vCarga; //String
	public $cUnid; //String
	public $qCarga; //String
}

class Lacre {
	public $nLacre; //String
}

class AutXML {
	public $CNPJ; //String
	public $CPF; //String
}

class InfAdic {
	public $infAdFisco; //String
	public $infCpl; //String
}

class InfCIOT {
	public $CIOT; //String
	public $CPF; //String
	public $CNPJ; //String
}

class Disp {
	public $CNPJForn; //String
	public $CNPJPg; //String
	public $CPFPg; //String
	public $nCompra; //String
	public $vValePed; //String
}

class ValePed {
	public $disp; //array(Disp)
}

class InfContratante {
	public $CPF; //String
	public $CNPJ; //String
}

class InfANTT {
	public $RNTRC; //String
	public $infCIOT; //array(InfCIOT)
	public $valePed; //ValePed 
	public $infContratante; //array(InfContratante)
}

class Prop {
	public $CPF; //String
	public $CNPJ; //String
	public $RNTRC; //String
	public $xNome; //String
	public $IE; //String
	public $UF; //String
	public $tpProp; //String
}

class Condutor {
	public $xNome; //String
	public $CPF; //String
}

class VeicTracao {
	public $cInt; //String
	public $placa; //String
	public $RENAVAM; //String
	public $tara; //String
	public $capKG; //String
	public $capM3; //String
	public $prop; //Prop 
	public $condutor; //array(Condutor)
	public $tpRod; //String
	public $tpCar; //String
	public $UF; //String
}

class VeicReboque {
	public $cInt; //String
	public $placa; //String
	public $RENAVAM; //String
	public $tara; //String
	public $capKG; //String
	public $capM3; //String
	public $prop; //Prop 
	public $tpCar; //String
	public $UF; //String
}

class LacRodo {
    public $nLacre; //String
}

class Rodo {
    public $infANTT; //InfANTT 
    public $veicTracao; //VeicTracao 
    public $veicReboque; //array(VeicReboque)
    public $codAgPorto; //String
    public $lacRodo; //array(LacRodo)
}

class Aereo {
    public $nac; //String
    public $matr; //String
    public $nVoo; //String
    public $cAerEmb; //String
    public $cAerDes; //String
    public $dVoo; //String
}

class InfTermCarreg {
    public $cTermCarreg; //String
    public $xTermCarreg; //String
}

class InfTermDescarreg {
    public $cTermDescarreg; //String
    public $xTermDescarreg; //String
}

class InfEmbComb {
    public $cEmbComb; //String
    public $xBalsa; //String
}

class InfUnidCargaVazia {
    public $idUnidCargaVazia; //String
    public $tpUnidCargaVazia; //String
}

class InfUnidTranspVazia {
    public $idUnidTranspVazia; //String
    public $tpUnidTranspVazia; //String
}

class Aquav {
    public $irin; //String
    public $tpEmb; //String
    public $cEmbar; //String
    public $xEmbar; //String
    public $nViag; //String
    public $cPrtEmb; //String
    public $cPrtDest; //String
    public $prtTrans; //String
    public $tpNav; //String
    public $infTermCarreg; //array(InfTermCarreg)
    public $infTermDescarreg; //array(InfTermDescarreg)
    public $infEmbComb; //array(InfEmbComb)
    public $infUnidCargaVazia; //array(InfUnidCargaVazia)
    public $infUnidTranspVazia; //array(InfUnidTranspVazia)
}

class Trem {
    public $xPref; //String
    public $dhTrem; //String
    public $xOri; //String
    public $xDest; //String
    public $qVag; //String
}

class Vag {
    public $pesoBC; //String
    public $pesoR; //String
    public $tpVag; //String
    public $serie; //String
    public $nVag; //String
    public $nSeq; //String
    public $TU; //String
}

class Ferrov {
    public $trem; //Trem 
    public $vag; //array(Vag)
}

class InfModal
{
    public $rodo; //Rodo 
    public $aereo; //Aereo 
    public $aquav; //Aquav 
    public $ferrov; //Ferrov 
    public $versaoModal; //String
}

class InfMDFe
{
    public $versao; //String
    public $Id; //String
    public $ide; //Ide
    public $emit; //Emit
    public $infDoc; //infDoc
    public $seg; //array(Seg)
    public $tot; //Tot
    public $lacres; //array(Lacre)
    public $autXML; //array(AutXML)
    public $infAdic; //InfAdic 
    public $infModal; //InfModal 
}

class MDFe
{
    public $infMDFe; //InfMDFe 
}

public class MDFeJSON
{
    public $MDFe; //MDFe
}


