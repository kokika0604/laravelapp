<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCPDF;
use TCPDF_FONTS;
use PDF;

class EntrySheetController extends Controller
{
    public function index(){
        return view('test.profile',['pic_url'=>asset('local/photo.jpeg')]);
    }

    public function tcpdf(Request $request){
        $url='';
        if ($_SERVER['REQUEST_METHOD']=='GET'){
            $url=$_SERVER['HTTP_REFERER'];
        }
        // $html=file_get_contents($url);
        // var_dump($html);exit();
 
        // ダミーデータ設定
        $data['test01'] = "01 - あいうえお - left";
        $data['test02'] = "02 - あいうえお - center";
        $data['test03'] = "03 - あいうえお - right";


        // PDF 生成メイン　－　A4 縦に設定
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // PDF プロパティ設定
        $pdf->SetTitle('履歴書');  // PDFドキュメントのタイトルを設定  http://tcpdf.penlabo.net/method/s/SetTitle.html
        // $pdf->SetAuthor('Author aiueo あいうえお');  // PDFドキュメントの著者名を設定  http://tcpdf.penlabo.net/method/s/SetAuthor.html
        // $pdf->SetSubject('Subject aiueo あいうえお');  // PDFドキュメントのサブジェクト(表題)を設定  http://tcpdf.penlabo.net/method/s/SetSubject.html
        // $pdf->SetKeywords('KEY1 KEY2 KEY3 あいうえお'); // PDFドキュメントのキーワードを設定 http://tcpdf.penlabo.net/method/s/SetKeywords.html
        $pdf->SetCreator('Creator aiueo あいうえお');  // PDFドキュメントの製作者名を設定  http://tcpdf.penlabo.net/method/s/SetCreator.html

        // 日本語フォント設定
        $pdf->setFont('kozminproregular','',10);

        // ページ追加
        $pdf->addPage();

        // HTMLを描画、viewの指定と変数代入 - 

        $html='
   
        <html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>履歴書</title>
        <link rel="stylesheet" href="C:\Users\gyh19\Desktop\laravelapp\resources\views\test\style.css">
        </head>
        <body>
        
        <div align="center" class="p1">
        
        <h2 class="title">履歴書</h2>
        
        <div class="t1">
        <table class="basic">
          <tbody><tr>
          <td>
          <table class="info">
          <tbody><tr>
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
         </tbody></table>
         </td>
         <td>
           <img src="./履歴書_files/photo.jpeg" height="150px" width="150px/">
         </td>
        </tr></tbody></table>
        </div>
        
        
        <div class="t2">
        <table class="address">
          <tbody><tr>
            <th rowspan="2" width="150px">住所</th>
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
        </tbody></table>
        </div>
        
        
        <div class="t3">
        <table class="exp">
         <tbody><tr bgcolor="#CCCCCC">
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
        </tbody></table>
        </div>
        
        
        <div class="t4">
        <table class="qua">
         <tbody><tr bgcolor="#CCCCCC">
           <th width="107px" style="border-right:1px dotted">年</th>
           <th width="45px" style="border-left:1px dotted">月</th>
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
        </tbody></table>
        </div>
        
        <div class="t5">
        <table class="episode">
          <tbody><tr bgcolor="#CCCCCC">
            <th>自己PR</th>
          </tr>
          <tr>
            <td>(例文です)他の人が気付かない仕事を率先して行います。<br>
               例えば現職では、率先して溝さらいを行っています。また、営業事務をしていたときには、シュレッダーにゴミをためない、コピー用紙が切れる前に補充するなどの点にも気を配りました。これによってスタッフに仕事の流れを止めない職場環境を提供してきたと自負しています。
            <br><br></td>
          </tr>
        </tbody></table>
        </div>
        
        <div class="t6">
        <table class="moti">
          <tbody><tr bgcolor="#CCCCCC">
            <th>志望動機</th>
          </tr>
          <tr>
            <td>(例文です)IT業界での顧客サポート・ヘルプデスクの経験により、パソコンをはじめ電化製品の新製品をチェックすることが習慣化しています。貴社の販売するモニターについての詳しい知識はまだありませんが、この習慣と得意のパソコン操作を活かして貴社のお役に立ちたいと考えています。
            <br><br><br></td>
          </tr>
        </tbody></table>
        </div>
        
        </div>
        
        <button style="float:right" onclick="window.open(&#39;http://localhost:8000/pdf&#39;)">出力</button>
        <br><br>
        
        
        </body></html>';
        $pdf->writeHTML($html);

        // 出力指定 ファイル名、拡張子、D(ダウンロード)
        $pdf->output('entrysheet' . '.pdf', 'I');
        return;
   }


   public function snappy(){

    $url='';
        if ($_SERVER['REQUEST_METHOD']=='GET'){
            $url=$_SERVER['HTTP_REFERER'];
        }
       //template内で使うパラメータ
    $params = '';

    //PDF作成
    $pdf = PDF::loadView('test/profile', ['pic_url' => public_path('\local\photo.jpeg')])
      ->setOption('encoding', 'utf-8')  //文字コード
      ->setOption('user-style-sheet', public_path() . '/css/style.css') //スタイルシート
      ->setPaper('a4')->setOption('margin-bottom', 0)->setOption('zoom',1.6)
      ->setOption('enable-local-file-access',true);
    //ブラウザで表示
     return $pdf->inline('entrysheet.pdf');

    //ダウンロード
    // return $pdf->download('filename.pdf');

    // //保存（上書き）
    // $pdf->save('filename.pdf', true);

    // //バイナリ出力
    // $pdfBinary = $pdf->output();
   }
    

}
