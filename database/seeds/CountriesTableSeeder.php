<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $county_array = [
            0 => "AU",
            1 => "AT",
            2 => "AZ",
            3 => "AX",
            4 => "AL",
            5 => "DZ",
            6 => "AS",
            7 => "AI",
            8 => "AO",
            9 => "AD",
            10 => "AQ",
            11 => "AG",
            12 => "AR",
            13 => "AM",
            14 => "AW",
            15 => "AF",
            16 => "BS",
            17 => "BD",
            18 => "BB",
            19 => "BH",
            20 => "BY",
            21 => "BZ",
            22 => "BE",
            23 => "BJ",
            24 => "BM",
            25 => "BG",
            26 => "BO",
            27 => "BQ",
            28 => "BA",
            29 => "BW",
            30 => "BR",
            31 => "IO",
            32 => "BN",
            33 => "BF",
            34 => "BI",
            35 => "BT",
            36 => "VU",
            37 => "VA",
            38 => "GB",
            39 => "HU",
            40 => "VE",
            41 => "VG",
            42 => "VI",
            43 => "UM",
            44 => "TL",
            45 => "VN",
            46 => "GA",
            47 => "HT",
            48 => "GY",
            49 => "GM",
            50 => "GH",
            51 => "GP",
            52 => "GT",
            53 => "GN",
            54 => "GW",
            55 => "DE",
            56 => "GG",
            57 => "GI",
            58 => "HN",
            59 => "HK",
            60 => "GD",
            61 => "GL",
            62 => "GR",
            63 => "GE",
            64 => "GU",
            65 => "DK",
            66 => "JE",
            67 => "DJ",
            68 => "DG",
            69 => "DM",
            70 => "DO",
            71 => "EG",
            72 => "ZM",
            73 => "EH",
            74 => "ZW",
            75 => "IL",
            76 => "IN",
            77 => "ID",
            78 => "JO",
            79 => "IQ",
            80 => "IR",
            81 => "IE",
            82 => "IS",
            83 => "ES",
            84 => "IT",
            85 => "YE",
            86 => "CV",
            87 => "KZ",
            88 => "KY",
            89 => "KH",
            90 => "CM",
            91 => "CA",
            92 => "IC",
            93 => "QA",
            94 => "KE",
            95 => "CY",
            96 => "KG",
            97 => "KI",
            98 => "CN",
            99 => "KP",
            100 => "CC",
            101 => "CO",
            102 => "KM",
            103 => "CG",
            104 => "CD",
            105 => "XK",
            106 => "CR",
            107 => "CI",
            108 => "CU",
            109 => "KW",
            110 => "CW",
            111 => "LA",
            112 => "LV",
            113 => "LS",
            114 => "LR",
            115 => "LB",
            116 => "LY",
            117 => "LT",
            118 => "LI",
            119 => "LU",
            120 => "MU",
            121 => "MR",
            122 => "MG",
            123 => "YT",
            124 => "MO",
            125 => "MK",
            126 => "MW",
            127 => "MY",
            128 => "ML",
            129 => "MV",
            130 => "MT",
            131 => "MA",
            132 => "MQ",
            133 => "MH",
            134 => "MX",
            135 => "MZ",
            136 => "MD",
            137 => "MC",
            138 => "MN",
            139 => "MS",
            140 => "MM",
            141 => "NA",
            142 => "NR",
            143 => "NP",
            144 => "NE",
            145 => "NG",
            146 => "NL",
            147 => "NI",
            148 => "NU",
            149 => "NZ",
            150 => "NC",
            151 => "NO",
            152 => "AC",
            153 => "IM",
            154 => "NF",
            155 => "CX",
            156 => "SH",
            157 => "TC",
            158 => "AE",
            159 => "OM",
            160 => "UN",
            161 => "CK",
            162 => "PN",
            163 => "PK",
            164 => "PW",
            165 => "PS",
            166 => "PA",
            167 => "PG",
            168 => "PY",
            169 => "PE",
            170 => "PL",
            171 => "PT",
            172 => "PR",
            173 => "KR",
            174 => "RE",
            175 => "RU",
            176 => "RW",
            177 => "RO",
            178 => "SV",
            179 => "WS",
            180 => "SM",
            181 => "ST",
            182 => "SA",
            183 => "SZ",
            184 => "MP",
            185 => "SC",
            186 => "BL",
            187 => "MF",
            188 => "PM",
            189 => "SN",
            190 => "VC",
            191 => "KN",
            192 => "LC",
            193 => "RS",
            194 => "EA",
            195 => "SG",
            196 => "SX",
            197 => "SY",
            198 => "SK",
            199 => "SI",
            200 => "US",
            201 => "SB",
            202 => "SO",
            203 => "SD",
            204 => "SR",
            205 => "SL",
            206 => "TJ",
            207 => "TH",
            208 => "TW",
            209 => "TZ",
            210 => "TG",
            211 => "TK",
            212 => "TO",
            213 => "TT",
            214 => "TA",
            215 => "TV",
            216 => "TN",
            217 => "TM",
            218 => "TR",
            219 => "UG",
            220 => "UZ",
            221 => "UA",
            222 => "WF",
            223 => "UY",
            224 => "FO",
            225 => "FM",
            226 => "FJ",
            227 => "PH",
            228 => "FI",
            229 => "FK",
            230 => "FR",
            231 => "GF",
            232 => "PF",
            233 => "TF",
            234 => "HR",
            235 => "CF",
            236 => "TD",
            237 => "ME",
            238 => "CZ",
            239 => "CL",
            240 => "CH",
            241 => "SE",
            242 => "SJ",
            243 => "LK",
            244 => "EC",
            245 => "GQ",
            246 => "ER",
            247 => "EE",
            248 => "ET",
            249 => "ZA",
            250 => "GS",
            251 => "SS",
            252 => "JM",
            253 => "JP",
            254 => "EZ",
        ];
		$ruLanguage = [
			0 => "Австралия",
			1 => "Австрия",
			2 => "Азербайджан",
			3 => "Аландские о-ва",
			4 => "Албания",
			5 => "Алжир",
			6 => "Американское Самоа",
			7 => "Ангилья",
			8 => "Ангола",
			9 => "Андорра",
			10 => "Антарктида",
			11 => "Антигуа и Барбуда",
			12 => "Аргентина",
			13 => "Армения",
			14 => "Аруба",
			15 => "Афганистан",
			16 => "Багамы",
			17 => "Бангладеш",
			18 => "Барбадос",
			19 => "Бахрейн",
			20 => "Беларусь",
			21 => "Белиз",
			22 => "Бельгия",
			23 => "Бенин",
			24 => "Бермуды",
			25 => "Болгария",
			26 => "Боливия",
			27 => "Бонэйр, Синт-Эстатиус и Саба",
			28 => "Босния и Герцеговина",
			29 => "Ботсвана",
			30 => "Бразилия",
			31 => "Британская территория в Индийском океане",
			32 => "Бруней-Даруссалам",
			33 => "Буркина-Фасо",
			34 => "Бурунди",
			35 => "Бутан",
			36 => "Вануату",
			37 => "Ватикан",
			38 => "Великобритания",
			39 => "Венгрия",
			40 => "Венесуэла",
			41 => "Виргинские о-ва (Британские)",
			42 => "Виргинские о-ва (США)",
			43 => "Внешние малые о-ва (США)",
			44 => "Восточный Тимор",
			45 => "Вьетнам",
			46 => "Габон",
			47 => "Гаити",
			48 => "Гайана",
			49 => "Гамбия",
			50 => "Гана",
			51 => "Гваделупа",
			52 => "Гватемала",
			53 => "Гвинея",
			54 => "Гвинея-Бисау",
			55 => "Германия",
			56 => "Гернси",
			57 => "Гибралтар",
			58 => "Гондурас",
			59 => "Гонконг (специальный административный район)",
			60 => "Гренада",
			61 => "Гренландия",
			62 => "Греция",
			63 => "Грузия",
			64 => "Гуам",
			65 => "Дания",
			66 => "Джерси",
			67 => "Джибути",
			68 => "Диего-Гарсия",
			69 => "Доминика",
			70 => "Доминиканская Республика",
			71 => "Египет",
			72 => "Замбия",
			73 => "Западная Сахара",
			74 => "Зимбабве",
			75 => "Израиль",
			76 => "Индия",
			77 => "Индонезия",
			78 => "Иордания",
			79 => "Ирак",
			80 => "Иран",
			81 => "Ирландия",
			82 => "Исландия",
			83 => "Испания",
			84 => "Италия",
			85 => "Йемен",
			86 => "Кабо-Верде",
			87 => "Казахстан",
			88 => "Каймановы о-ва",
			89 => "Камбоджа",
			90 => "Камерун",
			91 => "Канада",
			92 => "Канарские о-ва",
			93 => "Катар",
			94 => "Кения",
			95 => "Кипр",
			96 => "Киргизия",
			97 => "Кирибати",
			98 => "Китай",
			99 => "КНДР",
			100 => "Кокосовые о-ва",
			101 => "Колумбия",
			102 => "Коморы",
			103 => "Конго - Браззавиль",
			104 => "Конго - Киншаса",
			105 => "Косово",
			106 => "Коста-Рика",
			107 => "Кот-д’Ивуар",
			108 => "Куба",
			109 => "Кувейт",
			110 => "Кюрасао",
			111 => "Лаос",
			112 => "Латвия",
			113 => "Лесото",
			114 => "Либерия",
			115 => "Ливан",
			116 => "Ливия",
			117 => "Литва",
			118 => "Лихтенштейн",
			119 => "Люксембург",
			120 => "Маврикий",
			121 => "Мавритания",
			122 => "Мадагаскар",
			123 => "Майотта",
			124 => "Макао (специальный административный район)",
			125 => "Македония",
			126 => "Малави",
			127 => "Малайзия",
			128 => "Мали",
			129 => "Мальдивы",
			130 => "Мальта",
			131 => "Марокко",
			132 => "Мартиника",
			133 => "Маршалловы Острова",
			134 => "Мексика",
			135 => "Мозамбик",
			136 => "Молдова",
			137 => "Монако",
			138 => "Монголия",
			139 => "Монтсеррат",
			140 => "Мьянма (Бирма)",
			141 => "Намибия",
			142 => "Науру",
			143 => "Непал",
			144 => "Нигер",
			145 => "Нигерия",
			146 => "Нидерланды",
			147 => "Никарагуа",
			148 => "Ниуэ",
			149 => "Новая Зеландия",
			150 => "Новая Каледония",
			151 => "Норвегия",
			152 => "о-в Вознесения",
			153 => "о-в Мэн",
			154 => "о-в Норфолк",
			155 => "о-в Рождества",
			156 => "о-в Св. Елены",
			157 => "о-ва Тёркс и Кайкос",
			158 => "ОАЭ",
			159 => "Оман",
			160 => "Организация Объединенных Наций",
			161 => "Острова Кука",
			162 => "острова Питкэрн",
			163 => "Пакистан",
			164 => "Палау",
			165 => "Палестинские территории",
			166 => "Панама",
			167 => "Папуа – Новая Гвинея",
			168 => "Парагвай",
			169 => "Перу",
			170 => "Польша",
			171 => "Португалия",
			172 => "Пуэрто-Рико",
			173 => "Республика Корея",
			174 => "Реюньон",
			175 => "Россия",
			176 => "Руанда",
			177 => "Румыния",
			178 => "Сальвадор",
			179 => "Самоа",
			180 => "Сан-Марино",
			181 => "Сан-Томе и Принсипи",
			182 => "Саудовская Аравия",
			183 => "Свазиленд",
			184 => "Северные Марианские о-ва",
			185 => "Сейшельские Острова",
			186 => "Сен-Бартелеми",
			187 => "Сен-Мартен",
			188 => "Сен-Пьер и Микелон",
			189 => "Сенегал",
			190 => "Сент-Винсент и Гренадины",
			191 => "Сент-Китс и Невис",
			192 => "Сент-Люсия",
			193 => "Сербия",
			194 => "Сеута и Мелилья",
			195 => "Сингапур",
			196 => "Синт-Мартен",
			197 => "Сирия",
			198 => "Словакия",
			199 => "Словения",
			200 => "Соединенные Штаты",
			201 => "Соломоновы Острова",
			202 => "Сомали",
			203 => "Судан",
			204 => "Суринам",
			205 => "Сьерра-Леоне",
			206 => "Таджикистан",
			207 => "Таиланд",
			208 => "Тайвань",
			209 => "Танзания",
			210 => "Того",
			211 => "Токелау",
			212 => "Тонга",
			213 => "Тринидад и Тобаго",
			214 => "Тристан-да-Кунья",
			215 => "Тувалу",
			216 => "Тунис",
			217 => "Туркменистан",
			218 => "Турция",
			219 => "Уганда",
			220 => "Узбекистан",
			221 => "Украина",
			222 => "Уоллис и Футуна",
			223 => "Уругвай",
			224 => "Фарерские о-ва",
			225 => "Федеративные Штаты Микронезии",
			226 => "Фиджи",
			227 => "Филиппины",
			228 => "Финляндия",
			229 => "Фолклендские о-ва",
			230 => "Франция",
			231 => "Французская Гвиана",
			232 => "Французская Полинезия",
			233 => "Французские Южные территории",
			234 => "Хорватия",
			235 => "ЦАР",
			236 => "Чад",
			237 => "Черногория",
			238 => "Чехия",
			239 => "Чили",
			240 => "Швейцария",
			241 => "Швеция",
			242 => "Шпицберген и Ян-Майен",
			243 => "Шри-Ланка",
			244 => "Эквадор",
			245 => "Экваториальная Гвинея",
			246 => "Эритрея",
			247 => "Эстония",
			248 => "Эфиопия",
			249 => "ЮАР",
			250 => "Южная Георгия и Южные Сандвичевы о-ва",
			251 => "Южный Судан",
			252 => "Ямайка",
			253 => "Япония",
			254 => "Eurozone",
		];

		$country = [];

        for ( $i = 0; $i <= 254; $i ++ ) {
            $cName = $county_array[$i];
			$cRuName = $ruLanguage[$i];
            $country[] = [
                'name' 	=> $cName,
				'ru'	=> $cRuName,
            ];
        }

        DB::table( 'countries' )->insert( $country );
    }
}
