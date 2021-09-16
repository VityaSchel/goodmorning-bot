<?php

$_IS_HOLIDAYS = 0;
$_FIXED_IMAGE = "";

if($_IS_HOLIDAYS) { die('holidays'); }
if(date('w') == 0) { die("weekend"); }
$access_token = file_get_contents("vk_access_token");
$peer_id = "2000000002";
$links = ["https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-laymom-79358.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/zabavnaya-kartinka-s-dobrym-utrom-79357.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/samaya-prekrasnaya-otkrytka-s-dobrym-utrom-79355.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/otlichnaya-kartinka-s-dobrym-utrom-79321.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/ochen-veselaya-otkrytka-dobroe-utro-78949.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-knizhkoy-64351.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/zabavnaya-otkrytka-dobroe-utro-62969.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/chudo-dlya-togo-sluchitsya-kto-vsem-serdtsem-ego-zhdet-57932.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/chudesnogo-utra-plodotvornogo-dnya-58187.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/ochen-nezhnaya-kartinka-dobroe-utro-79318.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-chashkoy-chaya-79317.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-s-dobrym-utrom-nalivaem-kofe-79316.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/ochen-priyatnaya-kartinka-dobroe-utro-79186.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-druzya-79185.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-s-dobrym-utrom-ulybaysya-79184.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-s-dobrym-utrom-zhdut-dela-79183.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-vsem-dobroe-utrechko-79153.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/ochen-klassnaya-otkrytka-dobroe-utro-79154.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/prelestnaya-otkrytka-dobroe-utro-79152.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/klassnaya-kartinka-druzyam-s-dobrym-utrom-79320.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/prelestnaya-kartinka-dobroe-utro-78948.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/ochen-interesnaya-otkrytka-dobroe-utro-78947.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/samaya-priyatnaya-otkrytka-s-dobrym-utrom-78910.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/ochen-smeshnaya-otkrytka-s-dobrym-utrom-78909.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/ochen-milaya-kartinka-dobroe-utro-78908.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/samaya-milaya-otkrytka-dobroe-utro-78907.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-samogo-dobrogo-utra-78825.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobroe-utro-s-prikolom-78575.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/priyatnaya-otkrytka-dobroe-utro-78525.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobroe-utro-udachnogo-dnya-78524.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-buketom-roz-78523.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobrogo-utra-pora-vstavat-78522.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobrogo-milogo-utra-78339.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-chaykom-78338.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-kotyatami-78337.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobrogo-tsvetochnogo-utra-78336.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobrogo-chudesnogo-utra-78335.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-chashechkoy-kofe-78240.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobrogo-romantichnogo-utra-78239.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobroe-utro-s-pirozhnym-78077.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/romantichnaya-otkrytka-dobroe-utro-78076.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-belymi-tsvetami-78052.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-chernikoy-78051.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobroe-utro-s-chasami-78050.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-otkryvay-glazki-78049.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobrogo-utra-na-prirode-75996.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/s-dobrym-utrom-18495.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobroe-utro-s-animatsiey-75928.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-rebenkom-75927.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-zavtrakom-75924.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobroe-utro-s-romashkoy-75298.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-krasivye-tsvety-75296.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-s-dobrym-utrom-novinka-75295.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobroe-utro-s-morem-74445.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-samoe-dobroe-utro-74444.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-sobachkoy-74442.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobroe-utro-ulybnis-74440.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobroe-utro-s-rozami-74383.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-klevogo-dnya-74382.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-klassnogo-vam-utra-74170.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobroe-vsem-utro-74111.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-s-dobrym-utrom-yasnogo-dnya-74110.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-kotikom-74108.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-chashkami-74106.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-obezyankoy-74092.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-piknikom-74090.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-s-dobrym-utrom-khoroshego-dnya-71961.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-s-dobrym-utrom-i-svetlym-dnem-71960.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/krasivaya-kartinka-nezhnogo-utra-71959.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobrogo-i-radostnogo-utra-70659.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobrogo-utra-vsego-nailuchshego-70658.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobrogo-utra-i-uspekhov-70657.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-udachnoy-nedeli-70655.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobroe-utro-s-tyulpanami-70538.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-prekrasnogo-nastroeniya-70531.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-kapuchino-70533.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-serdechkom-70535.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-kofeykom-70537.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-mishkoy-68925.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-zhelayu-dobrogo-utrechka-68231.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-medom-67550.jpg",
          "https://i.imgur.com/mVEiEnY.png",
          "https://cdn.otkritkiok.ru/posts/thumbs/priyatnaya-kartinka-dobroe-utro-67547.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-nezhnogo-utra-67546.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobrogo-bodrogo-utra-67545.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-volshebnogo-utra-66798.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-vkusnogo-utra-s-kofe-65960.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-priyatnymi-slovami-65959.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobroe-utro-prishlo-65958.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-radost-moya-65957.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-vsem-dobrogo-utra-65956.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobroe-utro-s-pionami-65955.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobroe-utro-s-kapuchino-65954.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobroe-utro-s-yumorom-65953.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-pust-otlichno-den-proydet-65060.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobroe-utro-s-solnyshkom-65057.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-pust-den-slozhitsya-udachno-65056.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobroe-utro-s-tsitatoy-65011.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-pust-den-nachnetsya-s-dobroty-64977.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/svezhaya-kartinka-dobroe-utro-64748.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/dvizhushchayasya-otkrytka-dobroe-utro-64712.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-kruassanami-64711.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobroe-utro-s-kotenkom-64627.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-zamechatelnogo-utra-64369.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/ochen-simpatichnaya-kartinka-dobroe-utro-79319.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-s-dobrym-utrom-45667-3410326.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-prekrasnogo-dnya-64295.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/smeshnaya-otkrytka-s-dobrym-utrom-44599.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/s-dobrym-utrom-s-novym-dnem-44114.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/milaya-kartinka-s-dobrym-utrom-i-stikhami-60985.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/dobrogo-utrechka-druzya-55378.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/s-dobrym-utrom-internet-55004.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobroe-utro-s-neobychnymi-tsvetami-64098.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-blinchikami-64066.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-tortikom-64049.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/zabavnaya-kartinka-dobroe-utro-63912.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/priyatnaya-otkrytka-dobroe-utro-63662.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/s-dobrym-utrom-pust-kazhdyy-den-raduet-vas-svoey-yarkostyu-44111.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/prevoskhodnaya-otkrytka-dobroe-utro-63629.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobroe-utro-s-mishkoy-63583.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/khoroshaya-otkrytka-s-dobrym-utrom-63582.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/s-dobrym-utrom-pust-segodnya-solntse-svetit-yarche-44112.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/s-dobrym-utrom-radosti-i-udachi-44113.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-buketom-63546.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-chaem-64011.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/veselaya-kartinka-dobroe-utro-63448.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-s-dobrym-utrom-s-lyubovyu-ot-menya-63429.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-s-dobrym-utrom-s-prikolom-63385.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/optimistichnaya-kartinka-dobroe-utro-64009.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-s-dobrym-utrom-s-tsvetami-63249.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-vkusnogo-utra-64012.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/dushevnaya-kartinka-dobroe-utro-63235.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-orkhideey-63180.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/zamechatelnaya-kartinka-dobroe-utro-63143.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/prelestnaya-otkrytka-dobroe-utro-63142.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/interesnaya-otkrytka-dobroe-utro-63087.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/pozitivnaya-otkrytka-dobroe-utro-63080.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/ocharovatelnaya-otkrytka-dobroe-utro-63006.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/velikolepnaya-otkrytka-dobroe-utro-63005.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kreativnaya-otkrytka-dobroe-utro-62998.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/yarkaya-otkrytka-dobroe-utro-62997.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/neobychnaya-otkrytka-dobroe-utro-62968.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/solnechnaya-otkrytka-s-dobrym-utrom-62954.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-s-dobrym-utrom-s-ulybkoy-62953.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/chudesnaya-otkrytka-dobroe-utro-62877.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-pozhelaniyami-62876.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobroe-utro-s-babochkoy-62861.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/originalnaya-otkrytka-dobroe-utro-62837.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/pozitivnaya-kartinka-dobroe-utro-62819.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-s-dobrym-utrom-i-khoroshego-nastroeniya-62757.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/vintazhnaya-otkrytka-dobroe-utro-61916.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/sovetskaya-otkrytka-dobroe-utro-61915.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/dobrogo-utra-i-chudesnogo-dnya-37177.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/sirenevoe-utro-37172.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/mertsayushchaya-otkrytka-s-dobrym-utrom-37170.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/miloe-dobroe-utro-37167.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/dobroe-utro-i-chudesnogo-dnya-37165.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/dobroe-utro-tebe-drug-37163.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/dobrogo-tebe-utra-37160.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/dobroe-tebe-utro-30866.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/s-dobrym-utrechkom-30858.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/chudesnogo-utra-30855.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/dobroe-utro-i-klassnogo-dnya-21789.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/goryachee-utro-21786.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/u-kazhdogo-raznoe-utro-21783.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/dobroe-utro-druzya-21782.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-s-dobrym-utrom-lyubimoy-zhenshchine-21781.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-s-dobrym-utrom-zhenshchine-21780.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/pust-utro-budet-takim-30864.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/solnyshko-prosnulos-30854.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/nezhnogo-utra-30874.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/s-pozhelaniem-dobrogo-utra-18472.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/krasivaya-otkrytka-s-dobrym-utrom-18465.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/s-dobrym-utrom-druzya-18481.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/novaya-otkrytka-s-dobrym-utrom-18458.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-s-dobrym-utrom-18398.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/s-dobrym-utrom-18522.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-s-dobrym-utrom-muzhchine-18451.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/dobroe-utro-i-otlichnogo-tebe-dnya-44102.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/dobroe-utro-rozovogo-nastroeniya-44104.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/utrennyaya-otkrytka-s-kofe-61194.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-zavtrakom-61159.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/starinnaya-otkrytka-s-dobrym-utrom-61158.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/sverkayushchaya-otkrytka-dobroe-utro-61079.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-s-dobrym-utrom-i-novym-dnem-61078.jpg",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobrogo-utra-i-prekrasnogo-dnya-61065.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/animatsionnaya-kartinka-dobroe-utro-61064.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-vkusnyashkami-60987.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobroe-utro-s-prikolom-60894.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/veselaya-otkrytka-dobroe-utro-60893.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/trogatelnaya-kartinka-dobroe-utro-60808.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/zhivaya-otkrytka-s-dobrym-utrom-60782.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-dobroe-utro-s-kotenkom-60705.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/milaya-otkrytka-dobroe-utro-60704.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/kartinka-s-dobrym-utrom-i-pozhelaniyami-udachi-60488.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-s-dobrym-utrom-i-khoroshego-dnya-60468.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/pust-den-budet-yasnym-a-nastroenie-prekrasnym-59645.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/dobroe-utro-i-bodrogo-nastroeniya-59402.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/pust-tvoe-utro-nachinaetsya-s-ulybki-59383.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/pozhelanie-dobrogo-utra-dlya-lyubimogo-59299.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/pust-raduyut-priyatnye-momenty-59233.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/pust-na-dushe-budet-radostno-etim-utrom-59119.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/pust-etim-utrom-dusha-poet-59118.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/samogo-khoroshego-nastroeniya-59077.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/chtob-vest-den-ne-khodit-a-letat-59076.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/puskay-sbudutsya-vse-nadezhdy-59075.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/s-novym-zamechatelnym-dnem-59074.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/pust-eto-utro-budet-velikolepnym-58973.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/utra-dobrogo-nastroeniya-svetlogo-58972.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/dobrogo-utra-i-udachnogo-dnya-58188.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/s-pozhelaniyami-nezhnogo-utra-57933.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/nezhnogo-solnechnogo-utra-57567.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/pust-probuzhdenie-budet-nezhnym-57566.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/zhelayu-bodrosti-i-sil-57565.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/otkrytka-dobroe-utro-lyubimaya-57316.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/neissyakaemoy-energii-i-pozitiva-57315.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/dobroe-utro-lyubimyy-57314.gif",
          "https://cdn.otkritkiok.ru/posts/thumbs/pust-den-budet-polon-chudes-56432.gif"];


