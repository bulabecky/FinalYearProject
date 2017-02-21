console.log("CONNECTED BITCH");
function post()
{
  console.log("POSTING LOLOLOLOL");
  var comment = document.getElementById("comment").value;
  var name = document.getElementById("username").value;


  console.log("comment: "+ comment);
  console.log("name: "+name);

  if(comment && name)
  {
    console.log("inside if statement");
    $.ajax
    ({
      type: 'post',
      url: 'post_comment.php',
      data: 
      {
         user_comm:comment,
         user_name:name
      },
      success: function (response) 
      {
        document.getElementById("all_comments").innerHTML=response+document.getElementById("all_comments").innerHTML;
        document.getElementById("comment").value="";
        document.getElementById("username").value="";
  
      }
    });
  }
  
  return false;
}