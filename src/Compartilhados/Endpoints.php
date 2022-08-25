<?php
class Endpoints {
    // BP-e
    public $BPeEnvio = 'https://bpe.ns.eti.br/v1/bpe/issue';
    public $BPeConsStatusProcessamento  = 'https://bpe.ns.eti.br/v1/bpe/issue/status';
    public $BPeDownload  = 'https://bpe.ns.eti.br/v1/bpe/get';
    public $BPeDownloadEvento  = 'https://bpe.ns.eti.br/v1/bpe/get/event';
    public $BPeCancelamento  = 'https://bpe.ns.eti.br/v1/bpe/cancel';
    public $BPeNaoEmb  = 'https://bpe.ns.eti.br/v1/bpe/naoemb';
    public $BPeConsSit  = 'https://bpe.ns.eti.br/v1/bpe/status';
    public $BPeAltPoltrona = 'https://bpe.ns.eti.br/v1/bpe/alterpol';
    public $BPeExcBagagem = 'https://bpe.ns.eti.br/v1/bpe/excessobag';

    // CT-e
    public $CTeEnvio  = 'https://cte.ns.eti.br/cte/issue';
    public $CTeOSEnvio  = 'https://cte.ns.eti.br/cte/issueos';
    public $CTeConsStatusProcessamento  = 'https://cte.ns.eti.br/cte/issueStatus/300';
    public $CTeDownload  = 'https://cte.ns.eti.br/cte/get/300';
    public $CTeDownloadEvento  = 'https://cte.ns.eti.br/cte/get/event/300';
    public $CTeCancelamento  = 'https://cte.ns.eti.br/cte/cancel/300';
    public $CTeCCe  = 'https://cte.ns.eti.br/cte/cce/300';
    public $CTeConsCad  = 'https://cte.ns.eti.br/util/conscad';
    public $CTeConsSit  = 'https://cte.ns.eti.br/cte/stats/300';
    public $CTeInfGTV  = 'https://cte.ns.eti.br/cte/gtv';
    public $CTeInutilizacao  = 'https://cte.ns.eti.br/cte/inut';
    public $CTeListarNSNRecs  = 'https://cte.ns.eti.br/util/list/nsnrecs';
    public $CTePrevia = "https://cte.ns.eti.br/util/previa/cte";

    // DDF-e
    public $DDFeDesacordo  = 'https://ddfe.ns.eti.br/events/cte/disagree';
    public $DDFeDownloadUnico  = 'https://ddfe.ns.eti.br/dfe/unique';
    public $DDFeDownloadLote  = 'https://ddfe.ns.eti.br/dfe/bunch';
    public $DDFeManifestacao  = 'https://ddfe.ns.eti.br/events/manif';

    // MDF-e
    public $MDFeEnvio  = 'https://mdfe.ns.eti.br/mdfe/issue';
    public $MDFeConsStatusProcessamento  = 'https://mdfe.ns.eti.br/mdfe/issue/status';
    public $MDFeDownload  = 'https://mdfe.ns.eti.br/mdfe/get';
    public $MDFeDownloadEvento  = 'https://mdfe.ns.eti.br/mdfe/get/event';
    public $MDFeCancelamento  = 'https://mdfe.ns.eti.br/mdfe/cancel';
    public $MDFeEncerramento  = 'https://mdfe.ns.eti.br/mdfe/closure';
    public $MDFeIncCondutor  = 'https://mdfe.ns.eti.br/mdfe/adddriver';
    public $MDFeConsNaoEncerrados  = 'https://mdfe.ns.eti.br/util/consnotclosed';
    public $MDFeConsSit  = 'https://mdfe.ns.eti.br/mdfe/stats';
    public $MDFePrevia  = 'https://mdfe.ns.eti.br/util/preview/mdfe';
    public $MDFeListarNSNRecs  = 'https://mdfe.ns.eti.br/util/list/nsnrecs';

    // NFC-e
    public $NFCeEnvio  = 'https://nfce.ns.eti.br/v1/nfce/issue';
    public $NFCeDownload  = 'https://nfce.ns.eti.br/v1/nfce/get';
    public $NFCeCancelamento  = 'https://nfce.ns.eti.br/v1/nfce/cancel';
    public $NFCeConsSit  = 'https://nfce.ns.eti.br/v1/nfce/status';
    public $NFCeEnvioEmail  = 'https://nfce.ns.eti.br/v1/util/resendemail';
    public $NFCeInutilizacao  = 'https://nfce.ns.eti.br/v1/nfce/inut';
    public $NFCePrevia = "https://nfce.ns.eti.br/v1/util/preview/nfce";

    // NF-e
    public $NFeEnvio  = 'https://nfe.ns.eti.br/nfe/issue';
    public $NFeConsStatusProcessamento  = 'https://nfe.ns.eti.br/nfe/issue/status';
    public $NFeDownload  = 'https://nfe.ns.eti.br/nfe/get';
    public $NFeDownloadEvento  = 'https://nfe.ns.eti.br/nfe/get/event';
    public $NFeCancelamento  = 'https://nfe.ns.eti.br/nfe/cancel';
    public $NFeCCe  = 'https://nfe.ns.eti.br/nfe/cce';
    public $NFeConsStatusSefaz  = 'https://nfe.ns.eti.br/util/wssefazstatus';
    public $NFeConsCad  = 'https://nfe.ns.eti.br/util/conscad';
    public $NFeConsSit  = 'https://nfe.ns.eti.br/nfe/stats';
    public $NFeEnvioEmail  = 'https://nfe.ns.eti.br/util/resendemail';
    public $NFeInutilizacao  = 'https://nfe.ns.eti.br/nfe/inut';
    public $NFeListarNSNRecs  = 'https://nfe.ns.eti.br/util/list/nsnrecs';
    public $NFePrevia  = 'https://nfe.ns.eti.br/util/preview/nfe';
    public $NFeNSTributos = 'https://tributos.ns.eti.br/v1/nfe';
}
?>