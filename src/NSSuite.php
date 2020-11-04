<?php

require('./src/Compartilhados/Endpoints.php');
require('./src/Compartilhados/Parametros.php');
require('./src/Compartilhados/Genericos.php');

foreach (glob('./src/Requisicoes/_Genericos/*.php') as $filename) { 
    include_once($filename); 
} 
require('./src/Requisicoes/BPe/ConsStatusProcessamentoReqBPe.php');
require('./src/Requisicoes/BPe/DownloadReqBPe.php');
require('./src/Requisicoes/BPe/NaoEmbReqBPe.php');
require('./src/Requisicoes/CTe/ConsStatusProcessamentoReqCTe.php');
require('./src/Requisicoes/CTe/DownloadReqCTe.php');
require('./src/Requisicoes/CTe/InfGTVReqCTe.php');
require('./src/Requisicoes/MDFe/ConsStatusProcessamentoReqMDFe.php');
require('./src/Requisicoes/MDFe/DownloadReqMDFe.php');
require('./src/Requisicoes/NFCe/DownloadReqNFCe.php');
require('./src/Requisicoes/NFCe/Impressao.php');
require('./src/Requisicoes/NFe/ConsStatusProcessamentoReqNFe.php');
require('./src/Requisicoes/NFe/DownloadReqNFe.php');

require('./src/Retornos/BPe/EmitirSincronoRetBPe.php');
require('./src/Retornos/CTe/EmitirSincronoRetCTe.php');
require('./src/Retornos/MDFe/EmitirSincronoRetMDFe.php');
require('./src/Retornos/NFCe/EmitirSincronoRetNFCe.php');
require('./src/Retornos/NFe/EmitirSincronoRetNFe.php');

class NSSuite{

    private $token;
    private $parametros;
    private $endpoints;
    private $genericos;
    
    public function __construct() {
        $this->parametros = new Parametros(1);
        $this->endpoints = new Endpoints;
        $this->genericos = new Genericos;
        $this->token = 'COLOQUE_TOKEN';
    }

