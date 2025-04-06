<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Atournayre\Common\Assert\Assert;
use Atournayre\Contracts\Exception\ThrowableInterface;

final class Locale
{
    /** @api */
    public const AF_ZA = 'af_ZA';

    /** @api */
    public const AM_ET = 'am_ET';

    /** @api */
    public const AR_AE = 'ar_AE';

    /** @api */
    public const AR_BH = 'ar_BH';

    /** @api */
    public const AR_DZ = 'ar_DZ';

    /** @api */
    public const AR_EG = 'ar_EG';

    /** @api */
    public const AR_IQ = 'ar_IQ';

    /** @api */
    public const AR_JO = 'ar_JO';

    /** @api */
    public const AR_KW = 'ar_KW';

    /** @api */
    public const AR_LB = 'ar_LB';

    /** @api */
    public const AR_LY = 'ar_LY';

    /** @api */
    public const AR_MA = 'ar_MA';

    /** @api */
    public const AR_OM = 'ar_OM';

    /** @api */
    public const AR_QA = 'ar_QA';

    /** @api */
    public const AR_SA = 'ar_SA';

    /** @api */
    public const AR_SD = 'ar_SD';

    /** @api */
    public const AR_SY = 'ar_SY';

    /** @api */
    public const AR_TN = 'ar_TN';

    /** @api */
    public const AR_YE = 'ar_YE';

    /** @api */
    public const BE_BY = 'be_BY';

    /** @api */
    public const BG_BG = 'bg_BG';

    /** @api */
    public const BN_BD = 'bn_BD';

    /** @api */
    public const BN_IN = 'bn_IN';

    /** @api */
    public const CA_ES = 'ca_ES';

    /** @api */
    public const CS_CZ = 'cs_CZ';

    /** @api */
    public const CY_GB = 'cy_GB';

    /** @api */
    public const DA_DK = 'da_DK';

    /** @api */
    public const DE_AT = 'de_AT';

    /** @api */
    public const DE_BE = 'de_BE';

    /** @api */
    public const DE_CH = 'de_CH';

    /** @api */
    public const DE_DE = 'de_DE';

    /** @api */
    public const DE_LI = 'de_LI';

    /** @api */
    public const DE_LU = 'de_LU';

    /** @api */
    public const EL_CY = 'el_CY';

    /** @api */
    public const EL_GR = 'el_GR';

    /** @api */
    public const EN_AU = 'en_AU';

    /** @api */
    public const EN_BW = 'en_BW';

    /** @api */
    public const EN_CA = 'en_CA';

    /** @api */
    public const EN_GB = 'en_GB';

    /** @api */
    public const EN_HK = 'en_HK';

    /** @api */
    public const EN_IE = 'en_IE';

    /** @api */
    public const EN_IN = 'en_IN';

    /** @api */
    public const EN_JM = 'en_JM';

    /** @api */
    public const EN_MH = 'en_MH';

    /** @api */
    public const EN_MT = 'en_MT';

    /** @api */
    public const EN_NA = 'en_NA';

    /** @api */
    public const EN_NZ = 'en_NZ';

    /** @api */
    public const EN_PH = 'en_PH';

    /** @api */
    public const EN_PK = 'en_PK';

    /** @api */
    public const EN_SG = 'en_SG';

    /** @api */
    public const EN_TT = 'en_TT';

    /** @api */
    public const EN_US = 'en_US';

    /** @api */
    public const EN_ZA = 'en_ZA';

    /** @api */
    public const EN_ZW = 'en_ZW';

    /** @api */
    public const ES_AR = 'es_AR';

    /** @api */
    public const ES_BO = 'es_BO';

    /** @api */
    public const ES_CL = 'es_CL';

    /** @api */
    public const ES_CO = 'es_CO';

    /** @api */
    public const ES_CR = 'es_CR';

    /** @api */
    public const ES_DO = 'es_DO';

    /** @api */
    public const ES_EC = 'es_EC';

    /** @api */
    public const ES_ES = 'es_ES';

    /** @api */
    public const ES_GT = 'es_GT';

    /** @api */
    public const ES_HN = 'es_HN';

    /** @api */
    public const ES_MX = 'es_MX';

    /** @api */
    public const ES_NI = 'es_NI';

    /** @api */
    public const ES_PA = 'es_PA';

    /** @api */
    public const ES_PE = 'es_PE';

    /** @api */
    public const ES_PR = 'es_PR';

    /** @api */
    public const ES_PY = 'es_PY';

