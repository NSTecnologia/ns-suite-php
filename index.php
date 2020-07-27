<?php
include('./src/NSSuite.php');
include('./src/JSON/NFe/NFeJSON.php');

// Para testes de metodos::.

$ide = new Ide;
$ide->cUF = "43"; 
$ide->cNF = "00462186";
$ide->natOp = "VENDA A VISTA - S"; 
$ide->mod = "55";
$ide->serie = "6";
$ide->nNF = "143";
$ide->dhEmi = "2020-07-27T13:30:00-03:00"; 
$ide->tpNF = "1";
$ide->idDest = "1";
$ide->cMunFG = "4305108"; 
$ide->tpImp = "1";
$ide->tpEmis = "1";
$ide->tpAmb = "2";
$ide->finNFe = "1";
$ide->indFinal = "0";
$ide->indPres = "9";
$ide->procEmi = "0";
$ide->verProc = "4.00";

$enderEmit = new EnderEmit;
$enderEmit->xLgr = "Rua Bento Osvaldo Trisch"; 
$enderEmit->nro = "777"; 
$enderEmit->xCpl = "CX POSTAL 91"; 
$enderEmit->xBairro = "Pendancino"; 
$enderEmit->cMun = "4303509"; 
$enderEmit->xMun = "Caxias do Sul"; 
$enderEmit->UF = "RS"; 
$enderEmit->CEP = "95046600"; 
$enderEmit->fone = "005432200200";

$emit = new Emit;
$emit->CNPJ = "07364617000135"; 
$emit->xNome = "NF-E EMITIDA EM AMBIENTE DE HOMOLOGACAO - SEM VALOR FISCAL"; 
$emit->enderEmit = $enderEmit;
$emit->IE = "0170108708";
$emit->CRT = "1"; 

$enderDest = new EnderDest;
$enderDest->xLgr = "AV ANTONIO DURO"; 
$enderDest->nro = "0"; 
$enderDest->xBairro = "OLARIA"; 
$enderDest->cMun = "4303509"; 
$enderDest->xMun = "CAMAQUA"; 
$enderDest->UF = "RS"; 
$enderDest->CEP = "96180000";
$enderDest->cPais = "1058"; 
$enderDest->xPais = "BRASIL"; 

$dest = new Dest;
$dest->CNPJ = "07364617000135"; 
$dest->xNome = "NF-E EMITIDA EM AMBIENTE DE HOMOLOGACAO - SEM VALOR FISCAL"; 
$dest->enderDest = $enderDest;
$dest->indIEDest = "1";
$dest->IE = "0170108708";
$dest->email = "matheus.mazzoni@nstecnologia.com.br";

$det = array();

$prod = new Prod;
$prod->cProd = "1440859X1_";
$prod->cEAN = "SEM GTIN";
$prod->xProd = "TESTE";
$prod->NCM = "87089990";
$prod->CEST = "0107500";
$prod->CFOP = "5101";
$prod->uCom = "UN";
$prod->qCom = "1.0000";
$prod->vUnCom = "13.50";
$prod->vProd = "13.50";
$prod->cEANTrib = "SEM GTIN";
$prod->uTrib = "UN";
$prod->qTrib = "1.0000";
$prod->vUnTrib = "13.50";	
$prod->indTot = "1";
$prod->nItemPed = "0";
$prod->cBenef = "SEM CBENEF";

$icmssn102 = new ICMSSN102;
$icmssn102->orig = "0";
$icmssn102->CSOSN = "102";

$icms = new ICMS;
$icms->ICMSSN102 = $icmssn102;

$ipiNT = new IPINT;
$ipiNT->CST = "02";

$ipi = new IPI;
$ipi->cEnq = "341";
$ipi->IPINT = $ipiNT;

$pisAliq = new PISAliq;
$pisAliq->CST = "01";
$pisAliq->vBC = "0.00";
$pisAliq->pPIS = "0.00";
$pisAliq->vPIS = "0.00";

$pis = new PIS;
$pis->PISAliq = $pisAliq;

$cofinsAliq = new COFINSAliq;
$cofinsAliq->CST = "01";
$cofinsAliq->vBC = "0.00";
$cofinsAliq->pCOFINS = "0.00";
$cofinsAliq->vCOFINS = "0.00";

$cofins = new COFINS;
$cofins->COFINSAliq = $cofinsAliq;

$imposto = new Imposto;
$imposto->ICMS = $icms;
$imposto->IPI = $ipi;
$imposto->PIS = $pis;
$imposto->COFINS = $cofins;

$detAux = new Det;
$detAux->nItem = "1";
$detAux->prod = $prod;
$detAux->imposto = $imposto;

$det[] = $detAux;

$icmsTot = new ICMSTot;
$icmsTot->vBC = "0.00";
$icmsTot->vICMS = "0.00";
$icmsTot->vICMSDeson = "0.00";
$icmsTot->vFCPUFDest = "0.00";
$icmsTot->vICMSUFDest = "0.00";
$icmsTot->vICMSUFRemet = "0.00";
$icmsTot->vFCP = "0.00";
$icmsTot->vBCST = "0.00";
$icmsTot->vST = "0.00";
$icmsTot->vFCPST = "0.00";
$icmsTot->vFCPSTRet = "0.00";
$icmsTot->vProd = "13.50";
$icmsTot->vFrete = "0.00";
$icmsTot->vSeg = "0.00";
$icmsTot->vDesc = "0.00";
$icmsTot->vII = "0.00";
$icmsTot->vIPI = "0.00";
$icmsTot->vIPIDevol = "0.00";
$icmsTot->vPIS = "0.00";
$icmsTot->vCOFINS = "0.00";
$icmsTot->vOutro = "0.00";
$icmsTot->vNF = "13.50";
$icmsTot->vTotTrib = "0.00";

$total = new Total;
$total->ICMSTot = $icmsTot;

$transp = new Transp;
$transp->modFrete = "9";

$detPag = array();

$detPagAux = new DetPag;
$detPagAux->indPag = "0";
$detPagAux->tPag = "01";
$detPagAux->vPag = "13.50";

$detPag[] = $detPagAux;

$pag = new Pag;
$pag->detPag = $detPag;
$pag->vTroco = "0.00";

$infAdic = new InfAdic;
$infAdic->infCpl = "DESCONTO PIS 0.01 COFINS 0.06 LEI 11.196 DE 21/11/2005";

$infNFe = new InfNFe;
$infNFe->versao = "4.00";
$infNFe->ide = $ide;
$infNFe->emit = $emit;
$infNFe->dest = $dest;
$infNFe->det = $det;
$infNFe->total = $total;
$infNFe->transp = $transp;
$infNFe->pag = $pag;
$infNFe->infAdic = $infAdic;

$nfe = new NFe;
$nfe->infNFe = $infNFe;

$nfeJSON = new NFeJSON;
$nfeJSON->NFe = $nfe;

$conteudo = json_encode($nfeJSON, JSON_UNESCAPED_UNICODE);
$NSSuite = new NSSuite();
       
$tpConteudo  = "json"; 
$cnpjEmit    = "07364617000135";
$tpDown      = "XP"; 
$tpAmb       = "2"; 
$caminho     = "./notas/"; 
$exibeNaTela = true;


$retorno = $NSSuite->emitirNFeSincrono($conteudo, $tpConteudo, $cnpjEmit, $tpDown, $tpAmb, $caminho, $exibeNaTela);

?>
