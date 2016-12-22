<?php
/**
 * Created by PhpStorm.
 * User: mir
 * Date: 14.09.2016
 * Time: 21:28
 */

//объявляем константу содержащую путь до файлов языков
define('LANGUAGE_DIR', $_SERVER['DOCUMENT_ROOT'] . "/language/", false);
//тоже, путь до шаблона вывода
define('TEMPLATE_DIR', $_SERVER['DOCUMENT_ROOT'] . "/template/", false);

// проверка куки, если язык уже задан пользователем то выводим страницу в пользовательском переводе, если нет то по скрипту
if (@$_COOKIE['user-language'] == 'ru') {
    $lang = 'ru';
} elseif (@$_COOKIE['user-language'] == 'en') {
    $lang = 'en';
} else {
    // получаем первый по приоритетности язык браузера, обрезаем до 2-х символьного значения
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

// проверочный вывод данных (в рабочей версии закоментировать)
//    echo @$_COOKIE['user-language'];

//список языков на которые выдаем русскую локаль
    $locales = array(
        "be" => "",
        "uk" => "",
        "ky" => "",
        "ab" => "",
        "mo" => "",
        "et" => "",
        "lv" => "",
        "ru" => "",
    );

// на все из списка выше выдаем русскую локализацию, на все остальные варианты английскую
    if (in_array($lang, array_keys($locales))) {
        $lang = 'ru';
    } else {
        $lang = 'en';
    }
}

// проверочный вывод данных (в рабочей версии закоментировать)
//echo "$lang";

//загружаем файл перевода
include_once('language/' .$lang. '.php');

//загружаем файл шаблона, начинаем вывод
include_once('template/advertiser-registration.php');