    // Esta função envia um conteúdo para uma URL, em requisições do tipo POST
    private function enviaConteudoParaAPI($conteudoAEnviar, $url, $tpConteudo){

        //Inicializa cURL para uma URL->
        $ch = curl_init($url);
        
        //Marca que vai enviar por POST(1=SIM)->
        curl_setopt($ch, CURLOPT_POST, 1);
        
        //Passa um json para o campo de envio POST->
        curl_setopt($ch, CURLOPT_POSTFIELDS, $conteudoAEnviar);
        
        //Marca como tipo de arquivo enviado json
        if ($tpConteudo == 'json')
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'X-AUTH-TOKEN: ' . $this->token));
        else if ($tpConteudo == 'xml')
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml', 'X-AUTH-TOKEN: ' . $this->token));
        else
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/plain', 'X-AUTH-TOKEN: ' . $this->token));
        
        //Marca que vai receber string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        //Inicia a conexão
        $result = curl_exec($ch);
        
        if (curl_error($ch)) {
            echo 'Erro na comunicacao: ' . '<br>';
            echo '<br>';
            echo '<pre>';
            var_dump(curl_getinfo($ch));
            echo '</pre>';
            echo '<br>';
            var_dump(curl_error($ch));
        }

        //Fecha a conexão
        curl_close($ch);

        return json_decode($result, true);
    }
    
    // Métodos específicos de BPe
    public function emitirBPeSincrono($conteudo, $tpConteudo, $CNPJ, $tpDown, $tpAmb, $caminho, $exibeNaTela){
        $modelo = '63';
        $resposta = $this->emitirDocumento($modelo, $conteudo, $tpConteudo);
        $statusEnvio = $resposta['status'];
        $statusConsulta= null;
        $statusDownload= null;
        $cStat= null;
        $chBPe= null;
        $nProt= null;
        $motivo= null;
        $nsNRec= null;
        $erros= null;

        $this->genericos->gravarLinhaLog($modelo, '[EMISSAO_SINCRONA_INICIO]');

        if ($statusEnvio == 200 || $statusEnvio == -6) {
            $nsNRec = $resposta['nsNRec'];
            
            // É necessário aguardar alguns milisegundos antes de consultar o status de processamento
            sleep($this->parametros->TEMPO_ESPERA);

            $consStatusProcessamento = new ConsStatusProcessamentoReqBPe;
            $consStatusProcessamento->CNPJ = $CNPJ;
            $consStatusProcessamento->nsNRec = $nsNRec;
            $consStatusProcessamento->tpAmb = $tpAmb;
            $resposta = $this->consultarStatusProcessamento($modelo, $consStatusProcessamento);
            $statusConsulta = $resposta['status'];

            if ($statusConsulta == 200) {

                $cStat = $resposta['cStat'];

                if ($cStat == 100) {

                    $chBPe = $resposta['chBPe'];
                    $nProt = $resposta['nProt'];
                    $motivo = $resposta['xMotivo'];

                    $downloadBPe = new DownloadReqBPe;
                    $downloadBPe->chBPe = $chBPe;
                    $downloadBPe->tpAmb = $tpAmb;
                    $downloadBPe->tpDown = $tpDown;

                    $resposta = $this->downloadDocumentoESalvar($modelo, $downloadBPe, $caminho, $chBPe . '-BPe', $exibeNaTela);
                    $statusDownload = $resposta['status'];

                    if ($statusDownload != 200) $motivo = $resposta['motivo']; 
                } else {

                    $motivo = $resposta['xMotivo'];
                }
            } elseif ($statusConsulta == -2) {

                $cStat = $resposta['cStat'];
                $motivo = $resposta['erro']['motivo'];
            } else {

                $motivo = $resposta['motivo'];
            }
        } elseif ($statusEnvio == -5){
            
            $cStat = $resposta['erro']['cStat'];
            $motivo = $resposta['erro']['xMotivo'];

        } elseif ($statusEnvio == -4 || $statusEnvio == -2) {

            $motivo = $resposta['motivo'];
            $erros = $resposta['erros'];

        } else {
            try{
                $motivo = $resposta['motivo'];
            }catch(Exception $ex){
                $motivo = $resposta;
            }
        }

        $emitirSincronoRetBPe = new EmitirSincronoRetBPe;
        $emitirSincronoRetBPe->statusEnvio = $statusEnvio;
        $emitirSincronoRetBPe->statusConsulta = $statusConsulta;
        $emitirSincronoRetBPe->statusDownload = $statusDownload;
        $emitirSincronoRetBPe->cStat = $cStat;
        $emitirSincronoRetBPe->chBPe = $chBPe;
        $emitirSincronoRetBPe->nProt = $nProt;
        $emitirSincronoRetBPe->motivo = $motivo;
        $emitirSincronoRetBPe->nsNRec = $nsNRec;
        $emitirSincronoRetBPe->erros = $erros;
        
        $emitirSincronoRetBPe = array_filter((array) $emitirSincronoRetBPe);
        $retorno = json_encode($emitirSincronoRetBPe, JSON_UNESCAPED_UNICODE);
        $this->genericos->gravarLinhaLog($modelo, '[JSON_RETORNO]');
        $this->genericos->gravarLinhaLog($modelo, $retorno);
        $this->genericos->gravarLinhaLog($modelo, '[EMISSAO_SINCRONA_FIM]');
        return $retorno;
    }

    public function naoEmbarque($modelo, $naoEmbReqBPe) {
        switch ($modelo){
            case '63':
                $urlNaoEmb = $this->endpoints->BPeNaoEmb;
                break;
            
            default: 
                throw new Exception('Não definido endpoint de não embarque para o modelo ' . $modelo);   
        }
        
        $json = json_encode((array) $naoEmbReqBPe, JSON_UNESCAPED_UNICODE);

        $this->genericos->gravarLinhaLog($modelo, '[NAO_EMBARQUE_DADOS]');
        $this->genericos->gravarLinhaLog($modelo, $json);

        $resposta = $this->enviaConteudoParaAPI($json, $urlConsulta, 'json');

        $this->genericos->gravarLinhaLog($modelo, '[NAO_EMBARQUE_RESPOSTA]');
        $this->genericos->gravarLinhaLog($modelo, json_encode($resposta));
        return $resposta;
    }

    public function naoEmbarqueESalvar($modelo, $naoEmbReqBPe, $downloadEventoReq, $caminho, $chave, $exibeNaTela) {
        $resposta = $this->naoEmbarque($modelo, $naoEmbReqBPe);
        $status = $resposta['status'];

        if ($status == 200){
            $cStat = $resposta['retEvento']['cStat'];
            if ($cStat == 135){
                $respostaDownloadEvento = $this->downloadEventoESalvar($modelo, $downloadEventoReq, $caminho, $chave, '', $exibeNaTela);
            }
        }
        return $resposta;
    }


    // Métodos específicos de CTe
    public function emitirCTeSincrono($conteudo, $mod, $tpConteudo, $CNPJ, $tpDown, $tpAmb, $caminho, $exibeNaTela) {

        $modelo = $mod;
        $resposta = $this->emitirDocumento($modelo, $conteudo, $tpConteudo);
        $statusEnvio = $resposta['status'];
        $statusConsulta= null;
        $statusDownload= null;
        $cStat= null;
        $chCTe= null;
        $nProt= null;
        $motivo= null;
        $nsNRec= null;
        $erros= null;

        $this->genericos->gravarLinhaLog($modelo, '[EMISSAO_SINCRONA_INICIO]');

        if ($statusEnvio == 200 || $statusEnvio == -6){

            $nsNRec = $resposta['nsNRec'];

            sleep($this->parametros->TEMPO_ESPERA);

            $consStatusProcessamentoReqCTe = new ConsStatusProcessamentoReqCTe;
            $consStatusProcessamentoReqCTe->CNPJ = $CNPJ;
            $consStatusProcessamentoReqCTe->nsNRec = $nsNRec;
            $consStatusProcessamentoReqCTe->tpAmb = $tpAmb;

            $resposta = $this->consultarStatusProcessamento($modelo, $consStatusProcessamentoReqCTe);
            $statusConsulta = $resposta['status'];

            if ($statusConsulta == 200){

                $cStat = $resposta['cStat'];

                if ($cStat == 100 || $cStat == 150){

                    $chCTe = $resposta['chCTe'];
                    $nProt = $resposta['nProt'];
                    $motivo = $resposta['motivo'];

                    $downloadReqCTe = new DownloadReqCTe();
                    $downloadReqCTe->chCTe = $chCTe;
                    $downloadReqCTe->CNPJ = $CNPJ;
                    $downloadReqCTe->tpAmb = $tpAmb;
                    $downloadReqCTe->tpDown = $tpDown;

                    $resposta = $this->downloadDocumentoESalvar($modelo, $downloadReqCTe, $caminho, $chCTe . '-CTe', $exibeNaTela);
                    $statusDownload = $resposta['status'];

                    if ($statusDownload != 200) $motivo = $resposta['motivo'];
                }else{

                    $motivo = $resposta['xMotivo'];
                }
            }else {

                $motivo = $resposta['motivo'];
                $erros = $resposta['erros'];
            }
        }else if ($statusEnvio == -7){

            $motivo = $resposta['motivo'];
            $nsNRec = $resposta['nsNRec'];

        }else if ($statusEnvio == -4 || $statusEnvio == -9){

            $motivo = $resposta['motivo'];
            $erros = $resposta['erros'];

        }else{

            try
            {
                $motivo = $resposta['motivo'];
            }
            catch (Exception $ex)
            {
                $motivo = $resposta;
            }
        }

        $emitirSincronoRetCTe = new EmitirSincronoRetCTe;
        $emitirSincronoRetCTe->statusEnvio = $statusEnvio;
        $emitirSincronoRetCTe->statusConsulta = $statusConsulta;
        $emitirSincronoRetCTe->statusDownload = $statusDownload;
        $emitirSincronoRetCTe->cStat = $cStat;
        $emitirSincronoRetCTe->chCTe = $chCTe;
        $emitirSincronoRetCTe->nProt = $nProt;
        $emitirSincronoRetCTe->motivo = $motivo;
        $emitirSincronoRetCTe->nsNRec = $nsNRec;
        $emitirSincronoRetCTe->erros = $erros;

        $emitirSincronoRetCTe = array_filter((array) $emitirSincronoRetCTe);
        $retorno = json_encode($emitirSincronoRetCTe, JSON_UNESCAPED_UNICODE);

        $this->genericos->gravarLinhaLog($modelo, '[JSON_RETORNO]');
        $this->genericos->gravarLinhaLog($modelo, $retorno);
        $this->genericos->gravarLinhaLog($modelo, '[EMISSAO_SINCRONA_FIM]');
        
        return $retorno;
    }

    public function informarGTV($modelo, $infGTVReqCTe) {
        switch ($modelo)
        {
            case '57':
            case '67':
                $urlInfGTV = $this->$endpoints->CTeCancelamento;
                break;
            
            default: 
                throw new Exception('Não definido endpoint de informação de GTV para o modelo ' . $modelo);
        }
        
        $json = json_encode((array) $infGTVReqCTe, JSON_UNESCAPED_UNICODE);

        $this->genericos->gravarLinhaLog($modelo, '[INFORMACOES_GTV_DADOS]');
        $this->genericos->gravarLinhaLog($modelo, $json);

        $resposta = enviaConteudoParaAPI($json, $urlInfGTV, 'json');

        $this->genericos->gravarLinhaLog($modelo, '[INFORMACOES_GTV_DADOS]');
        $this->genericos->gravarLinhaLog($modelo, json_encode($resposta));

        return $resposta;
    }

    public function informatGTVESalvar($modelo, $infGTVReqCTe, $downloadEventoReq, $caminho, $chave, $exibeNaTela) {
        $resposta = informarGTV($modelo, $infGTVReqCTe);
        $status = $resposta['status'];

        if ($status == 200){
            $respostaDownloadEvento = $this->downloadEventoESalvar($modelo, $downloadEventoReq, $caminho, $chave, '', $exibeNaTela);
        }

        return $resposta;
    }


    // Métodos específicos de MDFe
    public function emitirMDFeSincrono($conteudo, $tpConteudo, $CNPJ, $tpDown, $tpAmb, $caminho, $exibeNaTela) {

        $modelo = '58';
        $resposta = $this->emitirDocumento($modelo, $conteudo, $tpConteudo);
        $statusEnvio = $resposta['status'];
        $statusConsulta= null;
        $statusDownload= null;
        $cStat= null;
        $chMDFe= null;
        $nProt= null;
        $motivo= null;
        $nsNRec= null;
        $erros= null;

        $this->genericos->gravarLinhaLog($modelo, '[EMISSAO_SINCRONA_INICIO]');

        if ($statusEnvio == 200 || $statusEnvio == 100){

            $nsNRec = $resposta['nsNRec'];

            // É necessário aguardar alguns milisegundos antes de consultar o status de processamento
            sleep($this->parametros->TEMPO_ESPERA);

            $consStatusProcessamentoReqMDFe = new ConsStatusProcessamentoReqMDFe();
            $consStatusProcessamentoReqMDFe->CNPJ = $CNPJ;
            $consStatusProcessamentoReqMDFe->nsNRec = $nsNRec;
            $consStatusProcessamentoReqMDFe->tpAmb = $tpAmb;

            $resposta = $this->consultarStatusProcessamento($modelo, $consStatusProcessamentoReqMDFe);
            $statusConsulta = $resposta['status'];

            if ($statusConsulta == 200){

                $cStat = $resposta['cStat'];

                if ($cStat == 100){

                    $chMDFe = $resposta['chMDFe'];
                    $nProt = $resposta['nProt'];
                    $motivo = $resposta['motivo'];

                    $downloadReqMDFe = new DownloadReqMDFe();
                    $downloadReqMDFe->chMDFe = $chMDFe;
                    $downloadReqMDFe->tpDown = $tpDown;
                    $downloadReqMDFe->tpAmb = $tpAmb;

                    $resposta = $this->downloadDocumentoESalvar($modelo, $downloadReqMDFe, $caminho, $chMDFe . '-MDFe', $exibeNaTela);
                    $statusDownload = $resposta['status'];

                    // Testa se houve problema no download
                    if ($statusDownload != 200) $motivo = $resposta['motivo'];
                }else{
                    $motivo = $resposta['xMotivo'];
                }
            }else if ($statusConsulta == -2){

                $cStat = $resposta['erro']['cStat'];
                $motivo = $resposta['erro']['motivo'];

            }else{

                $motivo = $resposta['motivo'];
            }
        }else if ($statusEnvio == -5){

            $cStat = $resposta['erro']['cStat'];
            $motivo = $resposta['erro']['motivo'];

        }else if ($statusEnvio == -4 || $statusEnvio == -2){

            $motivo = $resposta['motivo'];
            $erros = $resposta['erros'];

        }else if ($statusEnvio == -999){

            $motivo = $motivo = $resposta['erro']['xMotivo'];

        }else{
            try
            {
                $motivo = $resposta['motivo'];
            }
            catch (Exception $ex)
            {
                $motivo = $resposta;
            }
        }
        $emitirSincronoRetMDFe = new EmitirSincronoRetMDFe();
        $emitirSincronoRetMDFe->statusEnvio = $statusEnvio;
        $emitirSincronoRetMDFe->statusConsulta = $statusConsulta;
        $emitirSincronoRetMDFe->statusDownload = $statusDownload;
        $emitirSincronoRetMDFe->cStat = $cStat;
        $emitirSincronoRetMDFe->chMDFe = $chMDFe;
        $emitirSincronoRetMDFe->nProt = $nProt;
        $emitirSincronoRetMDFe->motivo = $motivo;
        $emitirSincronoRetMDFe->nsNRec = $nsNRec;
        $emitirSincronoRetMDFe->erros = $erros;

        $emitirSincronoRetMDFe = array_filter((array) $emitirSincronoRetMDFe);

        $retorno = json_encode($emitirSincronoRetMDFe, JSON_UNESCAPED_UNICODE);

        $this->genericos->gravarLinhaLog($modelo, '[JSON_RETORNO]');
        $this->genericos->gravarLinhaLog($modelo, $retorno);
        $this->genericos->gravarLinhaLog($modelo, '[EMISSAO_SINCRONA_FIM]');

        return $retorno;
    }

    public function encerrarDocumento($modelo, $encerrarReq) {
        switch ($modelo){
            case '58':
                $urlEncerramento = $this->endpoints->MDFeEncerramento;
                break; 

            default:
                throw new Exception('Não definido endpoint de encerramento para o modelo ' . $modelo);
        }

        $json = json_encode((array) $encerrarReq, JSON_UNESCAPED_UNICODE);

        $this->genericos->gravarLinhaLog($modelo, '[ENCERRAMENTO_DADOS]');
        $this->genericos->gravarLinhaLog($modelo, $json);

        $resposta = $this->enviaConteudoParaAPI($json, $urlEncerramento, 'json');

        $this->genericos->gravarLinhaLog($modelo, '[ENCERRAMENTO_RESPOSTA]');
        $this->genericos->gravarLinhaLog($modelo, json_encode($resposta));

        return $resposta;
    }

    public function encerrarDocumentoESalvar($modelo, $encerrarReq, $downloadEventoReq, $caminho, $chave, $exibeNaTela) {
        $resposta = $this->encerrarDocumento($modelo, $encerrarReq);
        $status = $resposta['status'];

        if ($status == 200){
            $respostaDownloadEvento = $this->downloadEventoESalvar($modelo, $downloadEventoReq, $caminho, $chave, '', $exibeNaTela);
        }

        return $resposta;
    }

    public function incluirCondutor($modelo, $incCondutorReq) {
        switch ($modelo)
        {
            case '58':
                $urlIncCondutor = $this->endpoints->MDFeIncCondutor;
                break;

            default:
                throw new Exception('Não definido endpoint de inclusão de condutor para o modelo ' . $modelo);
        }

        $json = json_encode((array) $incCondutorReq, JSON_UNESCAPED_UNICODE);

        $this->genericos->gravarLinhaLog($modelo, '[INC_CONDUTOR_DADOS]');
        $this->genericos->gravarLinhaLog($modelo, $json);

        $resposta = $this->enviaConteudoParaAPI($json, $urlIncCondutor, 'json');

        $this->genericos->gravarLinhaLog($modelo, '[INC_CONDUTOR_RESPOSTA]');
        $this->genericos->gravarLinhaLog($modelo, json_encode($resposta));

        return $resposta;
    }

    public function incluirCondutorESalvar($modelo, $incCondutorReq, $downloadEventoReq, $caminho, $chave, $exibeNaTela) {
        $resposta = $this->incluirCondutor($modelo, $incCondutorReq);
        $status = $resposta['status'];

        if ($status == 200){
            $respostaDownloadEvento = $this->downloadEventoESalvar($modelo, $downloadEventoReq, $caminho, $chave, '', $exibeNaTela);
        }

        return $resposta;
    }

    public function consultarNaoEncerrados($modelo, $consNaoEncerradosReq) {
        switch ($modelo){
            case '58':
                $urlConsNaoEncerrados = $this->endpoints->MDFeConsNaoEncerrados;
                break;
            
            default:
                throw new Exception('Não definido endpoint de consulta de não encerrados para o modelo ' . $modelo);
        }

        $json = json_encode((array) $consNaoEncerradosReq, JSON_UNESCAPED_UNICODE);

        $this->genericos->gravarLinhaLog($modelo, '[CONS_NAO_ENCERRADOS_DADOS]');
        $this->genericos->gravarLinhaLog($modelo, $json);

        $resposta = $this->enviaConteudoParaAPI($json, $urlConsNaoEncerrados, 'json');

        $this->genericos->gravarLinhaLog($modelo, '[CONS_NAO_ENCERRADOS_RESPOSTA]');
        $this->genericos->gravarLinhaLog($modelo, json_encode($resposta));

        return $resposta;
    }


    // Métodos específicos de NFCe
    public function emitirNFCeSincrono($conteudo, $tpConteudo, $tpAmb, $caminho, $exibeNaTela) {
        $modelo = '65';
        $resposta = $this->emitirDocumento($modelo, $conteudo, $tpConteudo);
        $statusEnvio = $resposta['status'];
        $statusDownload= null;
        $cStat= null;
        $chNFCe= null;
        $nProt= null;
        $motivo= null;
        $erros= null;

        $this->genericos->gravarLinhaLog($modelo, '[EMISSAO_SINCRONA_INICIO]');

        if ($statusEnvio == 100 || $statusEnvio == -100){

            $cStat = $resposta['nfeProc']['cStat'];

            if ($cStat == 100 || $cStat == 150){
                
                $chNFe = $resposta['nfeProc']['chNFe'];
                $nProt = $resposta['nfeProc']['nProt'];
                $motivo = $resposta['nfeProc']['xMotivo'];

                sleep($this->parametros->TEMPO_ESPERA);

                $downloadReqNFCe = new DownloadReqNFCe;
                $downloadReqNFCe->chNFe = $chNFe;
                $downloadReqNFCe->tpAmb = $tpAmb;
                $downloadReqNFCe->impressao = new Impressao;

                $resposta = $this->downloadDocumentoESalvar($modelo, $downloadReqNFCe, $caminho, $chNFe . '-NFCe', $exibeNaTela);
                $statusDownload = $resposta['status'];

                if ($statusDownload != 100) $motivo = $resposta['motivo'];
            }else{
                $motivo = $resposta['nfeProc']['xMotivo'];
            }
        }else if ($statusEnvio == -995){

            $motivo = $resposta['motivo'];
            $erros = $resposta['erros'];

        }else{
            $motivo = $resposta['motivo'];
        }

        $emitirSincronoRetNFCe= new EmitirSincronoRetNFCe();
        $emitirSincronoRetNFCe->statusEnvio = $statusEnvio;
        $emitirSincronoRetNFCe->statusDownload = $statusDownload;
        $emitirSincronoRetNFCe->cStat = $cStat;
        $emitirSincronoRetNFCe->chNFe = $chNFe;
        $emitirSincronoRetNFCe->nProt = $nProt;
        $emitirSincronoRetNFCe->motivo = $motivo;
        $emitirSincronoRetNFCe->erros = $erros;

        $emitirSincronoRetNFCe = array_filter((array) $emitirSincronoRetNFCe);

        $retorno = json_encode($emitirSincronoRetNFCe, JSON_UNESCAPED_UNICODE);

        $this->genericos->gravarLinhaLog($modelo, '[JSON_RETORNO]');
        $this->genericos->gravarLinhaLog($modelo, $retorno);
        $this->genericos->gravarLinhaLog($modelo, '[EMISSAO_SINCRONA_FIM]');

        return $retorno;
    }


    // Métodos específicos de NFe
    public function emitirNFeSincrono($conteudo, $tpConteudo, $CNPJ, $tpDown, $tpAmb, $caminho, $exibeNaTela) {

        $modelo = '55';
        $statusEnvio = null;
        $statusConsulta = null;
        $statusDownload = null;
        $motivo = null;
        $nsNRec = null;
        $chNFe = null;
        $cStat = null;
        $nProt = null;

        $this->genericos->gravarLinhaLog($modelo, '[EMISSAO_SINCRONA_INICIO]');

        $resposta = $this->emitirDocumento($modelo, $conteudo, $tpConteudo);
        $statusEnvio = $resposta['status'] ;

        if ($statusEnvio == 200 || $statusEnvio == -6){

            $nsNRec = $resposta['nsNRec'];

            // É necessário aguardar alguns milisegundos antes de consultar o status de processamento
            sleep($this->parametros->TEMPO_ESPERA);

            $consStatusProcessamentoReqNFe = new ConsStatusProcessamentoReqNFe();
            $consStatusProcessamentoReqNFe->CNPJ = $CNPJ;
            $consStatusProcessamentoReqNFe->nsNRec = $nsNRec;
            $consStatusProcessamentoReqNFe->tpAmb = $tpAmb;

            $resposta = $this->consultarStatusProcessamento($modelo, $consStatusProcessamentoReqNFe);
            $statusConsulta = $resposta['status'];

            // Testa se a consulta foi feita com sucesso (200)
            if ($statusConsulta == 200){

                $cStat = $resposta['cStat'];

                if ($cStat == 100 || $cStat == 150){

                    $chNFe = $resposta['chNFe'];
                    $nProt = $resposta['nProt'];
                    $motivo = $resposta['xMotivo'];

                    $downloadReqNFe = new DownloadReqNFe();
                    $downloadReqNFe->chNFe = $chNFe;
                    $downloadReqNFe->tpAmb = $tpDown;
                    $downloadReqNFe->tpDown = $tpDown;

                    $resposta = $this->downloadDocumentoESalvar($modelo, $downloadReqNFe, $caminho, $chNFe . '-NFe', $exibeNaTela);
                    $statusDownload = $resposta['status'];

                    if ($statusDownload != 200) $motivo = $resposta['motivo'];
                }else{
                    $motivo = $resposta['xMotivo'];
                }
            }else if ($statusConsulta == -2) {

                $cStat = $resposta['cStat'];
                $motivo = $resposta['erro']['xMotivo'];

            }else{
                $motivo = $resposta['motivo'];
            }
        }else if ($statusEnvio == -7){

            $motivo = $resposta['motivo'];
            $nsNRec = $resposta['nsNRec'];

        }else if ($statusEnvio == -4 || $statusEnvio == -2) {

            $motivo = $resposta['motivo'];
            $erros = $resposta['erros'];

        }else if ($statusEnvio == -999 || $statusEnvio == -5) {

            $motivo = $resposta['erro']['xMotivo'];

        }else{
            try {
                $motivo = $resposta['motivo'];
            }catch (Exception $ex){
                $motivo = $resposta;
            }
        }
        $emitirSincronoRetNFe = new EmitirSincronoRetNFe();
        $emitirSincronoRetNFe->statusEnvio = $statusEnvio;
        $emitirSincronoRetNFe->statusConsulta = $statusConsulta;
        $emitirSincronoRetNFe->statusDownload = $statusDownload;
        $emitirSincronoRetNFe->cStat = $cStat;
        $emitirSincronoRetNFe->chNFe = $chNFe;
        $emitirSincronoRetNFe->nProt = $nProt;
        $emitirSincronoRetNFe->motivo = $motivo;
        $emitirSincronoRetNFe->nsNRec = $nsNRec;
        $emitirSincronoRetNFe->erros = $erros;

        $emitirSincronoRetNFe = array_filter((array) $emitirSincronoRetNFe);

        $retorno = json_encode($emitirSincronoRetNFe, JSON_UNESCAPED_UNICODE);

        $this->genericos->gravarLinhaLog($modelo, '[JSON_RETORNO]');
        $this->genericos->gravarLinhaLog($modelo, $retorno);
        $this->genericos->gravarLinhaLog($modelo, '[EMISSAO_SINCRONA_FIM]');

        return $retorno;
    }


    // Métodos genéricos, compartilhados entre diversas funções
    public function emitirDocumento($modelo, $conteudo, $tpConteudo){
        
        switch($modelo){
            case '63':
                $urlEnvio = $this->endpoints->BPeEnvio;
                break;
            case '57': 
                $urlEnvio = $this->endpoints->CTeEnvio;
                break;          
            case '67': 
                $urlEnvio = $this->endpoints->CTeOSEnvio;
                break;
            
            case '58': 
                $urlEnvio = $this->endpoints->MDFeEnvio;
                break;
            
            case '65': 
                $urlEnvio = $this->endpoints->NFCeEnvio;
                break;
            
            case '55': 
                $urlEnvio = $this->endpoints->NFeEnvio;
                break;
            
            default: 
                throw new Exception('Não definido endpoint de envio para o modelo ' . $modelo);         
        }

        $this->genericos->gravarLinhaLog($modelo, '[ENVIA_DADOS]');
        $this->genericos->gravarLinhaLog($modelo, $conteudo);

        $resposta = $this->enviaConteudoParaAPI($conteudo, $urlEnvio, $tpConteudo);

        $this->genericos->gravarLinhaLog($modelo, '[ENVIA_RESPOSTA]');
        $this->genericos->gravarLinhaLog($modelo, json_encode($resposta));

        return $resposta;
    }

    public function consultarStatusProcessamento($modelo, $consStatusProcessamentoReq){
        switch ($modelo) {
            case '63': 
                $urlConsulta = $this->endpoints->BPeConsStatusProcessamento;
                break;
                
            case '57':
            case '67': 
                $urlConsulta = $this->endpoints->CTeConsStatusProcessamento;
                break;
            
            case '58': 
                $urlConsulta = $this->endpoints->MDFeConsStatusProcessamento;
                break;
            
            case '55': 
                $urlConsulta = $this->endpoints->NFeConsStatusProcessamento;
                break;
            
            default: 
                throw new Exception('Não definido endpoint de consulta para o modelo ' . $modelo);
        }   

        $json = json_encode((array) $consStatusProcessamentoReq, JSON_UNESCAPED_UNICODE);

        $this->genericos->gravarLinhaLog($modelo, '[CONSULTA_DADOS]');
        $this->genericos->gravarLinhaLog($modelo, $json);
        
        $resposta = $this->enviaConteudoParaAPI($json, $urlConsulta, 'json');

        $this->genericos->gravarLinhaLog($modelo, '[CONSULTA_RESPOSTA]');
        $this->genericos->gravarLinhaLog($modelo, json_encode($resposta));

        return $resposta;
    }

    public function downloadDocumento($modelo, $downloadReq){
        switch ($modelo) {
            case '63': 
                $urlDownload = $this->endpoints->BPeDownload;
                break;
            
            case '57':
            case '67': 
                $urlDownload = $this->endpoints->CTeDownload;
                break;
            
            case '58': 
                $urlDownload = $this->endpoints->MDFeDownload;
                break;
            
            case '65': 
                $urlDownload = $this->endpoints->NFCeDownload;
                break;
            
            case '55': 
                $urlDownload = $this->endpoints->NFeDownload;
                break;
            
            default: 
                throw new Exception('Não definido endpoint de Download para o modelo ' . $modelo);
        }   
        
        $json = json_encode((array) $downloadReq, JSON_UNESCAPED_UNICODE);

        $this->genericos->gravarLinhaLog($modelo, '[DOWNLOAD_DADOS]');
        $this->genericos->gravarLinhaLog($modelo, $json);

        $resposta = $this->enviaConteudoParaAPI($json, $urlDownload, 'json');
        $status = $resposta['status'];

        if(($status != 200) || ($status != 100)){
            $this->genericos->gravarLinhaLog($modelo, '[DOWNLOAD_RESPOSTA]');
            $this->genericos->gravarLinhaLog($modelo, json_encode($resposta));
        }else{
            $this->genericos->gravarLinhaLog($modelo, '[DOWNLOAD_STATUS]');
            $this->genericos->gravarLinhaLog($modelo, $status);
        }
        return $resposta;
    }

    public function downloadDocumentoESalvar($modelo, $downloadReq, $caminho, $nome, $exibeNaTela){
        
        $resposta = $this->downloadDocumento($modelo, $downloadReq);
        $status = $resposta['status'];
        if (($status == 200) || ($status == 100)) {
            try{
                if (strlen($caminho) > 0) if (!file_exists($caminho)) mkdir($caminho, true);
                if(substr($caminho, -1) != '/') $caminho= $caminho . '/';
            }catch(Exception $e){
                $this->genericos->gravarLinhaLog($modelo, '[CRIA_DIRETORIO] '+ $caminho);
                $this->genericos->gravarLinhaLog($modelo, $e.getMessage());
                throw new Exception('Exceção capturada: ' + $e.getMessage());
            }

            if ($modelo != '65') {
                
                if (strpos(strtoupper($downloadReq->tpDown), 'X') >= 0) {
                    $xml = $resposta['xml'];
                    $this->genericos->salvaXML($xml, $caminho, $nome);
                }
                if (strpos(strtoupper($downloadReq->tpDown), 'P') >= 0) {
                    $pdf = $resposta['pdf'];
                    $this->genericos->salvaPDF($pdf, $caminho, $nome);

                    if ($exibeNaTela) {
                        $this->genericos->exibirNaTela($caminho, $nome);
                    }   
                }
            } else {

                $xml = $resposta['nfeProc']['xml'];
                $this->genericos->salvaXML($xml, $caminho, $nome);

                $pdf = $resposta['pdf'];
                $this->genericos->salvaPDF($pdf, $caminho, $nome);

                if ($exibeNaTela) {
                    $this->genericos->exibirNaTela($caminho, $nome);
                }   
            }
        }
        return $resposta;
    }

    public function downloadEvento($modelo, $downloadEventoReq) {
        switch ($modelo){
            case '63':
                $urlDownloadEvento = $this->endpoints->BPeDownloadEvento;
                break;

            case '57':
            case '67':
                $urlDownloadEvento = $this->endpoints->CTeDownloadEvento;
                break;

            case '58':
                $urlDownloadEvento = $this->endpoints->MDFeDownloadEvento;
                break;

            case '65':
                $urlDownloadEvento = $this->endpoints->NFCeDownload;
                break;

            case '55':
                $urlDownloadEvento = $this->endpoints->NFeDownloadEvento;
                break;

            default:
                throw new Exception('Não definido endpoint de download de evento para o modelo ' + modelo);
        }

        $json = json_encode((array) $downloadEventoReq, JSON_UNESCAPED_UNICODE);

        $this->genericos->gravarLinhaLog($modelo, '[DOWNLOAD_EVENTO_DADOS]');
        $this->genericos->gravarLinhaLog($modelo, $json);

        $resposta = $this->enviaConteudoParaAPI($json, $urlDownloadEvento, 'json');
        $status = $resposta['status'];

        if(($status != 200) || ($status != 100)){
            $this->genericos->gravarLinhaLog($modelo, '[DOWNLOAD_EVENTO_RESPOSTA]');
            $this->genericos->gravarLinhaLog($modelo, json_encode($resposta));
        }else{
            $this->genericos->gravarLinhaLog($modelo, '[DOWNLOAD_EVENTO_STATUS]');
            $this->genericos->gravarLinhaLog($modelo, $status);
        }

        return $resposta;
    }

    public function downloadEventoESalvar($modelo, $downloadEventoReq, $caminho, $chave, $nSeqEvento, $exibeNaTela) {
        $tpEventoSalvar = '';

        $resposta = $this->downloadEvento($modelo, $downloadEventoReq);
        $status = $resposta['status'];

        if ($status == 200 || $status == 100){

            try{
                if (strlen($caminho) > 0) if (!file_exists($caminho)) mkdir($caminho, true);
                if (substr($caminho, -1) != '/') $caminho= $caminho . '/';

            }catch (Exception $ex){

                $this->genericos->gravarLinhaLog($modelo, '[CRIA_DIRETORIO] '+ $caminho);
                $this->genericos->gravarLinhaLog($modelo, $ex.getMessage());
                throw new Exception('Exceção capturada: ' . $ex.getMessage());
            }


            if (strtoupper($downloadEventoReq->tpEvento) == 'CANC'){
                $tpEventoSalvar = '110111';
            }else if (strtoupper($downloadEventoReq->tpEvento) == 'ENC'){
                $tpEventoSalvar = '110110';
            }else{
                $tpEventoSalvar = '110115';
            }

            $nome = $tpEventoSalvar . $chave . $nSeqEvento . '-procEven';

            if ($modelo != 65){
                
                //Verifica quais arquivos deve salvar
                if ((strpos(strtoupper($downloadEventoReq->tpDown), 'X') >= 0) ){

                    $xml = $resposta['xml'];
                    
                    $this->genericos->salvaXML($xml, $caminho, $nome);
                }
                if ((strpos(strtoupper($downloadEventoReq->tpDown), 'P') >= 0) ){

                    $pdf = $resposta['pdf'];

                    if ($pdf != null || $pdf != ''){

                        $this->genericos->salvaPDF($pdf, $caminho, $nome);

                        if ($exibeNaTela){
                            $this->genericos->exibirNaTela($caminho, $nome);
                        }
                    }
                }
            }else{
                $xml = $resposta['nfeProc']['xml'];
                $this->genericos->salvaXML($xml, $caminho, $nome);

                $pdf = $resposta['pdfCancelamento'];
                $this->genericos->salvaPDF($pdf, $caminho, $nome);

                if ($exibeNaTela){
                    $this->genericos->exibirNaTela($caminho, $nome);
                }
            }
        }
        return $resposta;
    }

    public function cancelarDocumento($modelo, $cancelarReq) {
        switch ($modelo){
            case '63':
                $urlCancelamento = $this->endpoints->BPeCancelamento;
                break;    

            case '57':
            case '67':
                $urlCancelamento = $this->endpoints->CTeCancelamento;
                break;
            
            case '58':
                $urlCancelamento = $this->endpoints->MDFeCancelamento;
                break;
            
            case '65':
                $urlCancelamento = $this->endpoints->NFCeCancelamento;
                break;   

            case '55':
                $urlCancelamento = $this->endpoints->NFeCancelamento;
                 break;

            default:
                throw new Exception('Não definido endpoint de cancelamento para o modelo ' . $modelo);

        }

        $json = json_encode((array) $cancelarReq, JSON_UNESCAPED_UNICODE);

        $this->genericos->gravarLinhaLog($modelo, '[CANCELAMENTO_DADOS]');
        $this->genericos->gravarLinhaLog($modelo, $json);

        $resposta = $this->enviaConteudoParaAPI($json, $urlCancelamento, 'json');

        $this->genericos->gravarLinhaLog($modelo, '[CANCELAMENTO_RESPOSTA]');
        $this->genericos->gravarLinhaLog($modelo, json_encode($resposta));

        return $resposta;
    }

    public function cancelarDocumentoESalvar($modelo, $cancelarReq, $downloadEventoReq, $caminho, $chave, $exibeNaTela){
        $resposta = $this->cancelarDocumento($modelo, $cancelarReq);
        $status = $resposta['status'];
        if ($status == 200 || $status == 135){
            $cStat = $resposta['cStat'];
            if ($cStat == 135){
                $respostaDownloadEvento = $this->downloadEventoESalvar($modelo, $downloadEventoReq, $caminho, $chave, '1', $exibeNaTela);
            }
        }
        
        return $resposta; 
    }

    public function corrigirDocumento($modelo, $corrigirReq) {

        switch ($modelo){
            case '57':
            case '67':
                $urlCCe = $this->endpoints->CTeCCe;
                break;
  
            case '55':
                $urlCCe = $this->endpoints->NFeCCe;
                break;

            default:
                throw new Exception('Não definido endpoint de carta de correção para o modelo ' . $modelo);
        }

        $json = json_encode((array) $corrigirReq, JSON_UNESCAPED_UNICODE);
        
        $this->genericos->gravarLinhaLog($modelo, '[CCE_DADOS]');
        $this->genericos->gravarLinhaLog($modelo, $json);
        
        $resposta = $this->enviaConteudoParaAPI($json, $urlCCe, 'json');

        $this->genericos->gravarLinhaLog($modelo, '[CCE_DADOS]');
        $this->genericos->gravarLinhaLog($modelo, json_encode($resposta));

        return $resposta;
    }

    public function corrigirDocumentoESalvar($modelo, $corrigirReq, $downloadEventoReq, $caminho, $chave, $nSeqEvento, $exibeNaTela) {
        $resposta = $this->corrigirDocumento($modelo, $corrigirReq);
        $status = $resposta['status'];

        if ($status == 200){
                $respostaDownloadEvento = $this->downloadEventoESalvar($modelo, $downloadEventoReq, $caminho, $chave, $nSeqEvento, $exibeNaTela);
        }
        return $resposta;
    }

    public function inutilizarNumeracao($modelo, $inutilizarReq) {

        switch ($modelo){
            case '57':
            case '67':
                $urlInutilizacao = $this->endpoints->CTeInutilizacao;
                break;

            case '65':
                $urlInutilizacao = $this->endpoints->NFCeInutilizacao;
                break;

            case '55':
                $urlInutilizacao = $this->endpoints->NFeInutilizacao;
                break;

            default:
                throw new Exception('Não definido endpoint de inutilização para o modelo ' . $modelo);
        }

        $json = json_encode((array) $inutilizarReq, JSON_UNESCAPED_UNICODE);

        $this->genericos->gravarLinhaLog($modelo, '[INUTILIZAR_DADOS]');
        $this->genericos->gravarLinhaLog($modelo, $json);

        $resposta = $this->enviaConteudoParaAPI($json, $urlInutilizacao, 'json');

        $this->genericos->gravarLinhaLog($modelo, '[INUTILIZAR_RESPOSTA]');
        $this->genericos->gravarLinhaLog($modelo, json_encode($resposta));

        return $resposta;
    }

    public function inutilizarNumeracaoESalvar($modelo, $inutilizarReq, $caminho) {
        $resposta = $this->inutilizarNumeracao($modelo, $inutilizarReq);
        $status = resposta['status'];
        $xml = null;
 
        if ($status == 102 || $status == 200){

            $cStat = resposta['cStat'];

            if ($cStat == 102){

                switch ($modelo){

                    case '57':
                    case '67':
                        $xml = $resposta['retornoInutCTe']['xmlInut'];
                        $chave = $resposta['retornoInutCTe']['chave'];
                        $nome = $chave . '-inutCTe';
                        break;

                    case '65':
                        $xml = $resposta['retInutNFe']['xml'];
                        $chave = $resposta['retInutNFe']['chave'];
                        $nome = $chave . '-inutNFCe';
                        break;

                    case '55':
                        $xml = $resposta['retornoInutNFe']['xmlInut'];
                        $chave = $resposta['retornoInutNFe']['chave'];
                        $nome = $chave . '-inutNFe';
                        break;

                    default:
                        throw new Exception('Nao existe inutilização para este modelo ' . $modelo);
                }
            }
        }else{
            echo'Ocorreu um erro ao inutilizar a numeração, veja o retorno da API para mais informações';
        }

        if ($xml != null)
        {
            if (strlen($caminho) > 0) if (!file_exists($caminho)) mkdir($caminho, true);
            if(substr($caminho, -1) != '/') $caminho= $caminho . '/';
            $this->genericos->salvarXML($xml, $caminho, $nome);
        }

        return $resposta;
    }

    public function consultarCadastroContribuinte($modelo, $consCadReq) {

        switch ($modelo){
            case '57':
            case '67':
                $urlConsCad = $this->endpoints->CTeConsCad;
                break;

            case '55':
                $urlConsCad = $this->endpoints->NFeConsCad;
                break;

            default:
                throw new Exception('Não definido endpoint de consulta de cadastro para o modelo ' . $modelo);
        }

        $json = json_encode((array) $consCadReq, JSON_UNESCAPED_UNICODE);

        $this->genericos->gravarLinhaLog($modelo, '[CONS_CAD_DADOS]');
        $this->genericos->gravarLinhaLog($modelo, $json);        

        $resposta = $this->enviaConteudoParaAPI($json, $urlConsCad, 'json');

        $this->genericos->gravarLinhaLog($modelo, '[CONS_CAD_RESPOSTA]');
        $this->genericos->gravarLinhaLog($modelo, json_encode($resposta));

        return $resposta;
    }

    public function consultarSituacaoDocumento($modelo, $consSitReq) {
        switch ($modelo){
            case '63':
                $urlConsSit = $this->endpoints->BPeConsSit;
                break;

            case '57':
            case '67':
                $urlConsSit = $this->endpoints->CTeConsSit;
                break;

            case '58':
                $urlConsSit = $this->endpoints->MDFeConsSit;
                break;

            case '65':
                $urlConsSit = $this->endpoints->NFCeConsSit;
                break;

            case '55':
                $urlConsSit = $this->endpoints->NFeConsSit;
                break;

            default:
                throw new Exception('Não definido endpoint de consulta de situação para o modelo ' . $modelo);
        }

        $json = json_encode((array) $consSitReq, JSON_UNESCAPED_UNICODE);

        $this->genericos->gravarLinhaLog($modelo, '[CONS_SIT_DADOS]');
        $this->genericos->gravarLinhaLog($modelo, $json);

        $resposta = $this->enviaConteudoParaAPI($json, $urlConsSit, 'json');

        $this->genericos->gravarLinhaLog($modelo, '[CONS_SIT_RESPOSTA]');
        $this->genericos->gravarLinhaLog($modelo, json_encode($resposta));

        return $resposta;
    }

    public function listarNSNRecs($modelo, $listarNSNRecReq) {

        switch ($modelo){
            case '57':
            case '67':
                $urlListarNSNRecs = $this->endpoints->CTeListarNSNRecs;
                break;

            case '58':
                $urlListarNSNRecs = $this->endpoints->MDFeListarNSNRecs;
                break;

            case '55':
                $urlListarNSNRecs = $this->endpoints->NFeListarNSNRecs;
                break;

            default:
                throw new Exception('Não definido endpoint de listagem de nsNRec para o modelo ' . $modelo);
        }

        $json = json_encode((array) $listarNSNRecReq, JSON_UNESCAPED_UNICODE);

        $this->genericos->gravarLinhaLog($modelo, '[LISTAR_NSNRECS_DADOS]');
        $this->genericos->gravarLinhaLog($modelo, $json);

        $resposta = $this->enviaConteudoParaAPI($json, $urlListarNSNRecs, 'json');

        $this->genericos->gravarLinhaLog($modelo, '[LISTAR_NSNRECS_RESPOSTA]');
        $this->genericos->gravarLinhaLog($modelo, json_encode($resposta));

        return $resposta;
    }

    public function enviarEmailDocumento($modelo, $enviarEmailReq) {
        switch ($modelo)
        {
            case '65':
                $urlEnviarEmail = $this->endpoints->NFCeEnvioEmail;
                break;

            case '55':
                $urlEnviarEmail = $this->endpoints->NFeEnvioEmail;
                break;

            default:
                throw new Exception('Não definido endpoint de envio de e-mail para o modelo ' . $modelo);
        }

        $json = json_encode((array) $enviarEmailReq, JSON_UNESCAPED_UNICODE);

        $this->genericos->gravarLinhaLog($modelo, '[ENVIO_EMAIL_DADOS]');
        $this->genericos->gravarLinhaLog($modelo, $json);

        $resposta = $this->enviaConteudoParaAPI($json, $urlEnviarEmail, 'json');

        $this->genericos->gravarLinhaLog($modelo, '[ENVIO_EMAIL_RESPOSTA]');
        $this->genericos->gravarLinhaLog($modelo, json_encode($resposta));

        return $resposta;
    
    }
    
    public function xmlTributos($modelo, $conteudo, $tpConteudo){
        switch ($modelo)
        {
            case '55':
                $urlTributos = $this->endpoints->NFeNSTributos;
                break;
            default:
                throw new Exception('Não definido endpoint do NS Tributos para o modelo ' . $modelo);

        }
        $this->genericos->gravarLinhaLog($modelo, '[GERAR_TRIBUTOS_DADOS]');
        $this->genericos->gravarLinhaLog($modelo, $conteudo);

        $resposta = $this->enviaConteudoParaAPI($conteudo, $urlTributos, $tpConteudo);

        $this->genericos->gravarLinhaLog($modelo, '[GERAR_TRIBUTOS_RESPOSTA]');
        $this->genericos->gravarLinhaLog($modelo, json_encode($resposta));

        $statusEnvio = $resposta['status'];

        if ($statusEnvio == 200){   
            return $resposta['xml'];
        }
        return $resposta;
    }
}
?>