$img_src = __DIR__."/image";
if($_FIXED_IMAGE){
  file_put_contents($img_src, file_get_contents($_FIXED_IMAGE));
} else {
  $today = file_get_contents(__DIR__."/today.txt");
  $maximgs = 108;
  $img_source = $today % $maximgs;
  file_put_contents($img_src, file_get_contents($links[$img_source]));
  file_put_contents(__DIR__."/today.txt", $today+1);
}

$gif = false;
$mime = "";
if(mime_content_type(__DIR__."/image") == "image/gif"){
  $gif = true;
  rename(__DIR__."/image", __DIR__."/image.gif");
  $img_src = __DIR__."/image.gif";
  $mime = "image/gif";
} else {
  if(mime_content_type(__DIR__."/image") == "image/png"){
    $gif = false;
    rename(__DIR__."/image", __DIR__."/image.png");
    $img_src = __DIR__."/image.png";
    $mime = "image/png";
  } else {
    $gif = false;
    rename(__DIR__."/image", __DIR__."/image.jpg");
    $img_src = __DIR__."/image.jpg";
    $mime = "image/jpeg";
  }
}

if($gif == true){
  $uploadUrl = file_get_contents('https://api.vk.com/method/docs.getMessagesUploadServer?type=doc&peer_id='.$peer_id.'&v=5.21&access_token='.$access_token);
  $__log_uploadurl = $uploadUrl;
  $uploadUrl = json_decode($uploadUrl, true);
  $uploadUrl = $uploadUrl['response']['upload_url'];
} else {
  $uploadUrl = file_get_contents('https://api.vk.com/method/photos.getMessagesUploadServer?peer_id='.$peer_id.'&v=5.21&access_token='.$access_token);
  $__log_uploadurl = $uploadUrl;
  $uploadUrl = json_decode($uploadUrl, true);
  $uploadUrl = $uploadUrl['response']['upload_url'];
}

