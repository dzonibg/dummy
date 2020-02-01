<?php
$mac = implode('.', str_split(substr(md5(mt_rand()), 0, 12), 2));
echo strtoupper($mac);
$random = rand(1, 50)
?>
<form method="post" action="/event">
<input type="date" name="date">
    @csrf
    <input type="text" name="value" value="{{ $random }}">
    <button type="submit">Go</button>
</form>
