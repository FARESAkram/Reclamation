var mysidenav , user_name, nvNr , nvFb , Home , about ;
mysidenav = document.getElementsByClassName("sidenav")[0];
links = mysidenav.getElementsByTagName("button");
OCbtn = links[0];
user_name = document.getElementsByTagName("h6")[0];
nvNr = document.getElementById('nv_nr');
nvCor = document.getElementById('nv_cor');
nvAbt = document.getElementById('nv_abt');
nvFb = document.getElementById('nv_fb');
home = document.getElementById('nv_H');
about = document.getElementById('nv_abt');
user_name.style.display="none";
close();
function open()
{
    mysidenav.style.width = "250px";
    for ( i = 1 ; i < links.length ; i ++ )
    {
        var a = links [i] ;
        a.style.display = "block";
    }
    user_name.style.display="";

}
function close()
{
    mysidenav.style.width = "50px";
    for ( i = 1 ; i < links.length ; i ++ )
    {
        links [i].style.display = "none";
    }
    user_name.style.display="none";
}
OCbtn.onclick = function ()
{
    var size = mysidenav.style.width ;
    if ( size == "50px" )
        return open();
    else
        return close();
}
const clickablerow = (ids) =>
{
    let link = 'http://localhost/MYPROJECTS/Reclamation/check_reclamations.php?ids=' ;
    link += ids ;
    window.location.href = link ;
}
nvNr.onclick = () =>
{
    link = "http://localhost/MYPROJECTS/Reclamation/Accueil.php?rec";
    window.location.href = link ;
}
home.onclick = () =>
{
    window.location.href = "http://localhost/MYPROJECTS/Reclamation/Accueil.php";
}
about.onclick = () =>
{
    alert("not implemented yet");
} 
nvFb.onclick = () =>
{
    alert("not implemented yet");
}