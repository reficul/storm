<?php

/**
 * @brief       Forums Singleton
 * @author      -storm_author-
 * @copyright   -storm_copyright-
 * @package     IPS Social Suite
 * @subpackage  Storm
 * @since       -storm_since_version-
 * @version     -storm_version-
 */

namespace IPS\storm\Pseudo;

if( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
    header( ( isset( $_SERVER[ 'SERVER_PROTOCOL' ] ) ? $_SERVER[ 'SERVER_PROTOCOL' ] :
            'HTTP/1.0' ) . ' 403 Forbidden' );
    exit;
}

class _Generator extends \IPS\Patterns\Singleton
{

    /**
     * @brief   Singleton Instances
     * @note    This needs to be declared in any child classes as well, only declaring here for editor code-complete/error-check functionality
     */
    protected static $instance = null;

    protected $adjective = [
        0 => 'friendly',
        1 => 'illuminating',
        2 => 'probabilistic',
        3 => 'peak',
        4 => 'clipped',
        5 => 'roentgenographic',
        6 => 'aphasic',
        7 => 'raised',
        8 => 'blastomycotic',
        9 => 'landed',
        10 => 'unhealthful',
        11 => 'narrow-minded',
        12 => 'rhetorical',
        13 => 'unfashionable',
        14 => 'orthodontic',
        15 => 'capable',
        16 => 'nonmilitary',
        17 => 'fastidious',
        18 => 'jawless',
        19 => 'cytotoxic',
        20 => 'panicled',
        21 => 'ascending(a)',
        22 => 'Afrikaner',
        23 => 'polite',
        24 => 'self-employed',
        25 => 'unofficial',
        26 => 'middle',
        27 => 'metaphysical',
        28 => 'inclement',
        29 => 'sustentacular',
        30 => 'pachydermous',
        31 => 'part-time',
        32 => 'extraterritorial',
        33 => 'anaplastic',
        34 => 'nonlinguistic',
        35 => 'unsubmissive',
        36 => 'unthematic',
        37 => 'mnemonic',
        38 => 'formalistic',
        39 => 'lacertilian',
        40 => 'civilised',
        41 => 'innate',
        42 => 'young',
        43 => 'unlabelled',
        44 => 'brachycephalic',
        45 => 'voyeuristic',
        46 => 'unairworthy',
        47 => 'consecrated',
        48 => 'major',
        49 => 'heuristic',
        50 => 'equatorial',
        51 => 'liquified',
        52 => 'employed',
        53 => 'purgatorial',
        54 => 'variolar',
        55 => 'unchaste',
        56 => 'ciliate',
        57 => 'dialectical',
        58 => 'noncrystalline',
        59 => 'irrelevant',
        60 => 'eremitic',
        61 => 'classical',
        62 => 'illicit',
        63 => 'platyrrhinic',
        64 => 'direct',
        65 => 'bottom(a)',
        66 => 'intercostal',
        67 => 'established',
        68 => 'undue',
        69 => 'modulated',
        70 => 'cyclonal',
        71 => 'domestic',
        72 => 'unpotted',
        73 => 'ringing',
        74 => 'acaulescent',
        75 => 'shaven',
        76 => 'sarcolemmic',
        77 => 'archdiocesan',
        78 => 'fashionable',
        79 => 'multiparous',
        80 => 'Jesuitical',
        81 => 'mass_spectroscopic',
        82 => 'antonymous',
        83 => 'dramatic',
        84 => 'syncretic',
        85 => 'altitudinal',
        86 => 'sensory',
        87 => 'refractile',
        88 => 'melodious',
        89 => 'determined',
        90 => 'planographic',
        91 => 'heavy',
        92 => 'Delphian',
        93 => 'cultural',
        94 => 'uppercase',
        95 => 'unhappy',
        96 => 'quincentennial',
        97 => 'phonic',
        98 => 'sensory',
        99 => 'indirect',
        100 => 'lacrimatory',
        101 => 'uncoiled',
        102 => 'motivational',
        103 => 'inoffensive',
        104 => 'thermosetting',
        105 => 'Hassidic',
        106 => 'published',
        107 => 'emmetropic',
        108 => 'reserved',
        109 => 'straight',
        110 => 'gutless',
        111 => 'unequal',
        112 => 'active',
        113 => 'warmhearted',
        114 => 'esthetic',
        115 => 'unenthusiastic',
        116 => 'supported',
        117 => 'provident',
        118 => 'offside',
        119 => 'inframaxillary',
        120 => 'malodourous',
        121 => 'anagogic',
        122 => 'hematic',
        123 => 'unglazed',
        124 => 'bistred',
        125 => 'mercurous',
        126 => 'unbroken',
        127 => 'bilobated',
        128 => 'aculeate',
        129 => 'civil',
        130 => 'canonic',
        131 => 'Mesoamerican',
        132 => 'long',
        133 => 'interplanetary',
        134 => 'infernal',
        135 => 'postprandial',
        136 => 'pecuniary',
        137 => 'Ghanese',
        138 => 'dry',
        139 => 'inactive',
        140 => 'nonspecific',
        141 => 'hydroxy',
        142 => 'unfruitful',
        143 => 'beltless',
        144 => 'rigged',
        145 => 'mastoid',
        146 => 'conservative',
        147 => 'untitled',
        148 => 'fruticose',
        149 => 'tame',
        150 => 'zonal',
        151 => 'unscheduled',
        152 => 'atmospheric',
        153 => 'oncological',
        154 => 'litigious',
        155 => 'cryptobiotic',
        156 => 'sacral',
        157 => 'uncommon',
        158 => 'harmful',
        159 => 'occupied',
        160 => 'voluntary',
        161 => 'Oxonian',
        162 => 'blastocoelic',
        163 => 'exogenous',
        164 => 'basophilic',
        165 => 're-entrant',
        166 => 'bathyal',
        167 => 'worldly',
        168 => 'sublittoral',
        169 => 'juicy',
        170 => 'anaglyphic',
        171 => 'syncarpous',
        172 => 'intraventricular',
        173 => 'exothermal',
        174 => 'branchiopodan',
        175 => 'tonsorial',
        176 => 'worst',
        177 => 'odorless',
        178 => 'aborning',
        179 => 'penile',
        180 => 'mediatorial',
        181 => 'tearful',
        182 => 'adjectival',
        183 => 'esophageal',
        184 => 'bulging',
        185 => 'womanly',
        186 => 'serious',
        187 => 'bichromated',
        188 => 'insane',
        189 => 'premedical',
        190 => 'electroencephalographic',
        191 => 'former(a)',
        192 => 'lidded',
        193 => 'recessional',
        194 => 'unhearable',
        195 => 'Eurafrican',
        196 => 'Romansh',
        197 => 'Trojan',
        198 => 'morphemic',
        199 => 'insecure'
    ];

