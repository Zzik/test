<?php

echo 'yes';
echo $_REQUEST['REQUEST_URI'];
$HOSTNAME = ${first-db.HOSTNAME};
$PORT = ${first-db.PORT};
$USERNAME = ${first-db.USERNAME};
$PASSWORD = ${first-db.PASSWORD};
$DATABASE = ${first-db.DATABASE};

echo $HOSTNAME;
echo $PORT;
echo $USERNAME;
echo $PASSWORD;
echo $DATABASE;