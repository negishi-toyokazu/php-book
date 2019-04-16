<?php
  $mbango = $_POST['mbango'];

  $hoshi['M1'] = 'かに星雲';
  $hoshi['M31'] = 'アンドロメダ大星雲';
  $hoshi['M42'] = 'オリオン大星雲';
  $hoshi['M45'] = 'すばる';
  $hoshi['M57'] = 'ドーナツ星雲';

  foreach($hoshi as $key => $val)
  {
    print $key.'は'.$val;
    print '<br>';
  }

  print 'あなたの選んだ星は、';
  print $hoshi[$mbango];
