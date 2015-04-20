<?php
include "sepet.class.php";
$sepet = new sepet;
$sepet->cerezKayit(true);
$sepet->ekle('urun',5);
$sepet->ekle('urun1',5);
$sepet->ekle('urun2',5);
$sepet->ekle('urun3',5);
$sepet->guncelle('urun3',2);
$sepet->sil('urun',1);
$sepet->urunSil('urun');
//$sepet->temizle(); // Açarsanız sepeti boşaltır. Sınıfı denemek için önce kapatın, sonra açıp komple sepetin temizlendiğini göreceksiniz.
$sepet->debug($sepet->toplam());
$sepet->debug($sepet->getir());