    /** @api */
    public const ES_SV = 'es_SV';

    /** @api */
    public const ES_US = 'es_US';

    /** @api */
    public const ES_UY = 'es_UY';

    /** @api */
    public const ES_VE = 'es_VE';

    /** @api */
    public const ET_EE = 'et_EE';

    /** @api */
    public const EU_ES = 'eu_ES';

    /** @api */
    public const FA_IR = 'fa_IR';

    /** @api */
    public const FI_FI = 'fi_FI';

    /** @api */
    public const FO_FO = 'fo_FO';

    /** @api */
    public const FR_BE = 'fr_BE';

    /** @api */
    public const FR_CA = 'fr_CA';

    /** @api */
    public const FR_CH = 'fr_CH';

    /** @api */
    public const FR_FR = 'fr_FR';

    /** @api */
    public const FR_LU = 'fr_LU';

    /** @api */
    public const GA_IE = 'ga_IE';

    /** @api */
    public const GL_ES = 'gl_ES';

    /** @api */
    public const HE_IL = 'he_IL';

    /** @api */
    public const HI_IN = 'hi_IN';

    /** @api */
    public const HR_HR = 'hr_HR';

    /** @api */
    public const HU_HU = 'hu_HU';

    /** @api */
    public const HY_AM = 'hy_AM';

    /** @api */
    public const ID_ID = 'id_ID';

    /** @api */
    public const IS_IS = 'is_IS';

    /** @api */
    public const IT_CH = 'it_CH';

    /** @api */
    public const IT_IT = 'it_IT';

    /** @api */
    public const JA_JP = 'ja_JP';

    /** @api */
    public const KA_GE = 'ka_GE';

    /** @api */
    public const KK_KZ = 'kk_KZ';

    /** @api */
    public const KM_KH = 'km_KH';

    /** @api */
    public const KN_IN = 'kn_IN';

    /** @api */
    public const KO_KR = 'ko_KR';

    /** @api */
    public const KY_KG = 'ky_KG';

    /** @api */
    public const LO_LA = 'lo_LA';

    /** @api */
    public const LT_LT = 'lt_LT';

    /** @api */
    public const LV_LV = 'lv_LV';

    /** @api */
    public const MI_NZ = 'mi_NZ';

    /** @api */
    public const MK_MK = 'mk_MK';

    /** @api */
    public const MN_MN = 'mn_MN';

    /** @api */
    public const MR_IN = 'mr_IN';

    /** @api */
    public const MS_BN = 'ms_BN';

    /** @api */
    public const MS_MY = 'ms_MY';

    /** @api */
    public const MT_MT = 'mt_MT';

    /** @api */
    public const NB_NO = 'nb_NO';

    /** @api */
    public const NE_NP = 'ne_NP';

    /** @api */
    public const NL_BE = 'nl_BE';

    /** @api */
    public const NL_NL = 'nl_NL';

    /** @api */
    public const NN_NO = 'nn_NO';

    /** @api */
    public const OR_IN = 'or_IN';

    /** @api */
    public const PA_IN = 'pa_IN';

    /** @api */
    public const PL_PL = 'pl_PL';

    /** @api */
    public const PS_AF = 'ps_AF';

    /** @api */
    public const PT_BR = 'pt_BR';

    /** @api */
    public const PT_PT = 'pt_PT';

    /** @api */
    public const RO_RO = 'ro_RO';

    /** @api */
    public const RU_RU = 'ru_RU';

    /** @api */
    public const RW_RW = 'rw_RW';

    /** @api */
    public const SI_LK = 'si_LK';

    /** @api */
    public const SK_SK = 'sk_SK';

    /** @api */
    public const SL_SI = 'sl_SI';

    /** @api */
    public const SQ_AL = 'sq_AL';

    /** @api */
    public const SR_RS = 'sr_RS';

    /** @api */
    public const SV_SE = 'sv_SE';

    /** @api */
    public const SW_KE = 'sw_KE';

    /** @api */
    public const TA_IN = 'ta_IN';

    /** @api */
    public const TE_IN = 'te_IN';

    /** @api */
    public const TH_TH = 'th_TH';

    /** @api */
    public const TI_ET = 'ti_ET';

    /** @api */
    public const TR_TR = 'tr_TR';

    /** @api */
    public const UK_UA = 'uk_UA';

    /** @api */
    public const UR_PK = 'ur_PK';

    /** @api */
    public const VI_VN = 'vi_VN';

