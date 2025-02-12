<?php
session_start();
session_unset();
session_destroy();
echo "You Have been logged out";