    protected $adjectiveGloss = [
        0 => 'easy to understand or use; "user-friendly computers"; "a consumer-friendly policy"; "a reader-friendly novel"',
        1 => 'highly enlightening; making understandable or clarifying; "an illuminating lecture"; "illuminating pieces of information"',
        2 => 'of or relating to the Roman Catholic philosophy of probabilism',
        3 => 'of a period of maximal use or demand or activity; "at peak hours the streets traffic is unbelievable"',
        4 => 'having an end or small portion cut off; "birds with clipped wings cannot fly"',
        5 => 'relating to or produced by roentgenography',
        6 => 'related to or affected by aphasia; "aphasic speech"',
        7 => 'above the surround or above the normal position; "a raised design"; "raised eyebrows"',
        8 => 'of or relating to or characteristic of blastomycosis',
        9 => 'owning or consisting of land or real estate; "the landed gentry"; "landed property"',
        10 => 'detrimental to good health; "unhealthful air pollution"; "unhealthful conditions in old apartments with peeling lead-based paint"',
        11 => 'capable of being shocked',
        12 => 'of or relating to rhetoric; "accepted two or three verbal and rhetorical changes I suggested"- W.A.White; "the rhetorical sin of the meaningless variation"- Lewis Mumford',
        13 => 'not in accord with or not following current fashion; "unfashionable clothes"; "melodrama of a now unfashionable kind"',
        14 => 'of or relating to or involving or practicing orthodontics; "orthodontic braces"',
        15 => '(usually followed by `of\'\') having capacity or ability; "capable of winning"; "capable of hard work"; "capable of walking on two feet"',
        16 => 'not associated with soldiers or the military; "unmilitary circles of government"; "fatigue duty involves nonmilitary labor"',
        17 => 'giving and careful attention to detail; hard to please; excessively concerned with cleanliness; "a fastidious and incisive intellect"; "fastidious about personal cleanliness"',
        18 => 'having no jaw',
        19 => 'of or relating to substances that are toxic to cells',
        20 => 'having panicles; occurring in panicles; "a panicled inflorescence"',
        21 => 'moving or going or growing upward; "the ascending plane"; "the ascending staircase"; "the ascending stems of chickweed"',
        22 => 'belonging or relating to white people of South Africa whose ancestors were Dutch or to their language; "an Afrikaans couple"; "Afrikaner support"',
        23 => 'not rude; marked by satisfactory (or especially minimal) adherence to social usages and sufficient but not noteworthy consideration for others; "even if he didn\'\'t like them he should have been civil"- W.S. Maugham',
        24 => 'working for yourself',
        25 => 'not having official authority or sanction; "a sort of unofficial mayor"; "an unofficial estimate"; "he participated in an unofficial capacity"',
        26 => 'of a stage in the development of a language or literature between earlier and later stages; "Middle English is the English language from about 1100 to 1500"; "Middle Gaelic"',
        27 => 'pertaining to or of the nature of metaphysics; "metaphysical philosophy"',
        28 => '(of weather of climate) physically severe',
        29 => 'serving to sustain or support; "sustentacular cells"',
        30 => 'of or relating to or characteristic of pachyderms',
        31 => 'involving less than the standard or customary time for an activity; "part-time employees"; "a part-time job"',
        32 => 'outside territorial limits or jurisdiction; "fishing in extraterritorial waters"; "enjoying exterritorial privileges and rights"',
        33 => 'of or relating to anaplasia',
        34 => 'not consisting of or related to language; "depended on his nonlinguistic skills"',
        35 => 'not servile or submissive',
        36 => 'not relating to a melodic subject; "there is nothing unthematic in this composition"',
        37 => 'of or relating to or involved the practice of aiding the memory; "mnemonic device"',
        38 => 'concerned with or characterized by rigorous or adherence to recognized forms (especially in religion or art); "highly formalized plays like `Waiting for Godot\'\'"',
        39 => 'of or relating to lizards',
        40 => 'having a high state of culture and development both social and technological; "terrorist acts that shocked the civilized world"',
        41 => 'not established by conditioning or learning; "an unconditioned reflex"',
        42 => '(used of living things especially persons) in an early period of life or development or growth; "young people"',
        43 => 'lacking a label or tag; "unlabeled luggage is liable to be lost"',
        44 => 'having a short broad head with a cephalic index of over 80',
        45 => 'of or relating to voyeurs or voyeurism; "his voyeuristic pleasures"',
        46 => 'not fit to fly',
        47 => 'solemnly dedicated to or set apart for a high purpose; "a life consecrated to science"; "the consecrated chapel"; "a chapel dedicated to the dead of World War II"',
        48 => 'of greater importance or stature or rank; "a major artist"; "a major role"; "major highways"',
        49 => 'of or relating to or using a general formulation that serves to guide investigation',
        50 => 'of or relating to conditions at the geographical equator; "equatorial heat"',
        51 => 'changed from a solid to a liquid state; "rivers filled to overflowing by melted snow"',
        52 => 'having your services engaged for; or having a job especially one that pays wages or a salary; "most of our graduates are employed"',
        53 => 'of or resembling purgatory; "purgatorial fires"',
        54 => 'relating to small pox',
        55 => 'not chaste; "unchaste conduct"',
        56 => 'of or relating to cilia projecting from the surface of a cell',
        57 => 'of or relating to or employing dialectic; "the dialectical method"',
        58 => 'not crystalline',
        59 => 'having no bearing on or connection with the subject at issue; "an irrelevant comment"; "irrelevant allegations"',
        60 => 'of or relating to or befitting eremites or their practices of hermitic living; "eremitic austerities"',
        61 => 'of or characteristic of a form or system felt to be of first significance before modern times',
        62 => 'contrary to accepted morality (especially sexual morality) or convention; "an illicit association with his secretary"',
        63 => 'of or related to New World monkeys having nostrils far apart or to people with broad noses',
        64 => 'of a current flowing in one direction only; not alternating; "direct current"',
        65 => 'situated at the bottom or lowest position; "the bottom drawer"',
        66 => 'located or occurring between the ribs; "intercostal muscles"',
        67 => 'brought about or set up or accepted; especially long established; "the established social order"; "distrust the constituted authority"; "a team established as a member of a major league"; "enjoyed his prestige as an established writer"; "an established pr',
        68 => 'not appropriate or proper (or even legal) in the circumstances; "undue influence"; "I didn\'\'t want to show undue excitement"; "accused of using undue force"',
        69 => 'changed or adjusted to be suitable',
        70 => 'of or relating to or characteristic of the atmosphere around a low pressure center; "cyclonic cloud pattern"',
        71 => 'of or relating to the home; "domestic servant"; "domestic science"',
        72 => 'not planted in pots',
        73 => 'having a tendency to reverberate or be repeatedly reflected; "a reverberant room"; "the reverberant booms of cannon"',
        74 => 'having no apparent stem above ground',
        75 => 'having the beard or hair cut off close to the skin',
        76 => 'of or relating to sarcolemma',
        77 => 'of or relating to an archdiocese',
        78 => 'having elegance or taste or refinement in manners or dress; "a little less posh but every bit as stylish as Lord Peter Wimsey"; "the stylish resort of Gstadd"',
        79 => 'producing more than one offspring at a time',
        80 => 'having qualities characteristic of Jesuits or Jesuitism; "Jesuitical education"',
        81 => 'relating to or involving mass spectroscopy',
        82 => 'of words: having opposite meanings',
        83 => 'used of a singer or singing voice that is marked by power and expressiveness and a histrionic or theatrical style; "a dramatic tenor"; "a dramatic soprano"',
        84 => 'relating to a historical tendency for a language to reduce its use of inflections; "modern English is a syncretic language"',
        85 => 'pertaining to altitude',
        86 => 'involving or derived from the senses; "sensory experience"; "sensory channels"',
        87 => 'of or relating to or capable of refraction; "the refractive characteristics of the eye"',
        88 => 'having a musical sound; especially a pleasing tune',
        89 => 'having been learned or found or determined especially by investigation',
        90 => 'of or relating to or involving planography',
        91 => 'of the military or industry; using (or being) the heaviest and most powerful armaments or weapons or equipment; "heavy artillery"; "heavy infantry"; "a heavy cruiser"; "heavy guns"; "heavy industry involves large-scale production of basic products (such a',
        92 => 'of or relating to Delphi or to the oracles of Apollo at Delphi; "Delphic oracle"',
        93 => 'relating to the raising of plants or animals; "a cultural variety"',
        94 => 'relating to capital letters which were kept in the top half of a compositor\'\'s type case; "uppercase letters; X and Y and Z etc"',
        95 => 'generalized feeling of distress',
        96 => 'of or relating to a 500th anniversary; "the quincentennial celebration of the founding of the city"',
        97 => 'pertaining to the phonic method of teaching reading',
        98 => 'relating to or concerned in sensation; "the sensory cortex"; "sensory organs"',
        99 => 'descended from a common ancestor but through different lines; "cousins are collateral relatives"; "an indirect descendant of the Stuarts"',
        100 => 'relating to or prompting tears',
        101 => 'no longer coiled',
        102 => 'of or relating to motivation',
        103 => 'not causing anger or annoyance; "inoffensive behavior"',
        104 => 'having the property of becoming permanently hard and rigid when heated or cured; "the phenol resins and plastics were the original synthetic thermosetting materials"',
        105 => 'of or relating to the Jewish Hasidim or its members or their beliefs and practices',
        106 => 'prepared and printed for distribution and sale; "the complete published works Dickens"',
        107 => 'of or relating to the normal condition of the eye in which visual images are in clear focus on the retina',
        108 => 'set aside for the use of a particular person or party',
        109 => 'no longer coiled',
        110 => 'lacking courage or vitality; "he was a yellow gutless worm"; "a spineless craven fellow"',
        111 => 'not equal in amount; "they distributed unlike (or unequal) sums to the various charities"',
        112 => 'disposed to take action or effectuate change; "a director who takes an active interest in corporate operations"; "an active antagonism"; "he was active in drawing attention to their grievances"',
        113 => 'marked by warmth of feeling like kindness and sympathy and generosity; "gave a warmhearted welcome to the stranger"',
        114 => 'concerning or characterized by an appreciation of beauty or good taste; "the aesthetic faculties"; "an aesthetic person"; "aesthetic feeling"; "the illustrations made the book an aesthetic success"',
        115 => 'not enthusiastic; lacking excitement or ardor; "an unenthusiastic performance by the orchestra"; "unenthusiastic applause"',
        116 => 'sustained or maintained by aid (as distinct from physical support); "a club entirely supported by membership dues"; "well-supported allegations"',
        117 => 'providing carefully for the future; "wild squirrels are provident"; "a provident father plans for his children\'\'s education"',
        118 => 'illegally beyond a prescribed line or area or ahead of the ball or puck; "the touchdown was nullified because the left tackle was offside"',
        119 => 'relating to the lower jaw',
        120 => 'unpleasant-smelling',
        121 => 'based on or exemplifying anagoge',
        122 => 'relating to or containing or affecting blood; "a hematic cyst"; "a hematic crisis"',
        123 => 'not having a shiny coating; "unglazed paper"',
        124 => 'colored with or as if with bister',
        125 => 'of or containing mercury',
        126 => '(especially of promises or contracts) not violated or disregarded; "unbroken promises"; "promises kept"',
        127 => 'divided into two lobes',
        128 => 'having or resembling a stinger or barb; "aculeate insects such as bees and wasps"',
        129 => 'of or relating to or befitting citizens as individuals; "civil rights"; "civil liberty"; "civic duties"; "civic pride"',
        130 => 'of or relating to or required by canon law',
        131 => 'of or relating to the people of Mesoamerica or their languages or cultures',
        132 => 'holding securities or commodities in expectation of a rise in prices; "is long on coffee"; "a long position in gold"',
        133 => 'between or among planets; "interplanetary travel"',
        134 => 'relating to or inhabiting hell; "his infernal majesty"; "infernal fires"; "infernal punishments"',
        135 => 'following a meal (especially dinner); "his postprandial cigar"; "took a postprandial walk"',
        136 => 'relating to or involving money; "monetary rewards"; "he received thanks but no pecuniary compensation for his services"',
        137 => 'of or relating to or characteristic of Ghana or its people or language; "Ghanaian cocoa production"',
        138 => 'free from liquid or moisture; lacking natural or normal moisture or depleted of water; or no longer wet; "dry land"; "dry clothes"; "a dry climate"; "dry splintery boards"; "a dry river bed"; "the paint is dry"',
        139 => 'of e.g. volcanos; temporarily inactive; "a dormant volcano"',
        140 => 'not caused by a specific agent; used also of staining in making microscope slides; "nonspecific enteritis"',
        141 => 'being or containing a hydroxyl group',
        142 => 'not fruitful; not conducive to abundant production',
        143 => 'lacking a belt; "unbelted jackets are in this season"',
        144 => 'fitted or equipped with necessary rigging (sails and shrouds and stays etc)',
        145 => 'relating to or resembling a nipple',
        146 => 'resistant to change',
        147 => 'not having a title or name; "his still untitled autobiography"; "many paintings are titled simply `Untitled\'\'"',
        148 => 'of or relating to or resembling a shrub',
        149 => 'brought from wildness into a domesticated state; "tame animals"; "fields of tame blueberries"',
        150 => 'relating to or of the nature of a zone; "the zonal frontier"',
        151 => 'not scheduled or not on a regular schedule; "an unscheduled meeting"; "the plane made an unscheduled stop at Gander for refueling"',
        152 => 'relating to or located in the atmosphere; "atmospheric tests"',
        153 => 'of or relating to or practicing oncology; "oncological nurse"',
        154 => 'of or relating to litigation',
        155 => 'of or related to the state of cryptobiosis',
        156 => 'of or relating to or near the sacrum',
        157 => 'not common or ordinarily encountered; unusually great in amount or remarkable in character or kind; "uncommon birds"; "frost and floods are uncommon during these months"; "doing an uncommon amount of business"; "an uncommon liking for money"; "he owed his',
        158 => 'constituting a disadvantage',
        159 => 'seized and controlled as by military invasion; "the occupied countries of Europe"',
        160 => 'controlled by individual volition; "voluntary motions"; "voluntary muscles"',
        161 => 'of or pertaining to or characteristic of the city of Oxford, England, or its inhabitants; "his Oxonian neighbors"; "Oxonian bookstores"',
        162 => 'of or relating to a segmentation cavity',
        163 => 'derived or originating externally',
        164 => 'staining readily with basic dyes',
        165 => '(of angles) pointing inward; "a polygon with re-entrant angles"',
        166 => 'relating to ocean depths between 200 and 2000 meters (corresponds to the continental slope)',
        167 => 'characteristic of or devoted to the temporal world; "worldly goods and advancement"',
        168 => 'of or relating to the region of the continental shelf (between the seashore and the edge of the continental shelf) or the marine organisms situated there',
        169 => 'full of juice',
        170 => 'related to anaglyphs or anaglyphy',
        171 => '(of ovaries of flowering plants) consisting of united carpels',
        172 => 'within the system of ventricles in the brain; "intraventricular pressure"',
        173 => '(of a chemical reaction or compound) occurring or formed with evolution of heat',
        174 => 'of or relating to or characteristic of the subclass Branchiopoda',
        175 => 'of or relating to barbers and barbering; "tonsorial work"; "tonsorial parlor"',
        176 => '(superlative of `bad\'\') most wanting in quality or value or condition; "the worst player on the team"; "the worst weather of the year"',
        177 => 'having no odor; "odorless gas"; "odorless flowers"',
        178 => 'in the process of being born or beginning; "our own revolutionary war almost died aborning through lack of popular support"- William Randolph Hearst',
        179 => 'of or relating to the penis; "penile erection"',
        180 => 'of or relating to a mediator or the duties of a mediator',
        181 => 'filled with or marked by tears; "tearful eyes"; "tearful entreaties"',
        182 => 'of or relating to or functioning as an adjective; "adjectival syntax"; "an adjective clause"',
        183 => 'relating to the esophagus',
        184 => 'curving or bulging outward',
        185 => 'befitting or characteristic of a woman especially a mature woman; "womanly virtues of gentleness and compassion"',
        186 => 'concerned with work or important matters rather than play or trivialities; "a serious student of history"; "a serious attempt to learn to ski"; "gave me a serious look"; "a serious young man"; "are you serious or joking?"; "Don\'\'t be so serious!"',
        187 => 'treated or combined with bichromate',
        188 => 'afflicted with or characteristic of mental derangement; "was declared insane"; "insane laughter"',
        189 => 'preparing for the study of medicine; "premedical students"',
        190 => 'of or relating to an electroencephalograph',
        191 => 'referring to the first of two things or persons mentioned (or the earlier one or ones of several); "the novel was made into a film in 1943 and again in 1967; I prefer the former version to the latter one"',
        192 => 'having or covered with a lid or lids; often used in combination; "milk is left in a large lidded mug"; "heavy-lidded eyes"',
        193 => 'of or relating to receding',
        194 => 'impossible to hear; imperceptible by the ear; "an inaudible conversation"',
        195 => 'relating to or coming from Europe and Africa',
        196 => 'of or relating to the Romansh language',
        197 => 'of or relating to the ancient city of Troy or its inhabitants; "Trojan cities"',
        198 => 'of or relating to morphemes',
        199 => 'lacking in security or safety; "his fortune was increasingly insecure"; "an insecure future"'
    ];

