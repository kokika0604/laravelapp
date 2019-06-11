<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>履歴書</title>
<link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>

<div  align=center class=p1>

<h2 class="title" >履歴書</h2>

<div class=t1>
<table class="basic" >
  <tr>
  <td>
  <table class="info" >
  <tr>
    <th>フリガナ</th>
    <td>コウ　キツカ</td>
  </tr>
  <tr>
    <th>氏名</th>
    <td>高　屹華</td>
  </tr>
   <tr>
   <th>生年月日</th>
   <td>1994年6月4日（満25歳）</td>
   </tr>
   <tr>
     <th>性別</th>
     <td>男</td>
   </tr>
 </table>
 </td>
 <td>
   <img src="<?php echo e($pic_url); ?>" height=150px width=150px/> 
   
   
 </td>
</table>
</div>


<div class=t2>
<table class="address">
  <tr>
    <th rowspan="2" width=150px>住所</th>
    <td style="border-bottom:0">〒○○○―○○○○</td>
  </tr>
  <tr>
    <td style="border-top:0">&nbsp;&nbsp;&nbsp;東京都新宿区西早稲田○○－○○－○○　○○○室</td>
  </tr>
  <tr>
    <th>電話番号</th>
    <td>○○○－○○○○－○○○○</td>
  </tr>
  <tr>
    <th>メールアドレス</th>
    <td>XXXX@XXX.com</td>
  </tr>
</table>
</div>


<div class=t3>
<table class="exp">
 <tr bgcolor=#CCCCCC>
   <th style="border-right:1px dotted">年</th>
   <th style="border-left:1px dotted">月</th>
   <th>学歴・職歴</th>
 </tr>
 <tr>
   <td style="border-right:1px dotted">2012</td>
   <td style="border-left:1px dotted">9</td>
   <td>○○大学　○○専攻　入学</td>
 </tr>
 <tr>
   <td style="border-right:1px dotted">2016</td>
   <td style="border-left:1px dotted">6</td>
   <td>○○大学　○○専攻　卒業</td>
 </tr>
 <tr>
   <td style="border-right:1px dotted">2017</td>
   <td style="border-left:1px dotted">4</td>
   <td>○○大学　○○専攻　入学</td>
 </tr>
 <tr>
   <td style="border-right:1px dotted">2019</td>
   <td style="border-left:1px dotted">3</td>
   <td>○○大学　○○専攻　卒業</td>
 </tr>
 <tr>
   <td style="border-right:1px dotted">&nbsp;</td>
   <td style="border-left:1px dotted">&nbsp;</td>
   <td>&nbsp;</td>
 </tr>
 <tr>
   <td style="border-right:1px dotted">&nbsp;</td>
   <td style="border-left:1px dotted">&nbsp;</td>
   <td>&nbsp;</td>
 </tr>
</table>
</div>


<div class=t4>
<table class="qua">
 <tr bgcolor=#CCCCCC>
   <th width=107px style="border-right:1px dotted">年</th>
   <th width=45px style="border-left:1px dotted">月</th>
   <th>資格</th>
 </tr>
 <tr>
   <td style="border-right:1px dotted">2015</td>
   <td style="border-left:1px dotted">8</td>
   <td>日本語能力試験N1</td>
 </tr>
 <tr>
   <td style="border-right:1px dotted">&nbsp;</td>
   <td style="border-left:1px dotted">&nbsp;</td>
   <td>&nbsp;</td>
 </tr>
 <tr>
   <td style="border-right:1px dotted">&nbsp;</td>
   <td style="border-left:1px dotted">&nbsp;</td>
   <td>&nbsp;</td>
 </tr>
</table>
</div>

<div class=t5>
<table class="episode">
  <tr bgcolor=#CCCCCC>
    <th>自己PR</th>
  </tr>
  <tr>
    <td>(例文です)他の人が気付かない仕事を率先して行います。<br>
       例えば現職では、率先して溝さらいを行っています。また、営業事務をしていたときには、シュレッダーにゴミをためない、コピー用紙が切れる前に補充するなどの点にも気を配りました。これによってスタッフに仕事の流れを止めない職場環境を提供してきたと自負しています。
    <br><br></td>
  </tr>
</table>
</div>

<div class=t6>
<table class="moti">
  <tr bgcolor=#CCCCCC>
    <th>志望動機</th>
  </tr>
  <tr>
    <td>(例文です)IT業界での顧客サポート・ヘルプデスクの経験により、パソコンをはじめ電化製品の新製品をチェックすることが習慣化しています。貴社の販売するモニターについての詳しい知識はまだありませんが、この習慣と得意のパソコン操作を活かして貴社のお役に立ちたいと考えています。
    <br><br><br></td>
  </tr>
</table>
</div>

</div>

<button style="float:right" onclick="window.open('<?php echo e(route('snappy_pdf')); ?>')">出力</button>
<br><br>
</body>
</html>
<?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/test/profile.blade.php ENDPATH**/ ?>