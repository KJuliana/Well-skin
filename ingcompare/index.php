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
        Введите составы косметики для анализа в соответствующие поисковые поля поиска.
        Наибольшая достоверность будет достигнута, если вы введете состав в
        стандартном виде в соответствии с INCI (латинскими буквами).
    </p>
</section>

<section class='page__form'>
    <form class='form' action='/ingcompare/result/' method='get'>
        <div class='columns'>
            <div class='columns__item'>
                <input class='input__text' name='name1' type='text' placeholder='Средство 1' autocomplete='off'/>
                <textarea
                    class='textarea'
                    id='components_1'
                    name='list1'
                    required
                    spellcheck='false'
                    placeholder='Water, Glycerin, Mineral oil,...'
                    minlength='3'
                ></textarea>
            </div>

            <div class='columns__separator'>
                <div class='comparison__vs'>vs</div>
            </div>

            <div class='columns__item'>
                <input class='input__text' name='name2' type='text' placeholder='Средство 2' autocomplete='off'/>
                <textarea
                    class='textarea'
                    id='components_2'
                    name='list2'
                    required
                    spellcheck='false'
                    placeholder='Aqua...'
                    minlength='3'
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