    protected $noun = [
        0 => 'genus_Macadamia',
        1 => 'crapshoot',
        2 => 'Tangier',
        3 => 'tear_gas',
        4 => 'screening',
        5 => 'arteria_circumflexa_femoris',
        6 => 'rogue',
        7 => 'cell_theory',
        8 => 'truelove_knot',
        9 => 'knife_pleat',
        10 => 'desynchronization',
        11 => 'Annona_reticulata',
        12 => 'bung',
        13 => 'hereafter',
        14 => 'metalwork',
        15 => 'robber_fly',
        16 => 'epinephrine',
        17 => 'roaster',
        18 => 'Bruchus',
        19 => 'earpiece',
        20 => 'red_squirrel',
        21 => 'Amauropelta',
        22 => 'Seeger',
        23 => 'Edward_Jean_Steichen',
        24 => 'adhesion',
        25 => 'modern_font',
        26 => 'Charles_Lamb',
        27 => 'cellar',
        28 => 'dwarf',
        29 => 'beta-adrenergic_blocker',
        30 => 'sleuthhound',
        31 => 'coolant_system',
        32 => 'country_club',
        33 => 'Tecumtha',
        34 => 'cheerlessness',
        35 => 'general_medicine',
        36 => 'digit',
        37 => 'vena_phrenica',
        38 => 'peeler',
        39 => 'hospital_ward',
        40 => 'vehemence',
        41 => 'tauon',
        42 => 'entrance_examination',
        43 => 'xanthopsia',
        44 => 'star-thistle',
        45 => 'Penstemon_barbatus',
        46 => 'family_Branchiostomidae',
        47 => 'genus_Pithecellobium',
        48 => 'rand',
        49 => 'shadflower',
        50 => 'XX',
        51 => 'CID',
        52 => 'digest',
        53 => 'St._Peter_the_Apostle',
        54 => 'execution',
        55 => 'susurrus',
        56 => 'suggestion',
        57 => 'reminder',
        58 => 'firelight',
        59 => 'hyperlipoidaemia',
        60 => 'Istiophoridae',
        61 => 'Hugo_deVries',
        62 => 'mara',
        63 => 'Cytisus_multiflorus',
        64 => 'coronary_thrombosis',
        65 => 'toe_dancing',
        66 => 'notebook_computer',
        67 => 'bloom',
        68 => 'hairball',
        69 => 'trouble',
        70 => 'Kropotkin',
        71 => 'guilt_trip',
        72 => 'airline',
        73 => 'hitter',
        74 => 'Kansas',
        75 => 'south_side',
        76 => 'capture',
        77 => 'food_colour',
        78 => 'socket_wrench',
        79 => 'moral_obligation',
        80 => 'walk-up_apartment',
        81 => 'S',
        82 => 'risk_taker',
        83 => 'loss_of_consciousness',
        84 => 'Innocents\'_Day',
        85 => 'hook',
        86 => 'luggage_carrousel',
        87 => 'construction_paper',
        88 => 'coffee_bar',
        89 => 'secondary_syphilis',
        90 => 'balance',
        91 => 'saturniid_moth',
        92 => 'fumitory_family',
        93 => 'finalization',
        94 => 'anachronism',
        95 => 'neigh',
        96 => 'chamber',
        97 => 'clip',
        98 => 'genus_Plectranthus',
        99 => 'single-breasted_jacket',
        100 => 'real_estate_loan',
        101 => 'anaphrodisia',
        102 => 'Yalta',
        103 => 'Rene_Antoine_Ferchault_de_Reaumur',
        104 => 'family_Cetorhinidae',
        105 => 'Hexanchus',
        106 => 'axile_placentation',
        107 => 'Baffin_Island',
        108 => 'sycamore_fig',
        109 => 'Rhinonicteris',
        110 => 'pronunciation',
        111 => 'manila_maguey',
        112 => 'venting',
        113 => 'speechlessness',
        114 => 'cotilion',
        115 => 'cavil',
        116 => 'genus_Agonus',
        117 => 'backdown',
        118 => 'wrist_pad',
        119 => 'BW',
        120 => 'Lost_Tribes',
        121 => 'propriety',
        122 => 'Tyne',
        123 => 'genus_Porzana',
        124 => 'vote',
        125 => 'Confucianism',
        126 => 'Antilocapra_americana',
        127 => 'electrocutioner',
        128 => 'Egretta_caerulea',
        129 => 'dork',
        130 => 'Prunus_domestica_insititia',
        131 => 'carina',
        132 => 'supermarketer',
        133 => 'fir_clubmoss',
        134 => 'filly',
        135 => 'Argonautidae',
        136 => 'pipe_of_peace',
        137 => 'anomalops',
        138 => 'secret_writing',
        139 => 'instillator',
        140 => 'works',
        141 => 'genus_Chloroxylon',
        142 => 'scaremonger',
        143 => 'carriage_house',
        144 => 'ruby_spinel',
        145 => 'stunt_kite',
        146 => 'self-will',
        147 => 'snarl',
        148 => 'Longfellow',
        149 => 'sundew',
        150 => 'calcium-cyanamide',
        151 => 'vibrancy',
        152 => 'engagement',
        153 => 'Orudis_KT',
        154 => 'Fourier',
        155 => 'thud',
        156 => 'Heloise',
        157 => 'Mikhail_Glinka',
        158 => 'dock',
        159 => 'hypnotic_trance',
        160 => 'John_Copley',
        161 => 'Hirudinidae',
        162 => 'tiffin',
        163 => 'Fraxinus',
        164 => 'Lucky_Lindy',
        165 => 'table_linen',
        166 => 'Giacometti',
        167 => 'Walker_foxhound',
        168 => 'gatehouse',
        169 => 'baa-lamb',
        170 => 'iron_curtain',
        171 => 'progress',
        172 => 'speech_rhythm',
        173 => 'unfolding',
        174 => 'obliteration',
        175 => 'Lonicera_tatarica',
        176 => 'cantala',
        177 => 'halberd',
        178 => 'European_bream',
        179 => 'conductance_unit',
        180 => 'gesture',
        181 => 'genus_Conilurus',
        182 => 'Gillette',
        183 => 'ream',
        184 => 'lower_jaw',
        185 => 'family_Otididae',
        186 => 'vase',
        187 => 'grayback',
        188 => 'statute_book',
        189 => 'bird_of_prey',
        190 => 'imputation',
        191 => 'Miltonia',
        192 => 'aroma',
        193 => 'quadripara',
        194 => 'Thomas_Jefferson',
        195 => 'bookshelf',
        196 => 'Roman_collar',
        197 => 'soil',
        198 => 'Secretary_of_Defense',
        199 => 'faineance'
    ];

