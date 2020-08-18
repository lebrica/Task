<?php

return array(
    '^$' => 'task/tasksview/1',
    'page=([0-9]+)$' => 'task/tasksview/$1',
    'addtask$' => 'task/addtask',

    'auth$' => 'auth/auth',
    'logout$' => 'auth/logout',

    'test/(\w+)/(\d+)' => 'task/test/$1/$2',

    'checktask=([0-9]+)$' => 'admin/checktask/$1',
    'changetask=([0-9]+)$' => 'admin/changetask/$1',

    'notfound' => 'redirect/redirectnotfound',
);