    /** @api */
    public const ZH_CN = 'zh_CN';

    /** @api */
    public const ZH_HK = 'zh_HK';

    /** @api */
    public const ZH_TW = 'zh_TW';

    private string $value;

    /**
     * @var string[] The list of all available locales
     */
    private static array $NAMES = [
        self::AF_ZA => 'Afrikaans (South Africa)',
        self::AM_ET => 'Amharic (Ethiopia)',
        self::AR_AE => 'Arabic (U.A.E.)',
        self::AR_BH => 'Arabic (Bahrain)',
        self::AR_DZ => 'Arabic (Algeria)',
        self::AR_EG => 'Arabic (Egypt)',
        self::AR_IQ => 'Arabic (Iraq)',
        self::AR_JO => 'Arabic (Jordan)',
        self::AR_KW => 'Arabic (Kuwait)',
        self::AR_LB => 'Arabic (Lebanon)',
        self::AR_LY => 'Arabic (Libya)',
        self::AR_MA => 'Arabic (Morocco)',
        self::AR_OM => 'Arabic (Oman)',
        self::AR_QA => 'Arabic (Qatar)',
        self::AR_SA => 'Arabic (Saudi Arabia)',
        self::AR_SD => 'Arabic (Sudan)',
        self::AR_SY => 'Arabic (Syria)',
        self::AR_TN => 'Arabic (Tunisia)',
        self::AR_YE => 'Arabic (Yemen)',
        self::BE_BY => 'Belarusian (Belarus)',
        self::BG_BG => 'Bulgarian (Bulgaria)',
        self::BN_BD => 'Bengali (Bangladesh)',
        self::BN_IN => 'Bengali (India)',
        self::CA_ES => 'Catalan (Spain)',
        self::CS_CZ => 'Czech (Czech Republic)',
        self::CY_GB => 'Welsh (United Kingdom)',
        self::DA_DK => 'Danish (Denmark)',
        self::DE_AT => 'German (Austria)',
        self::DE_BE => 'German (Belgium)',
        self::DE_CH => 'German (Switzerland)',
        self::DE_DE => 'German (Germany)',
        self::DE_LI => 'German (Liechtenstein)',
        self::DE_LU => 'German (Luxembourg)',
        self::EL_CY => 'Greek (Cyprus)',
        self::EL_GR => 'Greek (Greece)',
        self::EN_AU => 'English (Australia)',
        self::EN_BW => 'English (Botswana)',
        self::EN_CA => 'English (Canada)',
        self::EN_GB => 'English (United Kingdom)',
        self::EN_HK => 'English (Hong Kong)',
        self::EN_IE => 'English (Ireland)',
        self::EN_IN => 'English (India)',
        self::EN_JM => 'English (Jamaica)',
        self::EN_MH => 'English (Marshall Islands)',
        self::EN_MT => 'English (Malta)',
        self::EN_NA => 'English (Namibia)',
        self::EN_NZ => 'English (New Zealand)',
        self::EN_PH => 'English (Philippines)',
        self::EN_PK => 'English (Pakistan)',
        self::EN_SG => 'English (Singapore)',
        self::EN_TT => 'English (Trinidad & Tobago)',
        self::EN_US => 'English (United States)',
        self::EN_ZA => 'English (South Africa)',
        self::EN_ZW => 'English (Zimbabwe)',
        self::ES_AR => 'Spanish (Argentina)',
        self::ES_BO => 'Spanish (Bolivia)',
        self::ES_CL => 'Spanish (Chile)',
        self::ES_CO => 'Spanish (Colombia)',
        self::ES_CR => 'Spanish (Costa Rica)',
        self::ES_DO => 'Spanish (Dominican Republic)',
        self::ES_EC => 'Spanish (Ecuador)',
        self::ES_ES => 'Spanish (Spain)',
        self::ES_GT => 'Spanish (Guatemala)',
        self::ES_HN => 'Spanish (Honduras)',
        self::ES_MX => 'Spanish (Mexico)',
        self::ES_NI => 'Spanish (Nicaragua)',
        self::ES_PA => 'Spanish (Panama)',
        self::ES_PE => 'Spanish (Peru)',
        self::ES_PR => 'Spanish (Puerto Rico)',
        self::ES_PY => 'Spanish (Paraguay)',
        self::ES_SV => 'Spanish (El Salvador)',
        self::ES_US => 'Spanish (United States)',
        self::ES_UY => 'Spanish (Uruguay)',
        self::ES_VE => 'Spanish (Venezuela)',
        self::ET_EE => 'Estonian (Estonia)',
        self::EU_ES => 'Basque (Spain)',
        self::FA_IR => 'Persian (Iran)',
        self::FI_FI => 'Finnish (Finland)',
        self::FO_FO => 'Faroese (Faroe Islands)',
        self::FR_BE => 'French (Belgium)',
        self::FR_CA => 'French (Canada)',
        self::FR_CH => 'French (Switzerland)',
        self::FR_FR => 'French (France)',
        self::FR_LU => 'French (Luxembourg)',
        self::GA_IE => 'Irish (Ireland)',
        self::GL_ES => 'Galician (Spain)',
        self::HE_IL => 'Hebrew (Israel)',
        self::HI_IN => 'Hindi (India)',
        self::HR_HR => 'Croatian (Croatia)',
        self::HU_HU => 'Hungarian (Hungary)',
        self::HY_AM => 'Armenian (Armenia)',
        self::ID_ID => 'Indonesian (Indonesia)',
        self::IS_IS => 'Icelandic (Iceland)',
        self::IT_CH => 'Italian (Switzerland)',
        self::IT_IT => 'Italian (Italy)',
        self::JA_JP => 'Japanese (Japan)',
        self::KA_GE => 'Georgian (Georgia)',
        self::KK_KZ => 'Kazakh (Kazakhstan)',
        self::KM_KH => 'Khmer (Cambodia)',
        self::KN_IN => 'Kannada (India)',
        self::KO_KR => 'Korean (South Korea)',
        self::KY_KG => 'Kyrgyz (Kyrgyzstan)',
        self::LO_LA => 'Lao (Laos)',
        self::LT_LT => 'Lithuanian (Lithuania)',
        self::LV_LV => 'Latvian (Latvia)',
        self::MI_NZ => 'Maori (New Zealand)',
        self::MK_MK => 'Macedonian (North Macedonia)',
        self::MN_MN => 'Mongolian (Mongolia)',
        self::MR_IN => 'Marathi (India)',
        self::MS_BN => 'Malay (Brunei)',
        self::MS_MY => 'Malay (Malaysia)',
        self::MT_MT => 'Maltese (Malta)',
        self::NB_NO => 'Norwegian Bokmål (Norway)',
        self::NE_NP => 'Nepali (Nepal)',
        self::NL_BE => 'Dutch (Belgium)',
        self::NL_NL => 'Dutch (Netherlands)',
        self::NN_NO => 'Norwegian Nynorsk (Norway)',
        self::OR_IN => 'Odia (India)',
        self::PA_IN => 'Punjabi (India)',
        self::PL_PL => 'Polish (Poland)',
        self::PS_AF => 'Pashto (Afghanistan)',
        self::PT_BR => 'Portuguese (Brazil)',
        self::PT_PT => 'Portuguese (Portugal)',
        self::RO_RO => 'Romanian (Romania)',
        self::RU_RU => 'Russian (Russia)',
        self::RW_RW => 'Kinyarwanda (Rwanda)',
        self::SI_LK => 'Sinhala (Sri Lanka)',
        self::SK_SK => 'Slovak (Slovakia)',
        self::SL_SI => 'Slovenian (Slovenia)',
        self::SQ_AL => 'Albanian (Albania)',
        self::SR_RS => 'Serbian (Serbia)',
        self::SV_SE => 'Swedish (Sweden)',
        self::SW_KE => 'Swahili (Kenya)',
        self::TA_IN => 'Tamil (India)',
        self::TE_IN => 'Telugu (India)',
        self::TH_TH => 'Thai (Thailand)',
        self::TI_ET => 'Tigrinya (Ethiopia)',
        self::TR_TR => 'Turkish (Turkey)',
        self::UK_UA => 'Ukrainian (Ukraine)',
        self::UR_PK => 'Urdu (Pakistan)',
        self::VI_VN => 'Vietnamese (Vietnam)',
        self::ZH_CN => 'Chinese (China)',
        self::ZH_HK => 'Chinese (Hong Kong)',
        self::ZH_TW => 'Chinese (Taiwan)',
    ];

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @api
     */
    public static function of(string $value): self
    {
        return new self($value);
    }

    /**
     * @api
     */
    public function code(): string
    {
        return $this->value;
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function fullName(): string
    {
        Assert::notNull(self::$NAMES[$this->value] ?? null, 'Invalid locale');

        return self::$NAMES[$this->value];
    }
}