    protected $nounGloss = [
        0 => 'trees or shrubs; madagascar to Australia',
        1 => 'a risky and uncertain venture; "getting admitted to the college of your choice has become a crapshoot"',
        2 => 'a city of northern Morocco at the west end of the Strait of Gibraltar; "the first tangerines were shipped from Tangier to Europe in 1841"',
        3 => 'a gas that makes the eyes fill with tears but does not damage them; used in dispersing crowds',
        4 => 'the act of concealing the existence of something by obstructing the view of it; "the cover concealed their guns from enemy aircraft"',
        5 => 'an artery that supplies the hip joint and thigh muscles',
        6 => 'a deceitful and unreliable scoundrel',
        7 => '(biology) the theory that cells form the fundamental structural and functional units of all living organisms; proposed in 1838 by Matthias Schleiden and by Theodor Schwann',
        8 => 'a knot for tying the ends of two lines together',
        9 => 'a single pleat turned in one direction',
        10 => 'the relation that exists when things occur at unrelated times; "the stimulus produced a desynchronizing of the brain waves"',
        11 => 'small tropical American tree bearing a bristly heart-shaped acid tropical fruit',
        12 => 'a plug used to close a hole in a barrel or flask',
        13 => 'the time yet to come',
        14 => 'the metal parts of something; "there were bullet holes in the metalwork"',
        15 => 'swift predatory fly having a strong body like a bee with the proboscis hardened for sucking juices of other insects captured on the wing',
        16 => 'a catecholamine secreted by the adrenal medulla in response to stress (trade name Adrenalin); stimulates autonomic nerve action',
        17 => 'a cook who roasts food',
        18 => 'type genus of the Bruchidae',
        19 => 'electro-acoustic transducer for converting electric signals into sounds; it is held over or inserted into the ear; "it was not the typing but the earphones that she disliked"',
        20 => 'common reddish-brown squirrel of Europe and parts of Asia',
        21 => 'epiphytic or terrestrial ferns of America and Africa and Polynesia',
        22 => 'United States folk singer who was largely responsible for the interest in folk music in the 1960s (born in 1919)',
        23 => 'United States photographer who pioneered artistic photography (1879-1973)',
        24 => 'the property of sticking together (as of glue and wood) or the joining of surfaces of different composition',
        25 => 'a typeface (based on an 18th century design by Gianbattista Bodoni) distinguished by regular shape and hairline serifs and heavy downstrokes',
        26 => 'English essayist (1775-1834)',
        27 => 'an excavation where root vegetables are stored',
        28 => 'a legendary creature resembling a tiny old man; lives in the depths of the earth and guards buried treasure',
        29 => 'any of various drugs used in treating hypertension or arrhythmia; decreases force and rate of heart contractions by blocking beta-adrenergic receptors of the autonomic nervous system',
        30 => 'a detective who follows a trail',
        31 => 'a cooling system that uses a fluid to transfer heat from one place to another',
        32 => 'a suburban club for recreation and socializing',
        33 => 'a famous chief of the Shawnee who tried to unite Indian tribes against the increasing white settlement (1768-1813)',
        34 => 'a feeling of dreary or pessimistic sadness',
        35 => 'the branch of medicine that deals with the diagnosis and (nonsurgical) treatment of diseases of the internal organs (especially in adults)',
        36 => 'a finger or toe in human beings or corresponding part in other vertebrates',
        37 => 'either of two veins that drain the diaphragm',
        38 => 'a performer who provides erotic entertainment by undressing to music',
        39 => 'block forming a division of a hospital (or a suite of rooms) shared by patients who need a similar kind of care; "they put her in a 4-bed ward"',
        40 => 'intensity or forcefulness of expression; "the vehemence of his denial"; "his emphasis on civil rights"',
        41 => 'a lepton of very great mass',
        42 => 'examination to determine a candidate\'\'s preparation for a course of studies',
        43 => 'visual defect in which objects appear to have a yellowish hue; sometimes occurs in cases of jaundice',
        44 => 'Mediterranean annual or biennial herb having pinkish to purple flowers surrounded by spine-tipped scales; naturalized in America',
        45 => 'plant of southwestern United States having long open clusters of scarlet flowers with yellow hairs on lower lip',
        46 => 'lancelets',
        47 => 'thorny shrubs and trees of tropical and subtropical America and Asia',
        48 => 'the basic unit of money in South Africa; equal to 100 cents',
        49 => 'annual weed of Europe and North America having a rosette of basal leaves and tiny flowers followed by oblong seed capsules',
        50 => 'the cardinal number that is the sum of nineteen and one',
        51 => 'the United States Army\'\'s principal law enfocement agency responsible for the conduct of criminal investigations for all levels of the Army anywhere in the world',
        52 => 'something that is compiled (as into a single book or file)',
        53 => 'disciple of Jesus and leader of the apostles; regarded by Catholics as the vicar of Christ on earth and first Pope',
        54 => '(computer science) the process of carrying out an instruction by a computer',
        55 => 'the indistinct sound of people whispering',
        56 => 'persuasion formulated as a suggestion',
        57 => 'an experience that causes you to remember something',
        58 => 'the light of a fire (especially in a fireplace)',
        59 => 'presence of excess lipids in the blood',
        60 => 'sailfishes; spearfishes; marlins',
        61 => 'Dutch botanist who rediscovered Mendel\'\'s laws and developed the mutation theory of evolution (1848-1935)',
        62 => 'hare-like rodent of the pampas of Argentina',
        63 => 'low European broom having trifoliate leaves and yellowish-white flowers',
        64 => 'obstruction of blood flow in a coronary artery by a blood clot (thrombus)',
        65 => 'a dance performed on tiptoe',
        66 => 'a small compact portable computer',
        67 => 'reproductive organ of angiosperm plants especially one having showy or colorful parts',
        68 => 'a compact mass of hair that forms in the alimentary canal (especially in the stomach of animals as a result of licking fur)',
        69 => 'an effort that is inconvenient; "I went to a lot of trouble"; "he won without any trouble"; "had difficulty walking"; "finished the test only with great difficulty"',
        70 => 'Russian anarchist (1842-1921)',
        71 => 'remorse caused by feeling responsible for some offence',
        72 => 'a hose that carries air under pressure',
        73 => '(baseball) a ballplayer who is batting',
        74 => 'a state in midwestern United States',
        75 => 'the side that is on the south',
        76 => 'a process whereby a star or planet holds an object in its gravitational field',
        77 => 'a digestible substance used to give color to food; "food color made from vegetable dyes"',
        78 => 'a wrench with a handle onto which sockets of different sizes can be fitted',
        79 => 'an obligation arising out of considerations of right and wrong; "he did it out of a feeling of moral obligation"',
        80 => 'an apartment in a building without an elevator',
        81 => 'an abundant tasteless odorless multivalent nonmetallic element; best known in yellow crystals; occurs in many sulphide and sulphate minerals and even in native form (especially in volcanic regions)',
        82 => 'someone who risks loss or injury in the hope of gain or excitement',
        83 => 'the occurrence of a loss of the ability to perceive and respond',
        84 => 'December 28, commemorating Herod\'\'s slaughter of the children of Bethlehem',
        85 => 'a mechanical device that is curved or bent to suspend or hold or pull something',
        86 => 'carries luggage to air travelers',
        87 => 'paper suitable for drawing and making cutouts',
        88 => 'a small restaurant where drinks and snacks are sold',
        89 => 'the second stage; characterized by eruptions of the skin and mucous membrane',
        90 => 'an equivalent counterbalancing weight',
        91 => 'large brightly colored and usually tropical moth; larvae spin silken cocoons',
        92 => 'erect or climbing herbs of the northern hemisphere and southern Africa: bleeding heart; Dutchman\'\'s breeches; fumitory; squirrel corn',
        93 => 'the act of finalizing',
        94 => 'an artifact that belongs to another time',
        95 => 'the characteristic sounds made by a horse',
        96 => 'a room used primarily for sleeping',
        97 => 'a sharp slanting blow; "he gave me a clip on the ear"',
        98 => 'large genus of ornamental flowering plants; includes some plants often placed in the genus Coleus',
        99 => 'a jacket having fronts that overlap only enough for fastenings',
        100 => 'a loan on real estate that is usually secured by a mortgage',
        101 => 'decline or absence of sexual desire',
        102 => 'a resort city in southern Ukraine on the Black Sea; scene of the Allied conference between Churchill and Stalin and Roosevelt in 1945',
        103 => 'French physicist who invented the alcohol thermometer (1683-1757)',
        104 => 'in some older classifications considered the family of the basking sharks',
        105 => 'a genus of Hexanchidae',
        106 => 'ovules are borne at or around the center of a compound ovary on an axis formed from joined septa',
        107 => 'the 5th largest island and the largest island of Arctic Canada; lies between Greenland and Hudson Bay',
        108 => 'thick-branched wide-spreading tree of Africa and adjacent southwestern Asia often buttressed with branches rising from near the ground; produces cluster of edible but inferior figs on short leafless twigs; the Biblical sycamore',
        109 => 'orange horseshoe bats',
        110 => 'the way a word or a language is customarily spoken; "the pronunciation of Chinese is difficult for foreigners"; "that is the correct pronunciation"',
        111 => 'hard fiber used in making coarse twine; from Philippine agave plants',
        112 => 'the act of venting',
        113 => 'the property of being speechless',
        114 => 'a lively dance originating in France in the 18th century',
        115 => 'an evasion of the point of an argument by raising irrelevant distinctions or objections',
        116 => 'type genus of the Agonidae',
        117 => 'a retraction of a previously held position',
        118 => 'protective garment consisting of a pad worn by football players',
        119 => 'the use of bacteria or viruses or toxins to destroy men and animals or food',
        120 => 'the ten Tribes of Israel that were deported into captivity in Assyria around 720 BC (leaving only the tribes of Judah and Benjamin)',
        121 => 'correct or appropriate behavior',
        122 => 'a river in northern England that flows east to the North Sea',
        123 => 'spotted crakes',
        124 => 'the opinion of a group as determined by voting; "they put the question to a vote"',
        125 => 'the teachings of Confucius emphasizing love for humanity; high value given to learning and to devotion to family (including ancestors); peace; justice; influenced the traditional culture of China',
        126 => 'fleet antelope-like ruminant of western North American plains with small branched horns',
        127 => 'an executioner who uses electricity to kill the condemned person',
        128 => 'small bluish gray heron of the western hemisphere',
        129 => 'a dull stupid fatuous person',
        130 => 'plum tree long cultivated for its edible fruit',
        131 => 'any of various keel-shaped structures or ridges such as that on the breastbone of a bird or that formed by the fused petals of a pea blossom',
        132 => 'an operator of a supermarket',
        133 => 'of northern Europe and America; resembling a miniature fir',
        134 => 'a young female horse under the age of four',
        135 => 'represented solely by the genus Argonauta',
        136 => 'a highly decorated ceremonial pipe of Amerindians; smoked on ceremonial occasions (especially as a token of peace)',
        137 => 'fish having a luminous organ beneath eye; of warm waters of the western Pacific and Puerto Rico',
        138 => 'act of writing in code or cipher',
        139 => 'medical apparatus that puts a liquid into a cavity drop by drop',
        140 => 'buildings for carrying on industrial labor; "they built a large plant to manufacture automobiles"',
        141 => 'deciduous trees of India and Sri Lanka',
        142 => 'a person who spreads frightening rumors and stirs up trouble',
        143 => 'a small building for housing coaches and carriages and other vehicles',
        144 => 'a spinel used as a gemstone (usually dark red)',
        145 => 'a maneuverable kite controlled by two lines and flown with both hands',
        146 => 'resolute adherence to your own ideas or desires',
        147 => 'something jumbled or confused; "a tangle of government regulations"',
        148 => 'United States poet remembered for his long narrative poems (1807-1882)',
        149 => 'any of various bog plants of the genus Drosera having leaves covered with sticky hairs that trap and digest insects; cosmopolitan in distribution',
        150 => 'a compound used as a fertilizer and as a source of nitrogen compounds',
        151 => 'having the character of a loud deep sound; the quality of being resonant',
        152 => 'contact by fitting together; "the engagement of the clutch"; "the meshing of gears"',
        153 => 'nonsteroidal anti-inflammatory drug (trade names Orudis or Orudis KT or Oruvail)',
        154 => 'French mathematician who developed Fourier analysis and studied the conduction of heat (1768-1830)',
        155 => 'a heavy dull sound (as made by impact of heavy objects)',
        156 => 'student and mistress and wife of Abelard (circa 1098-1164)',
        157 => 'Russian composer (1804-1857)',
        158 => 'landing in a harbor next to a pier where ships are loaded and unloaded or repaired; may have gates to let water in or out; "the ship arrived at the dock more than a day late"',
        159 => 'a trance induced by the use of hypnosis; the person accepts the suggestions of the hypnotist',
        160 => 'American painter who did portraits of Paul Revere and John Hancock before fleeing to England to avoid the American Revolution (1738-1815)',
        161 => 'a family of Hirudinea',
        162 => 'a midday meal',
        163 => 'ash',
        164 => 'United States aviator who in 1927 made the first solo nonstop flight across the Atlantic Ocean (1902-1974)',
        165 => 'linens for the dining table',
        166 => 'Swiss sculptor and painter known for his bronze sculptures of elongated figures (1901-1966)',
        167 => 'an American breed of foxhound',
        168 => 'a house built at a gateway; usually the gatekeeper\'\'s residence',
        169 => 'child\'\'s word for a sheep or lamb',
        170 => 'an impenetrable barrier to communication or information especially as imposed by rigid censorship and secrecy; used by Winston Churchill in 1946 to describe the demarcation between democratic and communist countries',
        171 => 'gradual improvement or growth or development; "advancement of knowledge"; "great progress in the arts"',
        172 => 'the arrangement of spoken words alternating stressed and unstressed elements; "the rhythm of Frost\'\'s poetry"',
        173 => 'a developmental process; "the flowering of ante-bellum culture"',
        174 => 'destruction by annihilating something',
        175 => 'a honeysuckle shrub of southern Russia to central Asia',
        176 => 'Philippine plant yielding a hard fibre used in making coarse twine',
        177 => 'a pike fitted with an ax head',
        178 => 'European freshwater fish having a flattened body and silvery scales; of little value as food',
        179 => 'a measure of a material\'\'s ability to conduct an electrical charge',
        180 => 'something done as an indication of intention; "a political gesture"; "a gesture of defiance"',
        181 => 'jerboa rats',
        182 => 'United States inventor and manufacturer who developed the safety razor (1855-1932)',
        183 => 'a large quantity of written matter; "he wrote reams and reams"',
        184 => 'the lower jawbone in vertebrates; it is hinged to open the mouth',
        185 => 'bustards',
        186 => 'an open jar of glass or porcelain used as an ornament or to hold flowers',
        187 => 'a dowitcher with a gray back',
        188 => 'a record of the whole body of legislation in a given jurisdiction',
        189 => 'any of numerous carnivorous birds that hunt and kill other animals',
        190 => 'a statement attributing something dishonest (especially a criminal offense); "he denied the imputation"',
        191 => 'genus of tropical American orchids',
        192 => 'any property detected by the olfactory system',
        193 => '(obstetrics) woman who has given birth to a viable infant in each of four pregnancies',
        194 => '3rd President of the United States; chief drafter of the Declaration of Independence; made the Louisiana Purchase in 1803 and sent out the Lewis and Clark Expedition to explore it (1743-1826)',
        195 => 'a shelf on which to keep books',
        196 => 'a stiff white collar with no opening in the front; a distinctive symbol of the clergy',
        197 => 'the part of the earth\'\'s surface consisting of humus and disintegrated rock',
        198 => 'the position of the head of the Department of Defense; "the position of Defense Secretary was created in 1947"',
        199 => 'the trait of being idle out of a reluctance to work'
    ];

