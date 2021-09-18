
function navigate(ele)
{
    if(ele.id === "index")
    {
        window.location.replace("logout.php")
    }
    else{
        var extention = ".php";
        window.location.replace(ele.id+extention)
    }
}