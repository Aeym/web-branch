<?php
    function auth($login, $passwd) {
        if (!$login || !$passwd)
            return 0;
        $account = unserialize(file_get_contents('./database.csv'));
        if ($login === "admin" && hash('whirlpool', $passwd) === $account['user']['1']['pw'])
          return (3);
        if ($account) {
          foreach ($account as $sub)
          {
            foreach ($sub as $k => $v) {
                if ($v['name'] === $login && $v['pw'] === hash('whirlpool', $passwd) && $v['level'] == 2)
                    return 2;
                if ($v['name'] === $login && $v['pw'] === hash('whirlpool', $passwd) && $v['level'] == 1)
                    return 1;
            }
        }
        return 0;
    }

}
?>