    protected $postData = [];

    final public function __construct()
    {
        $this->postData = \IPS\storm\Pseudo\PostData::getPostData();
    }

    public function generateForum( $category = false, $start = false )
    {
        if( $start )
        {
            try
            {
                $this->checkIt();
            }
            catch( \Exception $e )
            {
                for( $i = 0; $i <= 3; $i++ )
                {
                    static::generateForum( true );
                }
            }
        }

        $rand = array_rand( $this->adjective, 1 );
        $rand2 = array_rand( $this->noun, 1 );
        $name = str_replace( "_", " ", $this->adjective[ $rand ] . " " . $this->noun[ $rand2 ] );
        $name = \ucwords( mb_strtolower( $name ) );
        $desc = $this->adjectiveGloss[ $rand ] . "; " . $this->nounGloss[ $rand2 ];
        $findType = $rand / 17;
        $type = "normal";
        $makeCat = $rand / 29;

        if( !$category )
        {
            if( !is_int( $makeCat ) )
            {
                try
                {
                    $parent = $this->getForum();
                    $parent = $parent->id;
                }
                catch( \Exception $e )
                {
                    $parent = static::generateForum( true );
                }
            }
            else
            {
                $parent = static::generateForum( true );
            }

            if( \is_int( $findType ) )
            {
                $type = "qa";
            }

        }
        else
        {
            $parent = -1;
            $type = "category";
        }

        $toSave = array(
            'forum_name' => $name,
            'forum_description' => $desc,
            'forum_type' => $type,
            'forum_parent_id' => $parent
        );

        if( $type == "qa" )
        {
            $toSave[ 'forum_preview_posts_qa' ] = [];
            $toSave[ 'forum_can_view_others_qa' ] = 1;
            $toSave[ 'forum_sort_key_qa' ] = "last_post";
            $toSave[ 'forum_permission_showtopic_qa' ] = 1;
        }
        else
        {
            $toSave[ 'forum_sort_key' ] = "last_post";
        }

        $f = new \IPS\forums\Forum;
        $f->saveForm( $f->formatFormValues( $toSave ) );

        $insert = [
            'app' => "forums",
            'perm_type' => "forum",
            "perm_type_id" => $f->id,
            "perm_view" => "*",
            "perm_2" => "*",
            "perm_3" => "*",
            "perm_4" => "*",
            "perm_5" => "*"
        ];

        \IPS\Db::i()->insert( 'core_permission_index', $insert );
        \IPS\storm\Generator::create( "forums", $f->id );
        if( $category )
        {
            return $f->id;
        }
        else if( $start )
        {
            $rand = rand( 1, 12 );

            for( $i = 0; $i < $rand; $i++ )
            {
                $this->generateTopic( $f );
            }
        }
    }

