
$(document).ready(function() {
    setTimeout(function()
    {
        $("#myModal").modal('show');
    },15000);
});






var a;
$(function (){
    $('.reclama').hover(
        function() {
            a = $(this).find('.price').text();
            var b = a*0.9;
            $(this).find('.price').text(b);
        },
        function() {
            $(this).find('.price').text(a);
        });
});

$(function () {
    $("#showpages").click(function () {
        $("#pageshide").show();
        $("#showpages").hide();
    })
});


$(function () {
    $("input[id^='isactiveuser']").click(function(){


        $.ajax({
                type: "POST",
                url: "/admin/dashboard/users/"+this.name+'/'+Number(this.checked), //Change
                data: {
                    "_token": $('#token').val() },
                //success:alert("done")
                })
    });
});

$(function () {
        $("input[id^='isactivecomment']").click(function(){

        $.ajax({
            type: "POST",
            url: "/admin/dashboard/comments/"+this.name+'/'+Number(this.checked), //Change
            data: {
                "_token": $('#token').val() },
            //success:alert("done")
        })
    });
});


$(function () {
    $(".editcomm").click(function () {
        comment_id = this.id;
        tmp_id="body_comment_" + comment_id;
        comment = document.getElementById(tmp_id).innerText;
        //  alert(comment);
        $("#myModalcomment").modal('show');
        $("#comments").val(comment);

        $("#admin_btn_save_comment").click(function () {
            comment_new=$("#comments").val();
            $.ajax({
                type: "POST",
                url: "/admin/dashboard/comments/edit/" + comment_id + '/' + $("#comments").val(), //Change
                data: {
                    "_token": $('#token').val()
                },
                success: $("#myModalcomment").modal('hide'),

        });
            document.getElementById(tmp_id).innerText=comment_new;

        });
    });
});

//----------------------------------VOTE_LIKE COMMENT--------------

$(function () {
    $('[id^="vote_like_"]').click(function(){

        button_id = this.id;
      //  alert(button_id);

     value= Number(document.getElementById(button_id).innerText)+1;

//alert(value);
        $.ajax({
            type: "POST",
            url: "/ajax/vote_like/"+this.name+'/'+value, //Change
            data: {
                "_token": $('#token').val() },
            success:document.getElementById(button_id).innerHTML='<span class="glyphicon glyphicon-thumbs-up" ></span>'+value
        })
    });
});


//----------------------------------VOTE_DISLIKE COMMENT--------------

$(function () {
    $('[id^="vote_dislike_"]').click(function(){

        button_id = this.id;
        //  alert(button_id);

        value= Number(document.getElementById(button_id).innerText)+1;

//alert(value);
        $.ajax({
            type: "POST",
            url: "/ajax/vote_dislike/"+this.name+'/'+value, //Change
            data: {
                "_token": $('#token').val() },
            success:document.getElementById(button_id).innerHTML='<span class="glyphicon glyphicon-thumbs-down" ></span>'+value
        })
    });
});

//--------------------------Livesearch-----------------------------
function showResult(str) {
    if (str.length==0) {
        document.getElementById("livesearch").innerHTML="";
        document.getElementById("livesearch").style.border="0px";
        return;
    }
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            document.getElementById("livesearch").innerHTML=this.responseText;
            document.getElementById("livesearch").style.border="1px solid #A5ACB2";
        }
    }
    xmlhttp.open("GET","/livesearch/"+str,true);
    xmlhttp.send();
}



tinymce.init({
    selector: 'textarea',
    height: 300,
    theme: 'modern',
    plugins: 'print preview fullpage paste searchreplace autolink directionality  visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount   imagetools   contextmenu colorpicker textpattern help',
    toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
    image_advtab: true,
    templates: [
        { title: 'Test template 1', content: 'Test 1' },
        { title: 'Test template 2', content: 'Test 2' }
    ],
    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
    ]
});







