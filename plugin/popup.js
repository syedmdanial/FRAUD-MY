var baseUrl="http://127.0.0.1:8000";

function click(message){
    axios({
        method:'get',
        url: baseUrl+'/searchApi?query='+message
        })
        .then(function (response) {
            console.log(response);
            if (response.data[0] != null){
               for (var i=0;i<response.data.length;i++){
                    var span = document.createElement("span");
                    var spanText = document.createTextNode(response.data[i].name);
                    span.appendChild(spanText);
                    var anchor = document.createElement("a");
                    var anchorText = document.createTextNode("Details");
                    anchor.appendChild(anchorText);
                    anchor.href= baseUrl+"/search/detail/"+response.data[i].slug;
                    anchor.target= "_blank";
                    anchor.setAttribute("class", "spacing btn btn-success btn-sm");
                    span.setAttribute("class", "badge badge-danger");
                    document.getElementById("output").appendChild(span);
                    document.getElementById("output").appendChild(anchor);
               }
            }else{
                document.getElementById("output").innerHTML ="No Result";
            }
        })
        .catch(function (error) {
            console.log(error);
        });

}

document.addEventListener("DOMContentLoaded",function(){
    var message=document.getElementById("message").value;
    document.getElementById("btn").addEventListener('click',function(){
        document.getElementById("output").innerHTML = "";
        click(document.getElementById("message").value)}
        );
});
