var mysidenav , links , OCbtn , user_name , Nr , Or , welcome , form , home,
    nvCor , nvFb , about ;
mysidenav = document.getElementsByClassName("sidenav")[0];
links = mysidenav.getElementsByTagName("button");
user_name = mysidenav.getElementsByTagName("h6")[0];
form = document.getElementById("recForm");
OCbtn = links[0];
welcome = document.getElementById('wlcm');
Nr = welcome.getElementsByTagName("button")[0];
Or = welcome.getElementsByTagName("button")[1];
nvCor = document.getElementById('nv_cor');
nvFb = document.getElementById('nv_fb');
about = document.getElementById('nv_abt');
form.style.display="none";
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
Nr.onclick = function()
{
    close();
    welcome.style.display="none";
    form.style.display="block";
}
Or.onclick = function()
{
    window.location.href = "http://localhost/MYPROJECTS/Reclamation/reclamations.php";
}
link = "http://localhost/MYPROJECTS/Reclamation/Accueil.php?rec";
if( window.location.href == link )
{
    Nr.onclick();
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