    protected function checkIt()
    {
        \IPS\Db::i()->select( "*", "forums_forums", [], "RAND()" )->first();
    }

    protected function getForum()
    {
        $db = \IPS\Db::i()->select( "*", "forums_forums", [ 'parent_id = ?', -1 ], "RAND()" )->first();

        try
        {
            $db = \IPS\Db::i()->select( "*", "forums_forums", [ 'parent_id = ?', $db[ 'id' ] ], "RAND()" )->first();
            $rand = rand( 1, 10 );
            $rand = $rand / 3;
            if( is_int( $rand ) )
            {
                try
                {
                    $db = \IPS\Db::i()
                                 ->select( "*", "forums_forums", [ 'parent_id = ?', $db[ 'id' ] ], "RAND()" )
                                 ->first();
                }
                catch( \Exception $e )
                {
                }
            }
        }
        catch( \Exception $e )
        {
        }

        return \IPS\forums\Forum::constructFromData( $db );
    }

    public function generateTopic( \IPS\forums\Forum $forum = null )
    {
        if( !$forum )
        {
            $forum = $this->getForum();
        }

        $member = $this->getMember();
        $rand = array_rand( $this->adjective, 1 );
        $rand2 = array_rand( $this->noun, 1 );
        $name = str_replace( "_", " ", $this->adjective[ $rand ] . " " . $this->noun[ $rand2 ] );
        $name = \ucwords( mb_strtolower( $name ) );
        $time = static::getTime();

        $topic = \IPS\forums\Topic::createItem(
            $member,
            $member->ip_address,
            \IPS\DateTime::ts( $time ),
            $forum
        );

        $topic->title = $name;
        $topic->save();
        $post = $this->generatePost( $topic, $member, true );
        $topic->topic_firstpost = $post->pid;
        $topic->save();
        $posts = rand( 1, 12 );
        \IPS\storm\Generator::create( "topics", $topic->tid );
        for( $i = 0; $i < $posts; $i++ )
        {
            $this->generatePost( $topic );
        }
    }

