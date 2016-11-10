<?php
session_start();
if (empty($_SESSION['login']) or empty($_SESSION['password'])) 
{

exit ("Accesul la pagina data o au numai utilizatorii site-ului. Daca sunteti inregistrar intrati pe site cu loginul si parola<br><a href='main.php'>Pagina principala</a>");
}

unset($_SESSION['password']);
unset($_SESSION['login']); 
unset($_SESSION['id']);// distrugem variabilele in sesiune

exit("<html><head><meta http-equiv='Refresh' content='0; URL=main.php'></head></html>");
// rederectam utilizatorul pe pagina principala.
?>