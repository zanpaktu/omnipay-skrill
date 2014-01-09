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
    const SkrillDirect              = 'OBT';

    /**
     * Giropay
     * Supported countries: Germany
     */
    const Giropay                   = 'GIR';

    /**
     * Direct Debit / ELV
     * Supported countries: Germany
     */
    const DirectDebitELV            = 'DIB';

    /**
     * Sofortüberweisung
     * Supported countries: Germany, Austria, Belgium, Netherlands, Switzerland, United Kingdom
     */
    const Sofortueberweisung        = 'SFT';

    /**
     * eNETS
     * Supported countries: Singapore
     */
    const eNETS                     = 'ENT';

    /**
     * Nordea Solo
     * Supported countries: Sweden
     */
    const NordeaSoloSwe             = 'EBT';

    /**
     * Nordea Solo
     * Supported countries: Finland
     */
    const NordeaSoloFin             = 'SO2';

    /**
     * iDEAL
     * Supported countries: Netherlands
     */
    const iDEAL                     = 'IDL';

    /**
     * EPS (Netpay)
     * Supported countries: Austria
     */
    const EPS_Netpay                = 'NPY';

    /**
     * POLi
     * Supported countries: Australia
     */
    const POLi                      = 'PLI';

    /**
     * All Polish Banks
     * Supported countries: Poland
     */
    const AllPolishBanks            = 'PWY';

    /**
     * ING Bank Slaski
     * Supported countries: Poland
     */
    const INGBankSlaski             = 'PWY5';

    /**
     * PKO BP (PKO Inteligo)
     * Supported countries: Poland
     */
    const PKOBP_PKOInteligo         = 'PWY6';

    /**
     * Multibank (Multitransfer)
     * Supported countries: Poland
     */
    const Multibank_Multitransfer   = 'PWY7';

    /**
     * Lukas Bank
     * Supported countries: Poland
     */
    const LukasBank                 = 'PWY14';

    /**
     * Bank BPH
     * Supported countries: Poland
     */
    const BankBPH                   = 'PWY15';

    /**
     * InvestBank
     * Supported countries: Poland
     */
    const InvestBank                = 'PWY17';

    /**
     * PeKaO S.A.
     * Supported countries: Poland
     */
    const PeKaOSA                   = 'PWY18';

    /**
     * Citibank handlowy
     * Supported countries: Poland
     */
    const CitibankHandlowy          = 'PWY19';

    /**
     * Bank Zachodni WBK (Przelew24)
     * Supported countries: Poland
     */
    const BankZachodniWBK_Przelew24 = 'PWY20';

    /**
     * BGŻ
     * Supported countries: Poland
     */
    const BGZ                       = 'PWY21';

    /**
     * Millenium
     * Supported countries: Poland
     */
    const Millenium                 = 'PWY22';

    /**
     * mBank (mTransfer)
     * Supported countries: Poland
     */
    const mBank_mTransfer           = 'PWY25';

    /**
     * Płace z Inteligo
     * Supported countries: Poland
     */
    const PlaceZInteligo            = 'PWY26';

    /**
     * Bank Ochrony Srodowiska
     * Supported countries: Poland
     */
    const BankOchronySrodowiska     = 'PWY28';

    /**
     * Nordea
     * Supported countries: Poland
     */
    const Nordea                    = 'PWY32';

    /**
     * Fortis Bank
     * Supported countries: Poland
     */
    const FortisBank                = 'PWY33';

    /**
     * Deutsche Bank PBC S.A.
     * Supported countries: Poland
     */
    const DeutscheBankPBCSA         = 'PWY36';

    /**
     * ePay.bg
     * Supported countries: Bulgaria
     */
    const ePayBg                    = 'EPY';
}