    protected function getMember()
    {
        $db = \IPS\Db::i()->select( "*", "core_members", [], "RAND()" )->first();
        return \IPS\Member::constructFromData( $db );
    }

    public static function getTime( $date = null )
    {
        $rand = rand( 1, 3 );
        $cur = time();
        if( !$date )
        {
            $date = \IPS\Settings::i()->getFromConfGlobal( 'board_start' );
        }

        switch( $rand )
        {
            case 1:
                $time = 60;
                break;
            case 2:
                $time = 3600;
                break;
            case 3:
                $time = 84000;
                break;
        }
        $foo = rand( 1, 1000 );
        $time = $date + ( $foo * $time );

        if( $time > $cur )
        {
            $time = static::getTime( $date );
        }

        return $time;
    }

    public function generatePost( \IPS\forums\Topic $topic = null, \IPS\Member $member = null, $first = false )
    {
        $rand = array_rand( $this->postData, 1 );
        $content = "<p>" . $this->postData[ $rand ] . "</p>";

        $double = $rand / 17;

        if( is_int( $double ) )
        {
            if( $rand == 421 )
            {
                $cur = 0;
            }
            else
            {
                $cur = $rand + 1;
            }

            $content .= "<p>" . $this->postData[ $cur ] . "</p>";
        }

        if( !$topic )
        {
            $topic = $this->getTopic();
            $time = static::getTime( $topic->start_date );
        }
        else
        {
            $time = static::getTime( $topic->start_date );;
        }

        if( !$member )
        {
            $member = $this->getMember();
        }

        $post = \IPS\forums\Topic\Post::create(
            $topic,
            $content,
            $first,
            null,
            true,
            $member,
            \IPS\DateTime::ts( $time )
        );
        \IPS\storm\Generator::create( "posts", $post->pid );
        if( $first )
        {
            return $post;
        }
    }

    protected function getTopic()
    {
        try
        {
            $dbFirst = \IPS\Db::i()->select( "*", "forums_topics", [], "id ASC" )->first();
            $dbLast = \IPS\Db::i()->select( "*", "forums_topics", [], "id DESC" )->first();
            $range = rand( $dbFirst[ 'id' ], $dbLast[ 'id' ] );
            $db = \IPS\Db::i()->select( "*", "forums_topics", [ 'id = ?', $range ], "id DESC" )->first();
        }
        catch( \Exception $e )
        {
            $db = \IPS\Db::i()->select( "*", "forums_topics", [], "RAND()" )->first();
        }
        return \IPS\forums\Topic::constructFromData( $db );
    }
}
