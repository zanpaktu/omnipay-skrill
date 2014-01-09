<?php
namespace Omnipay\Skrill\Message;

/**
 * Skrill Payment Method
 *
 * Codes required for applicable payment methods when using the Split Gateway.
 *
 * @author Joao Dias <joao.dias@cherrygroup.com>
 * @copyright 2013-2014 Cherry Ltd.
 * @license http://opensource.org/licenses/mit-license.php MIT
 * @version 6.3 Merchant Integration Manual
 */
abstract class PaymentMethod
{
    /**
     * Skrill Direct (Online Bank Transfer)
     * Supported countries: Germany, United Kingdom, France, Italy, Spain, Hungary, Austria
     */
    const SKRILL_DIRECT               = 'OBT';

    /**
     * Giropay
     * Supported countries: Germany
     */
    const GIROPAY                     = 'GIR';

    /**
     * Direct Debit / ELV
     * Supported countries: Germany
     */
    const DIRECT_DEBIT_ELV            = 'DIB';

    /**
     * Sofortüberweisung
     * Supported countries: Germany, Austria, Belgium, Netherlands, Switzerland, United Kingdom
     */
    const SOFORTUEBERWEISUNG          = 'SFT';

    /**
     * eNETS
     * Supported countries: Singapore
     */
    const ENETS                       = 'ENT';

    /**
     * Nordea Solo
     * Supported countries: Sweden
     */
    const NORDEA_SOLO_SWE             = 'EBT';

    /**
     * Nordea Solo
     * Supported countries: Finland
     */
    const NORDEA_SOLO_FIN             = 'SO2';

    /**
     * iDEAL
     * Supported countries: Netherlands
     */
    const IDEAL                       = 'IDL';

    /**
     * EPS (Netpay)
     * Supported countries: Austria
     */
    const EPS_NETPAY                  = 'NPY';

    /**
     * POLi
     * Supported countries: Australia
     */
    const POLI                        = 'PLI';

    /**
     * All Polish Banks
     * Supported countries: Poland
     */
    const ALL_POLISH_BANKS            = 'PWY';

    /**
     * ING Bank Slaski
     * Supported countries: Poland
     */
    const ING_BANK_SLASKI             = 'PWY5';

    /**
     * PKO BP (PKO Inteligo)
     * Supported countries: Poland
     */
    const PKO_BP_PKO_INTELIGO         = 'PWY6';

    /**
     * Multibank (Multitransfer)
     * Supported countries: Poland
     */
    const MULTIBANK_MULTITRANSFER     = 'PWY7';

    /**
     * Lukas Bank
     * Supported countries: Poland
     */
    const LUKAS_BANK                  = 'PWY14';

    /**
     * Bank BPH
     * Supported countries: Poland
     */
    const BANK_BPH                    = 'PWY15';

    /**
     * InvestBank
     * Supported countries: Poland
     */
    const INVEST_BANK                 = 'PWY17';

    /**
     * PeKaO S.A.
     * Supported countries: Poland
     */
    const PEKAO_SA                    = 'PWY18';

    /**
     * Citibank handlowy
     * Supported countries: Poland
     */
    const CITIBANK_HANDLOWY           = 'PWY19';

    /**
     * Bank Zachodni WBK (Przelew24)
     * Supported countries: Poland
     */
    const BANK_ZACHODNI_WBK_PRZELEW24 = 'PWY20';

    /**
     * BGŻ
     * Supported countries: Poland
     */
    const BGZ                         = 'PWY21';

    /**
     * Millenium
     * Supported countries: Poland
     */
    const MILLENIUM                   = 'PWY22';

    /**
     * mBank (mTransfer)
     * Supported countries: Poland
     */
    const MBANK_MTRANSFER             = 'PWY25';

    /**
     * Płace z Inteligo
     * Supported countries: Poland
     */
    const PLACE_Z_INTELIGO            = 'PWY26';

    /**
     * Bank Ochrony Srodowiska
     * Supported countries: Poland
     */
    const BANK_OCHRONY_SRODOWISKA     = 'PWY28';

    /**
     * Nordea
     * Supported countries: Poland
     */
    const NORDEA                      = 'PWY32';

    /**
     * Fortis Bank
     * Supported countries: Poland
     */
    const FORTIS_BANK                 = 'PWY33';

    /**
     * Deutsche Bank PBC S.A.
     * Supported countries: Poland
     */
    const DEUTSCHE_BANK_PBC_SA        = 'PWY36';

    /**
     * ePay.bg
     * Supported countries: Bulgaria
     */
    const EPAY_BG                     = 'EPY';
}
