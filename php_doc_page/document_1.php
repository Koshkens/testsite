<!DOCTYPE html>
<html>
  <head>
    <style>
    @page {
   size: 7in 9.25in;
   margin: 27mm 16mm 27mm 16mm;
}
    body {
        height: 842px;
        width: 595px;
        margin-left: auto;
        margin-right: auto;
        font-family: sans-serif;
        font-size: small;
        
        font-size: 16px;
    }
    div{
      text-indent: 1.5em;
    }
    h1{
        text-align:center;
    }
    .main{
        height:100%;
        position:relative;
    }
    input{
        outline:none;
        border:none;
        font-family: sans-serif;
        font-size: 16px;
    }
    .bottom{
      position: absolute;
      bottom: 10px;;
    }
    </style>
  </head>
  <body>
    <div class="main">
    <h1>Приглашение</h1>
    <div>Уважаемый <input type="text" onkeydown="this.style.width = ((this.value.length + 1) * 8) + 'px';" value="<?php echo $_POST["name"]?>">,</div><br><br>

    <div>Уважаемые дамы и господа! Мы рады пригласить Вас на выставку <input type="text" onkeydown="this.style.width = ((this.value.length + 1) * 8) + 'px';" value="" placeholder="название">, которая состоится в <input type="text" onkeydown="this.style.width = ((this.value.length + 1) * 8) + 'px';" value="" placeholder="место"> с 15.08.2013 г. по 19.08.2013 г.</div><br><br>

    <div>Наша компания представит на выставке как традиционное оборудование для оперативной полиграфии, так и оборудование для специальных видов печати. </div><br><br>

    <div>На нашем стенде мы представим:
- товар 
- товар 
- товар</div> 
<br><br>
<div>Мы будем рады увидеть Вас в числе наших гостей и надеемся, что посещение этого мероприятия окажется для Вас всесторонне полезным.
</div><br><br>
<div class="bottom">С уважением,
Петр Петров</div></div>
  </body>
</html>