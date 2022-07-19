<?php

require_once('./@components/footer.php');
require_once('./@components/header.php');
require_once('./@components/page.php');

$header = render_header('/');
$footer = render_footer();
$title = "Анализ и сравнение составов косметики";

$body = "
<section class='main'>
    <div class='main__intro'>
        <p class='main__text'>Научная&nbsp;основа. Грамотный&nbsp;выбор.</p>
    </div>
    <a class='link' href='https://well-skin.ru/ingcompare/result/?name1=%D0%9A%D1%80%D0%B5%D0%BC&list1=AQUA%2FWATER%2FEAU%2C+PARAFFINUM+LIQUIDUM%2FMINERAL+OIL%2FHUILE+MINERALE%2C+GLYCERIN%2C+BRASSICA+CAMPESTRIS+SEED+OIL%2C+SODIUM+POLYACRYLATE%2C+PENTYLENE+GLYCOL%2C+CETEARYL+ALCOHOL%2C+1%2C2-HEXANEDIOL%2C+CAPRYLYL+GLYCOL%2C+ACRYLATES%2FC10-30+ALKYL+ACRYLATE+CROSSPOLYMER%2C+SODIUM+CITRATE%2C+XYLITOL%2C+CETEARYL+GLUCOSIDE%2C+MANNITOL%2C+TOCOPHEROL%2C+RHAMNOSE%2C+XYLITYLGLUCOSIDE%2C+HELIANTHUS+ANNUUS+SEED+OIL%2C+ANHYDROXYLITOL%2C+NIACINAMIDE%2C+GLUCOSE%2C+FRUCTOOLIGOSACCHARIDES%2C+CAPRYLIC%2FCAPRIC+TRIGLYCERIDE%2C+LAMINARIA+OCHROLEUCA+EXTRACT&name2=%D0%93%D0%B5%D0%BB%D1%8C-%D0%BA%D1%80%D0%B5%D0%BC&list2=AQUA%2FWATER%2FEAU%2C+GLYCERIN%2C+NIACINAMIDE%2C+SODIUM+POLYACRYLATE%2C+DIPOTASSIUM+GLYCYRRHIZATE%2C+HYDROGENATED+POLYDECENE%2C+PENTYLENE+GLYCOL%2C+1%2C2-HEXANEDIOL%2C+CAPRYLYL+GLYCOL%2C+MANNITOL%2C+POLYSORBATE+20%2C+XYLITOL%2C+RHAMNOSE%2C+SODIUM+CITRATE%2C+POLYQUATERNIUM-51%2C+FRUCTOOLIGOSACCHARIDES%2C+CAPRYLIC%2FCAPRIC+TRIGLYCERIDE%2C+LAMINARIA+OCHROLEUCA+EXTRACT'>Пример результата сравнения&nbsp;→</a> 
    <a class='main__button' href='/ingcompare'>Перейти к сравнению&nbsp;→</a>
    </section> 

";

echo render_page($title, $header, $footer, $body, "page--main");