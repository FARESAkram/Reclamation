var email , password , link , mail , link2 ,wvc , link3 , pdm , link4 , pcs , nvc ;
email = document.getElementById('we');
mail = document.getElementById('wfe');
wvc = document.getElementById('wvc');
nvc = document.getElementById('nvc')
pdm = document.getElementById('pdm');
pcs = document.getElementById('pcs');
link = "http://localhost/MYPROJECTS/Reclamation/index.php" ;
link2 = "http://localhost/MYPROJECTS/Reclamation/forgetten_password.php" ;
link3 = "http://localhost/MYPROJECTS/Reclamation/change-pass.php" ;
link4 = "http://localhost/MYPROJECTS/Reclamation/new-pass.php" ;
if ( window.location.href == link + "?we&wp" )
{
    email.style.display = "" ;
    history.pushState({}, "" , link );
}
if ( window.location.href == link + "?pcs" )
{
    pcs.style.display = "" ;
    history.pushState({}, "" , link );
}
if ( window.location.href == link2 + "?wfe" )
{
    mail.style = "" ;
    history.pushState({}, "" , link2 );
}
if ( window.location.href == link2 + "?nvc" )
{
    nvc.style = "" 
    history.pushState({}, "" , link2 )
}
if ( window.location.href == link3 + "?wvc" )
{
    wvc.style = "" ;
    history.pushState({}, "" , link3 );
}
if ( window.location.href == link4 + "?pdm" )
{
    pdm.style = "" ;
    history.pushState({}, "" , link3 );
}