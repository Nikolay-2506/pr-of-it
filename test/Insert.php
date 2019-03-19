<?php

require __DIR__ . '/../autoload.php';

$article = new \App\Models\Article;
$article->title = 'Аргументы и функции, 12 марта';
$article->content = 'У российских пользователей недавно начал глючить почтовый сервис ProtonMail. Специалисты покопались в проблеме и откопали любопытное письмо от ФСБ к МТС. Спецслужба требовала заблокировать 26 IP-адресов, в том числе принадлежащие серверам ProtonMail — якобы их использовали для отправки ложных сообщений о терактах. Красноярская универсиада не за горами, кому опять нужна паника? Просто заблокируйте, и дело с концом.
И вот парадоксальный результат: на серверах ProtonMail блокируются входящие сообщения. Пользователи не могут между собой обмениваться письмами, но отправлять их в адрес других почтовых сервисов — пожалуйста.
Кстати, в реестре запрещённых сайтов эти 26 адресов не значатся, ребята с Habr проверяли. Известно, что их блокируют МТС и «Ростелеком».
На ситуацию обратил внимание TechCrunch. Журналисты связались с руководством ProtonMail: оно закономерно печалится и призывает российские власти действовать по процедурам, установленным международными законами. Для своих клиентов компания открыла горячую линию: abuse@protonmail.ch.';

$article->insert();

echo '<pre>'.print_r($article, true).'</pre>';
