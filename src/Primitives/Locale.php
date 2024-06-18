<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Webmozart\Assert\Assert;

class Locale
{
    public const AF_ZA = 'af_ZA';
    public const AM_ET = 'am_ET';
    public const AR_AE = 'ar_AE';
    public const AR_BH = 'ar_BH';
    public const AR_DZ = 'ar_DZ';
    public const AR_EG = 'ar_EG';
    public const AR_IQ = 'ar_IQ';
    public const AR_JO = 'ar_JO';
    public const AR_KW = 'ar_KW';
    public const AR_LB = 'ar_LB';
    public const AR_LY = 'ar_LY';
    public const AR_MA = 'ar_MA';
    public const AR_OM = 'ar_OM';
    public const AR_QA = 'ar_QA';
    public const AR_SA = 'ar_SA';
    public const AR_SD = 'ar_SD';
    public const AR_SY = 'ar_SY';
    public const AR_TN = 'ar_TN';
    public const AR_YE = 'ar_YE';
    public const BE_BY = 'be_BY';
    public const BG_BG = 'bg_BG';
    public const BN_BD = 'bn_BD';
    public const BN_IN = 'bn_IN';
    public const CA_ES = 'ca_ES';
    public const CS_CZ = 'cs_CZ';
    public const CY_GB = 'cy_GB';
    public const DA_DK = 'da_DK';
    public const DE_AT = 'de_AT';
    public const DE_BE = 'de_BE';
    public const DE_CH = 'de_CH';
    public const DE_DE = 'de_DE';
    public const DE_LI = 'de_LI';
    public const DE_LU = 'de_LU';
    public const EL_CY = 'el_CY';
    public const EL_GR = 'el_GR';
    public const EN_AU = 'en_AU';
    public const EN_BW = 'en_BW';
    public const EN_CA = 'en_CA';
    public const EN_GB = 'en_GB';
    public const EN_HK = 'en_HK';
    public const EN_IE = 'en_IE';
    public const EN_IN = 'en_IN';
    public const EN_JM = 'en_JM';
    public const EN_MH = 'en_MH';
    public const EN_MT = 'en_MT';
    public const EN_NA = 'en_NA';
    public const EN_NZ = 'en_NZ';
    public const EN_PH = 'en_PH';
    public const EN_PK = 'en_PK';
    public const EN_SG = 'en_SG';
    public const EN_TT = 'en_TT';
    public const EN_US = 'en_US';
    public const EN_ZA = 'en_ZA';
    public const EN_ZW = 'en_ZW';
    public const ES_AR = 'es_AR';
    public const ES_BO = 'es_BO';
    public const ES_CL = 'es_CL';
    public const ES_CO = 'es_CO';
    public const ES_CR = 'es_CR';
    public const ES_DO = 'es_DO';
    public const ES_EC = 'es_EC';
    public const ES_ES = 'es_ES';
    public const ES_GT = 'es_GT';
    public const ES_HN = 'es_HN';
    public const ES_MX = 'es_MX';
    public const ES_NI = 'es_NI';
    public const ES_PA = 'es_PA';
    public const ES_PE = 'es_PE';
    public const ES_PR = 'es_PR';
    public const ES_PY = 'es_PY';
    public const ES_SV = 'es_SV';
    public const ES_US = 'es_US';
    public const ES_UY = 'es_UY';
    public const ES_VE = 'es_VE';
    public const ET_EE = 'et_EE';
    public const EU_ES = 'eu_ES';
    public const FA_IR = 'fa_IR';
    public const FI_FI = 'fi_FI';
    public const FO_FO = 'fo_FO';
    public const FR_BE = 'fr_BE';
    public const FR_CA = 'fr_CA';
    public const FR_CH = 'fr_CH';
    public const FR_FR = 'fr_FR';
    public const FR_LU = 'fr_LU';
    public const GA_IE = 'ga_IE';
    public const GL_ES = 'gl_ES';
    public const HE_IL = 'he_IL';
    public const HI_IN = 'hi_IN';
    public const HR_HR = 'hr_HR';
    public const HU_HU = 'hu_HU';
    public const HY_AM = 'hy_AM';
    public const ID_ID = 'id_ID';
    public const IS_IS = 'is_IS';
    public const IT_CH = 'it_CH';
    public const IT_IT = 'it_IT';
    public const JA_JP = 'ja_JP';
    public const KA_GE = 'ka_GE';
    public const KK_KZ = 'kk_KZ';
    public const KM_KH = 'km_KH';
    public const KN_IN = 'kn_IN';
    public const KO_KR = 'ko_KR';
    public const KY_KG = 'ky_KG';
    public const LO_LA = 'lo_LA';
    public const LT_LT = 'lt_LT';
    public const LV_LV = 'lv_LV';
    public const MI_NZ = 'mi_NZ';
    public const MK_MK = 'mk_MK';
    public const MN_MN = 'mn_MN';
    public const MR_IN = 'mr_IN';
    public const MS_BN = 'ms_BN';
    public const MS_MY = 'ms_MY';
    public const MT_MT = 'mt_MT';
    public const NB_NO = 'nb_NO';
    public const NE_NP = 'ne_NP';
    public const NL_BE = 'nl_BE';
    public const NL_NL = 'nl_NL';
    public const NN_NO = 'nn_NO';
    public const OR_IN = 'or_IN';
    public const PA_IN = 'pa_IN';
    public const PL_PL = 'pl_PL';
    public const PS_AF = 'ps_AF';
    public const PT_BR = 'pt_BR';
    public const PT_PT = 'pt_PT';
    public const RO_RO = 'ro_RO';
    public const RU_RU = 'ru_RU';
    public const RW_RW = 'rw_RW';
    public const SI_LK = 'si_LK';
    public const SK_SK = 'sk_SK';
    public const SL_SI = 'sl_SI';
    public const SQ_AL = 'sq_AL';
    public const SR_RS = 'sr_RS';
    public const SV_SE = 'sv_SE';
    public const SW_KE = 'sw_KE';
    public const TA_IN = 'ta_IN';
    public const TE_IN = 'te_IN';
    public const TH_TH = 'th_TH';
    public const TI_ET = 'ti_ET';
    public const TR_TR = 'tr_TR';
    public const UK_UA = 'uk_UA';
    public const UR_PK = 'ur_PK';
    public const VI_VN = 'vi_VN';
    public const ZH_CN = 'zh_CN';
    public const ZH_HK = 'zh_HK';
    public const ZH_TW = 'zh_TW';

    private string $value;

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

    public static function of(string $value): self
    {
        return new self($value);
    }

    public function code(): string
    {
        return $this->value;
    }

    public function fullName(): string
    {
        Assert::notNull(self::$NAMES[$this->value] ?? null, 'Invalid locale');

        return self::$NAMES[$this->value];
    }
}
