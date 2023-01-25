<!DOCTYPE html>
<html lang="ja">
 
  <head>
  <meta charset="utf-8">
   <title>Replace｜駐車場のマッチングサービス</title>
   <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
 </head>
 <body>
  <div id="header">
   <h1 class="app_name">Replace｜駐車場のマッチングサービス</h1>
  </div> 
  
  <div id="wrapper">
   
   <div id="running_container">
     <div class="hook">
      <p class="title">斬新な発想で、あなたの土地を有効活用してみませんか？</p>
      <span class="click1"><a href="{{ route('login') }}">今すぐ探す</a></span>
      <span class="click1"><a href="{{ route('register') }}">始めてみる</a></span>
     </div>

     <div class="outline">
      <h2>Replaceとは？</h2>
       <p>Replaceは、駐車場を貸したい方と借りたい方の需要と供給をマッチさせるサービスです。<br>利用者の方々はインターネット上で気軽に貸し借りいただけます。</p>
     </div>
     
      <div class="flow">
       <h3>ReplaceのFLOW</h3>
        <p class="flow1"> FLOW1:登録<br>UserかOwnerで登録
        <p class="flow2"> FLOW2:設定<br>借りたい駐車場を選択
        <p class="flow3"> FLOW3:申請<br>希望の駐車場で話し合い
        <p class="flow4"> FLOW4:成約<br>条件をすり合わせたらサービス開始</div>
        <p class="push">さあ、今すぐ検索してみよう</p>
         <span class="click1"><a href="{{ route('login') }}">今すぐ探す</a></span>
         <span class="click1"><a href="{{ route('register') }}">始めてみる</a></span>
      </div>
      <div class="support">
       <p class="support_p">サポート</p>
       <p>・お問合せはこちら<br>・利用規約<br>・個人情報の取り扱いについて<br>・利用者様へのお願い</p>
      </div>
   </div>
  </div>
 </body>
</html>
