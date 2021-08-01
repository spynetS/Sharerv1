<?php

class utils
{

    public function setPage($page)
    {
        echo "<script>window.location.href="."'"."{$page}"."'".";</script>";

    }
}