curl_setopt($curl_handle, CURLOPT_POST, 1);
$args['file'] = new CurlFile($img_src, $mime, $img_src);
$__log_argfile = var_export($args, true);

$ch = curl_init($uploadUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
$response = curl_exec($ch);
curl_close($ch);
$resp = json_decode($response, true);
$__log_fileupload = $response;
rename($img_src, __DIR__."/image");

if($gif == true) {
  $url__ = 'https://api.vk.com/method/docs.save?file='.$resp['file'].'&v=5.21&access_token='.$access_token;
  $result = file_get_contents($url__);
  $__log_save = $result;
  $result = json_decode($result, true);
  $result = $result['response'][0];
  $attachment = 'doc'.$result['owner_id'].'_'.$result['id'];
} else {
  $url__ = 'https://api.vk.com/method/photos.saveMessagesPhoto?photo='.$resp['photo'].'&server='.$resp['server'].'&hash='.$resp['hash'].'&v=5.21&access_token='.$access_token;
  $result = file_get_contents($url__);
  $__log_save = $result;
  $result = json_decode($result, true);
  $result = $result['response'][0];
  $attachment = 'photo'.$result['owner_id'].'_'.$result['id'];
}

file_get_contents('https://api.vk.com/method/messages.send?peer_id='.$peer_id.'&random_id=&attachment='.$attachment.'&v=5.90&access_token='.$access_token);

?>
