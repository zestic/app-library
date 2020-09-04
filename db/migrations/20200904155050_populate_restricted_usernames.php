<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class PopulateRestrictedUsernames extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up()
    {
        $usernames = $this->usernames();
        foreach ($usernames as $username) {
            $builder = $this->getQueryBuilder();
            $builder
                ->insert(['username'])
                ->into('restricted_usernames')
                ->values(['username' => $username])
                ->execute();
        }
    }

    public function down()
    {
        $this->table('restricted_usernames')->truncate();
    }

    private function usernames(): array
    {
        return [
            'ablet',
            'ablets',
            'about',
            'abuse',
            'ac',
            'account',
            'acebook',
            'ache',
            'ackup',
            'activate',
            'ad',
            'adastro',
            'add',
            'adget',
            'adgets',
            'admin',
            'administrator',
            'ae',
            'af',
            'ag',
            'age',
            'ager',
            'ages',
            'ahoo',
            'ai',
            'ail',
            'ail1',
            'ail2',
            'ail3',
            'ail4',
            'ail5',
            'ailer',
            'ailing',
            'al',
            'ale',
            'alendar',
            'ales',
            'alk',
            'am',
            'ame',
            'amed',
            'ames',
            'aml',
            'ampaign',
            'ample',
            'amples',
            'an',
            'anager',
            'ancel',
            'andom',
            'anel',
            'anifesto',
            'anner',
            'anners',
            'ao',
            'ap',
            'api',
            'app',
            'apple',
            'apps',
            'aps',
            'aq',
            'ar',
            'arabic',
            'archive',
            'archives',
            'areer',
            'areers',
            'arketing',
            'art',
            'as',
            'ash',
            'ashboard',
            'ask',
            'asks',
            'assword',
            'aster',
            'at',
            'ata',
            'atabase',
            'au',
            'auth',
            'auth_clients',
            'autoconfig',
            'ava',
            'avascript',
            'avascripts',
            'ave',
            'avorite',
            'avorites',
            'avourite',
            'avourites',
            'aw',
            'awadhi',
            'ax',
            'az',
            'azerbaijani',
            'b',
            'ba',
            'bb',
            'bd',
            'be',
            'bengali',
            'bf',
            'bg',
            'bh',
            'bhojpuri',
            'bi',
            'bj',
            'blog',
            'bm',
            'bn',
            'bo',
            'bout',
            'br',
            'broadcasthost',
            'bs',
            'bt',
            'burmese',
            'buse',
            'bv',
            'bw',
            'by',
            'bz',
            'ca',
            'cache',
            'cancel',
            'careers',
            'cart',
            'cc',
            'ccess',
            'ccount',
            'ccounts',
            'cd',
            'cf',
            'cg',
            'ch',
            'changelog',
            'checkout',
            'chinese',
            'ci',
            'ck',
            'cl',
            'cm',
            'cn',
            'co',
            'codereview',
            'commerce',
            'community',
            'compare',
            'config',
            'configuration',
            'connect',
            'contact',
            'copyright',
            'cr',
            'create',
            'cript',
            'cripts',
            'cs',
            'css',
            'ctivate',
            'cu',
            'cv',
            'cx',
            'cy',
            'cz',
            'd',
            'dashboard',
            'dd',
            'ddress',
            'de',
            'dea',
            'deas',
            'delete',
            'dev',
            'developer',
            'developers',
            'df',
            'direct_messages',
            'dit',
            'ditor',
            'dj',
            'dk',
            'dm',
            'dmin',
            'dministration',
            'dministrator',
            'dn',
            'do',
            'docs',
            'documentation',
            'domainadmin',
            'domainadministrator',
            'download',
            'downloads',
            'ds',
            'dult',
            'dutch',
            'dvertising',
            'dz',
            'e',
            'earch',
            'eather',
            'eature',
            'eatured',
            'eatures',
            'eb',
            'eblog',
            'ebmail',
            'ebmaster',
            'ebsite',
            'ebsites',
            'ec',
            'ech',
            'ecipe',
            'ecipes',
            'ecruitment',
            'ecure',
            'ecurity',
            'edia',
            'edit',
            'ee',
            'eed',
            'eedback',
            'eeds',
            'eg',
            'egal',
            'egister',
            'egistration',
            'eh',
            'elcome',
            'elete',
            'ell-known',
            'elnet',
            'elp',
            'elpcenter',
            'email',
            'embed',
            'emo',
            'emove',
            'emplate',
            'emplates',
            'employment',
            'end',
            'endas',
            'english',
            'enterprise',
            'eplies',
            'equest',
            'er',
            'erl',
            'erms',
            'erms-of-use',
            'errors',
            'ervice',
            'ervices',
            'es',
            'eset',
            'esign',
            'esigner',
            'essage',
            'essages',
            'essenger',
            'essions',
            'est',
            'est1',
            'est2',
            'est3',
            'este',
            'ests',
            'et',
            'eta',
            'etter',
            'etting',
            'ettings',
            'etup',
            'etwork',
            'eu',
            'ev',
            'evel',
            'eveloper',
            'evelopers',
            'evelopment',
            'events',
            'ew',
            'ewest',
            'ews',
            'ewsletter',
            'example',
            'facebook',
            'faq',
            'faqs',
            'farsi',
            'favorites',
            'features',
            'feed',
            'feedback',
            'feeds',
            'ffers',
            'ffiliate',
            'ffiliates',
            'fi',
            'fj',
            'fk',
            'fleet',
            'fleets',
            'fm',
            'fn',
            'fo',
            'follow',
            'followers',
            'following',
            'fr',
            'french',
            'friend',
            'friends',
            'ftp',
            'ga',
            'gan',
            'gb',
            'gd',
            'ge',
            'german',
            'gf',
            'gg',
            'gh',
            'gi',
            'gist',
            'github',
            'gl',
            'gm',
            'gn',
            'google',
            'gp',
            'gq',
            'gr',
            'group',
            'groups',
            'gs',
            'gt',
            'gu',
            'guest',
            'guests',
            'gujarati',
            'gw',
            'gy',
            'hakka',
            'hangelog',
            'hat',
            'hausa',
            'heckout',
            'hef',
            'help',
            'heme',
            'hemes',
            'hindi',
            'hk',
            'hm',
            'hn',
            'home',
            'hop',
            'hopping',
            'hosting',
            'hostmaster',
            'hoto',
            'hotoalbum',
            'hotos',
            'hp',
            'hr',
            'ht',
            'hu',
            'ic',
            'icense',
            'ick',
            'ickname',
            'icroblog',
            'icroblogs',
            'ics',
            'id',
            'idea',
            'ideas',
            'ideo',
            'ideos',
            'idget',
            'idgets',
            'ie',
            'ift',
            'ignin',
            'ignup',
            'iki',
            'il',
            'ile',
            'iles',
            'illing',
            'im',
            'image',
            'images',
            'imap',
            'img',
            'imulus',
            'in',
            'index',
            'ine',
            'info',
            'invitations',
            'invite',
            'io',
            'iq',
            'ir',
            'irect_messages',
            'irectory',
            'is',
            'isatap',
            'isc',
            'isitor',
            'ist',
            'ists',
            'it',
            'italian',
            'ite',
            'itemap',
            'itemap.xml',
            'ites',
            'japanese',
            'javanese',
            'jax',
            'je',
            'jinyu',
            'jm',
            'jo',
            'job',
            'jobs',
            'jp',
            'js',
            'json',
            'kannada',
            'ke',
            'kg',
            'kh',
            'ki',
            'km',
            'kn',
            'korean',
            'kp',
            'kr',
            'kw',
            'ky',
            'kz',
            'la',
            'lackberry',
            'lan',
            'language',
            'languages',
            'lans',
            'lb',
            'lc',
            'ld',
            'ldest',
            'leet',
            'leets',
            'li',
            'lient',
            'liente',
            'lients',
            'lists',
            'lk',
            'localdomain',
            'localhost',
            'log',
            'login',
            'logout',
            'logs',
            'lr',
            'ls',
            'lt',
            'lu',
            'lugin',
            'lugins',
            'lv',
            'ly',
            'ma',
            'mage',
            'mages',
            'mail',
            'mailer-daemon',
            'mailerdaemon',
            'maithili',
            'malayalam',
            'mandarin',
            'map',
            'maps',
            'marathi',
            'marketing',
            'mbed',
            'mc',
            'mca',
            'md',
            'me',
            'media',
            'mg',
            'mh',
            'min-nan',
            'mine',
            'mis',
            'mk',
            'ml',
            'mm',
            'mn',
            'mo',
            'mp',
            'mployment',
            'mpp',
            'mq',
            'mr',
            'ms',
            'mt',
            'mtp',
            'mu',
            'mv',
            'mw',
            'mx',
            'my',
            'mz',
            'na',
            'nalytics',
            'nc',
            'nclude',
            'ncludes',
            'ndex',
            'ndice',
            'ndroid',
            'ne',
            'new',
            'news',
            'nf',
            'nfo',
            'nfollow',
            'nformation',
            'ng',
            'ni',
            'nl',
            'nline',
            'no',
            'no-reply',
            'nobody',
            'noc',
            'non',
            'nonymous',
            'noreply',
            'nowledgebase',
            'np',
            'nr',
            'ns0',
            'ns1',
            'ns2',
            'ns3',
            'ns4',
            'ns5',
            'ns6',
            'ns7',
            'ns8',
            'ns9',
            'nsubscribe',
            'nterprise',
            'ntranet',
            'nu',
            'nvitations',
            'nvite',
            'nz',
            'oard',
            'oauth',
            'oauth_clients',
            'ob',
            'obile',
            'obots',
            'obots.txt',
            'obs',
            'oc',
            'ocs',
            'ocumentation',
            'ode',
            'odereview',
            'odes',
            'odo',
            'odule',
            'odules',
            'offers',
            'og',
            'ogin',
            'ogout',
            'ogs',
            'oll',
            'ollow',
            'ollowers',
            'ollowing',
            'olls',
            'om',
            'omain',
            'ome',
            'omepage',
            'omercial',
            'ommercial',
            'ompare',
            'ompras',
            'onfig',
            'onfiguration',
            'onnect',
            'ont',
            'ontact',
            'ontact-us',
            'ontest',
            'onts',
            'ood',
            'oogle',
            'ookie',
            'ools',
            'oot',
            'op',
            'op3',
            'openid',
            'oporte',
            'opular',
            'order',
            'orders',
            'organizations',
            'oriya',
            'orkshop',
            'orporate',
            'orum',
            'orums',
            'ost',
            'ostfix',
            'osting',
            'ostmaster',
            'ostname',
            'osts',
            'ot',
            'otes',
            'oticias',
            'ots',
            'ou',
            'our',
            'ourdomain',
            'ourname',
            'oursite',
            'ourusername',
            'ovie',
            'ovies',
            'owner',
            'ownload',
            'ownloads',
            'p3',
            'pa',
            'pace',
            'paces',
            'pad',
            'panjabi',
            'pdate',
            'pe',
            'penid',
            'perator',
            'pf',
            'pg',
            'ph',
            'phone',
            'pi',
            'pk',
            'pl',
            'plans',
            'pload',
            'ploads',
            'pm',
            'pn',
            'polish',
            'pop',
            'pop3',
            'popular',
            'portuguese',
            'post',
            'postmaster',
            'pp',
            'pps',
            'pr',
            'pricing',
            'privacy',
            'projects',
            'ps',
            'pt',
            'put',
            'pw',
            'py',
            'qa',
            'ql',
            'ranslations',
            'rc',
            'rchive',
            'rchives',
            'rder',
            'rders',
            're',
            'reate',
            'recruitment',
            'ree',
            'register',
            'remove',
            'rends',
            'replies',
            'ress',
            'rganizations',
            'ricing',
            'riend',
            'riends',
            'rivacy',
            'rivacy-policy',
            'rl',
            'ro',
            'rofile',
            'rofiles',
            'roject',
            'rojects',
            'romanian',
            'romo',
            'root',
            'rossdomain',
            'rossdomain.xml',
            'roup',
            'roups',
            'rs',
            'rss',
            'rticle',
            'rticles',
            'ru',
            'russian',
            'rust',
            'rw',
            's',
            's1',
            's10',
            's2',
            's3',
            's4',
            's5',
            's6',
            's7',
            's8',
            's9',
            'sa',
            'sage',
            'sales',
            'save',
            'sb',
            'sc',
            'sd',
            'se',
            'search',
            'security',
            'ser',
            'serbo-croatian',
            'sername',
            'sers',
            'sessions',
            'settings',
            'sg',
            'sh',
            'shop',
            'si',
            'signin',
            'signout',
            'signup',
            'sindhi',
            'sitemap',
            'sj',
            'sk',
            'sl',
            'sladmin',
            'sladministrator',
            'slwebmaster',
            'sm',
            'smtp',
            'sn',
            'so',
            'son',
            'spanish',
            'sr',
            'src',
            'ss',
            'ssl',
            'ssladmin',
            'ssladministrator',
            'sslwebmaster',
            'st',
            'stacks',
            'status',
            'stories',
            'styleguide',
            'su',
            'suario',
            'subscribe',
            'subscriptions',
            'sunda',
            'support',
            'support-details',
            'supportdetails',
            'sv',
            'sy',
            'sys',
            'sysadmin',
            'sysadministrator',
            'system',
            'sz',
            't',
            'tage',
            'taging',
            'tamil',
            'tart',
            'tat',
            'tatic',
            'tatistics',
            'tats',
            'tatus',
            'tc',
            'td',
            'telugu',
            'terms',
            'tf',
            'tg',
            'th',
            'thai',
            'tj',
            'tk',
            'tl',
            'tm',
            'tml',
            'tn',
            'to',
            'tom',
            'tore',
            'tores',
            'tories',
            'tory',
            'tour',
            'tp',
            'tr',
            'translations',
            'trends',
            'tt',
            'ttp',
            'ttpd',
            'ttps',
            'turkish',
            'tutorial',
            'tutorials',
            'tv',
            'tw',
            'twitter',
            'tyleguide',
            'tz',
            'ua',
            'ub',
            'ubdomain',
            'ublic',
            'ubscribe',
            'ubscriptions',
            'uby',
            'uest',
            'ug',
            'uk',
            'ukrainian',
            'unfollow',
            'unsubscribe',
            'update',
            'uporte',
            'upport',
            'urdu',
            'url',
            'urprise',
            'urvey',
            'urveys',
            'us',
            'usenet',
            'user',
            'users',
            'usic',
            'usicas',
            'usiness',
            'ust',
            'ustomer',
            'ut',
            'uth',
            'uthentication',
            'utorial',
            'utorials',
            'uucp',
            'uy',
            'uz',
            'v',
            'va',
            'vatar',
            'vc',
            've',
            'vg',
            'vi',
            'vietnamese',
            'vn',
            'vu',
            'w',
            'weather',
            'webmaster',
            'wf',
            'widget',
            'widgets',
            'wiki',
            'witter',
            'wittr',
            'wpad',
            'ws',
            'wu',
            'ww',
            'ww1',
            'ww2',
            'ww3',
            'ww4',
            'ww5',
            'ww6',
            'ww7',
            'wws',
            'www',
            'wwww',
            'x',
            'xfn',
            'xiang',
            'xml',
            'xmpp',
            'xx',
            'y',
            'yaml',
            'ye',
            'yml',
            'yoruba',
            'ys',
            'ysadmin',
            'ysadministrator',
            'ysop',
            'ysql',
            'ystem',
            'yt',
            'ython',
            'yu',
            'za',
            'zm',
            'zw',
        ];
    }
}