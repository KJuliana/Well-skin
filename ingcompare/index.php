<?php

require_once('../@components/footer.php');
require_once('../@components/header.php');
require_once('../@components/page.php');

$header = render_header('/ingcompare');
$footer = render_footer();
$title = "Сравнение составов";

$body = (
"<section class='intro'>
    <p class='intro__text'>
        Введите составы косметики для анализа в соответсвующие поисковые поля поиска.
        Наибольшая достоверность будет достигнута,если вы введете состав в
        стандартном виде в соответствии с INCI (латинскими буквами).
    </p>
</section>

<section class='page__form'>
    <form class='form' action='/ingcompare/result/' method='get'>
        <div class='columns'>
            <div class='columns__item'>
                <input class='input__text' name='name1' type='text' placeholder='Средство 1'/>
                <textarea
                    class='textarea'
                    id='components_1'
                    name='list1'
                    required
                    spellcheck='false'
                    placeholder='Water, Glycerin, Mineral oil, sunflower seed oil, Behenyl alcohol, Sucrose stearate, canola oil, hydroxyethyl acrylate/sodium acryloyldimethyl taurate copolymer, pentylene glycol, beta-sitosterol, xylitol, zinc gluconate, acrylates/c10-30 alkyl acrylate crosspolymer, palmitamide mea, 1,2-hexanediol, caprylyl glycol, sodium citrate, mannitol, rhamnose, sodium lauroyl lactylate, sodium hydroxide, polysorbate 60, sorbitan isostearate, tocopherol, phytosphingosine, ceramide np, ethylhexylglycerin, ceramide ap, cholesterol, carbomer, xanthan gum, fructooligosaccharides, caprylic/ capric triglyceride, Laminaria ochroleuca extract, Citric acid, Ceramide eop'
                ></textarea>
            </div>

            <div class='columns__separator'>
                <div class='comparison__vs'>vs</div>
            </div>

            <div class='columns__item'>
                <input class='input__text' name='name2' type='text' placeholder='Средство 2'/>
                <textarea
                    class='textarea'
                    id='components_2'
                    name='list2'
                    required
                    spellcheck='false'
                    placeholder='aqua/water/eau, paraffinum liquidum/mineral oil/huile minerale, glycerin, brassica campestris (rapeseed) seed oil, sodium polyacrylate, pentylene glycol, cetearyl alcohol, 1,2 hexanediol, caprylyl glycol...'
                ></textarea>
            </div>
        </div>

        <div class='form__submit-panel'>
            <button type='submit' class='form__submit-button'>Сравнить</button>
        </div>
    </form>
</section>"
);

echo render_page($title, $header, $footer, $body);