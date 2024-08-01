k<?php

$text = <<<TXT
<p class="big">
    Год основания:<b>1589 г.</b> Волгоград отмечает день города в <b>2-е воскресенье сентября</b>. <br>В <b>2023 году</b> эта дата - <b>10 сентября</b>.
</p>
<p class="float">
    <img src="https://www.calend.ru/img/content_events/i0/961.jpg" alt="Волгоград" width="300" height="200" itemprop="image">
    <span class="caption gray">Скульптура «Родина-мать зовет!» входит в число семи чудес России (Фото: Art Konovalov, по лицензии shutterstock.com)</span>
</p>
<p>
    <i><b>Великая Отечественная война в истории города</b></i></p><p><i>Важнейшей операцией Советской Армии в Великой Отечественной войне стала <a href="https://www.calend.ru/holidays/0/0/1869/">Сталинградская битва</a> (17.07.1942 - 02.02.1943). Целью боевых действий советских войск являлись оборона  Сталинграда и разгром действовавшей на сталинградском направлении группировки противника. Победа советских войск в Сталинградской битве имела решающее значение для победы Советского Союза в Великой Отечественной войне.</i>
</p>
TXT;

function truncate_html_text($html, $word_limit) {
    $word_count = 0;
    $output = '';
    
    $split_text = preg_split('/(<[^>]+>|[^<]+)/', $html, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);

    foreach ($split_text as $fragment) {
        if (strip_tags($fragment) != $fragment) {
            $output .= $fragment;
        } else {
            $words = preg_split('/\s+/', $fragment);
            foreach ($words as $word) {
                if ($word_count < $word_limit) {
                    $output .= $word . ' ';
                    $word_count++;
                } else {
                    $output = trim($output) . '...';
                    break 2;
                }
            }
        }
    }
    
    return $output;
}

$result = truncate_html_text($text, 29);
echo $result;


